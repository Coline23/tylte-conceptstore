<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function concept()
    {
        return view('concept');
    }

    public function espacebarjeux()
    {
        return view('espacebarjeux');
    }

    public function shop()
    {
        return view('shop');
    }
}