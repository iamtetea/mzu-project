<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Subscription::when($search, function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
            $q->orWhere('price', 'like', '%' . $search . '%');
            $q->orWhere('type', 'like', '%' . $search . '%');
            $q->orWhere('duration', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('admin.subscriptions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscriptions.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        Subscription::create($request->all());
        return redirect('/admin/subscriptions/new')->with('success', 'Subscription added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Subscription::findOrFail($id);
        return view('admin.subscriptions.details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionRequest $request, $id)
    {
        $data = Subscription::findOrFail($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->duration = $request->duration;
        $data->type = $request->type;
        $data->save();

        return redirect('/admin/subscriptions/' . $id)->with('success', 'Subscription updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscription::destroy($id);
        return redirect('/admin/subscriptions')->with('success', 'Subscription deleted successfully');
    }
}
