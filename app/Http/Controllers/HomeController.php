<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home/index');
    }

    public function minor()
    {
        return view('home/minor');
    }

    public function sample()
    {
        return view('home/sample');
    }

    public function healthfacilities() {
        return view('home/healthfacilities');
    }

    public function campingfacilities() {
        return view('home/camping');
    }

    public function bicyclerental() {
        return view('home/bicyclerental');
    }

    public function civildefencefacilities() {
        return view('home/civildefence');
    }

    public function touristsitesInfo() {
        return view('home/touristsites');
    }

}
