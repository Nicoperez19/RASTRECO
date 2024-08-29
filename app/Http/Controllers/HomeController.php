<?php

namespace App\Http\Controllers;
use App\Models\SensorData;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = SensorData::latest('created_at')->first();
        return view('home', ['data' => $data]);
    }

 
}
