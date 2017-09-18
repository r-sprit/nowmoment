<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        return view('home/index');
    }

    public function minor()
    {
        return view('home/minor');
    }

    public function datapoints()
    {
        echo "HELLO WORLD";
        return  new RedirectResponse("http://localhost:7000/basic");
    }
}
