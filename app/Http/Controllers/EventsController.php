<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Event::when($search, function ($q) use ($search) {
            $q->whereHas('category', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });

            $q->orWhere('name', 'like', '%' . $search . '%');
            $q->orWhere('details', 'like', '%' . $search . '%');
            $q->orWhere('price', 'like', '%' . $search . '%');
            $q->orWhere('status', 'like', '%' . $search . '%');
        })->orderBy('date', 'asc')->paginate(2);

        return view('admin.events.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.events.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $attributes = $request->all();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['category_id'] = $attributes['category'];

        Event::create($attributes);
        return redirect('/admin/events/new')->with('success', 'Event added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
