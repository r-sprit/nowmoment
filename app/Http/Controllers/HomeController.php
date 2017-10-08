<?php

namespace App\Http\Controllers;

use App\UserMode;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city_name = "Seoul";
        if( $request->has("top-search")) {
            $city_name = $request->get("top-search");
        }


        $usermode = \App\UserMode::where("user_id", AUth::id())
            ->orderBy('updated_at', 'desc')->first();


        return view('home/index', ['user_mode' => $usermode->current_mode]);
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

    public function localheritagefacilities() {
        return view("home/localheritage");
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

    public function addUserEmotions(Request $request) {
        date_default_timezone_set("Asia/Seoul");

        $usermode = \App\UserMode::updateOrCreate(
            ['user_id' => Auth::id(), 'current_mode' => $request->input("current_mode"),
            'current_time' => date("Y-m-d H:00:00")]
        );

        $usermode->updated_at = date("Y-m-d H:i:s");
        $usermode->save(['timestamps' => FALSE]);

        return var_dump($request->all());
        //return Response()->json($usermode);
    }

}
