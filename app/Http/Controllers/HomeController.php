<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }

    public function minor()
    {
        return view('home/minor');
    }

    public function datapoints()
    {
        return [0, 1, 2, 3];
    }
}
