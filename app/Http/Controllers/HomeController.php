<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Event::orderBy('date', 'asc')->paginate(3);
        return view('index', compact('data'));
    }

    public function dashboard()
    {
        return view('admin.index');
    }
}
