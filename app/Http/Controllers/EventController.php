<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 9/21/2017
 * Time: 10:23 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        $id = Auth::id();

        DB::table('events_list')->insert([
            'user_id' => $id,
                'date' => $request->input('event_date'),
                'event' => $request->input('event_text')]
        );

        return "SUCESSS";
    }

    public function get(Request $request) {
        return DB::table("events_list")
            ->select("event AS title", "date AS start", "date AS end")
            ->where("user_id", "=", Auth::id())
            ->where("date", ">=", $request->input('start'))
            ->where("date", "<=", $request->input('end'))
            ->distinct()->get();
    }

}