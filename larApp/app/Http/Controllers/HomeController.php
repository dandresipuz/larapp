<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home')->with('message', 'Bienvenido de nuevo '. Auth::user()->name . ' Es un gusto volver a verte');
    }
}
