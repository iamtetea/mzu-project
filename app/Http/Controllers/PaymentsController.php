<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Jobs\MakeTicket;
use App\Models\EventItem;
use App\Models\Payment;
use App\Services\StorageService;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class PaymentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Payment::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
            $q->orWhere('rzp_payment_id', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('admin.payments.index', compact('data'));
        // return view('admin.payments.index')->with($data);
    }

    public function payment(PaymentRequest $request)
    {
        // $key = env('RZP_TEST_API_KEY'); // direct env

        $input = $request->all();
        $key = config('services.razorpay.test_key'); // from config
        $secret = config('services.razorpay.test_secret'); // from config

        $api = new Api($key, $secret);
        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                // rzp payment status neih ho = create, authorize, capture, failed
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $eventPayment = new Payment();
                $eventPayment->name = "Test Name";
                $eventPayment->email = "test@user.com";
                $eventPayment->phone_number = "9865756576";
                $eventPayment->address = "Test Address";
                $eventPayment->payable_id = $input['ticket'];
                $eventPayment->payable_type = EventItem::class;
                $eventPayment->sub_total = $payment['amount'] / 100;
                $eventPayment->tax = 0;
                $eventPayment->discount = 0;
                $eventPayment->total = $payment['amount'] / 100;
                $eventPayment->mode = "online";
                $eventPayment->rzp_payment_id = $input['razorpay_payment_id'];
                $eventPayment->payment_details = "Event booking";
                $eventPayment->status = $response['status'];
                $eventPayment->save();

                MakeTicket::dispatch($eventPayment->id);
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function makePdf($id)
    {
        $payment = Payment::find($id);
        info($payment);
        $pdf = Pdf::loadView('ticket.pdf', $payment);
        return $pdf->download('invoice.pdf');

        // return view('ticket.pdf', compact('payment'));
        // $pdf = Pdf::loadView('ticket.pdf', compact('payment'));
        // return $pdf->download('ticket.pdf');

        // $storageService = new StorageService();
        // $storageService->uploadImage('tickets', $pdf);
    }
}
