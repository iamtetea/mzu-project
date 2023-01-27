<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\EventCollection;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Event::orderBy('date', 'asc')->paginate();
        return view('index', compact('data'));
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function getEvents(Request $request)
    {
        return Event::where('status', $request->status)->orderBy('date', 'asc')->get();
    }

    public function getEventsApi()
    {
        $events = Event::orderBy('date', 'asc')->get();
        // return $events;
        return new EventCollection($events);
    }

    public function storeCategory(CategoryRequest $request)
    {
        return Category::create($request->all());
    }

    public function updateCategory(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        return $data;
    }

    public function deleteCategory($id)
    {
        Category::destroy($id);
        return 'ok';
    }
}
