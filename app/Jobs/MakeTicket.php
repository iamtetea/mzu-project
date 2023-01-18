<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected $paymentId)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $code = $this->makeTicketCode();
            // $qr_code = $this->makeQRPath();

            $data = new Ticket();
            $data->payment_id = $this->paymentId;
            $data->code = $code;
            $data->qr_path = '';
            $data->save();
        } catch (\Throwable $th) {
            // throw $th;
            info($th->getMessage());
        }
    }

    private function makeTicketCode()
    {
        return 'TIC/' . Carbon::now()->format('Y') . '/' . $this->paymentId;
    }

    private function makeQRPath()
    {
        $payment = Payment::find($this->paymentId);
        $pdf = Pdf::loadView('ticket.pdf', compact('payment'));
        return view('ticket.pdf', compact('payment'));
    }
}
