<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 9/30/2017
 * Time: 10:39 PM
 */

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class UtilitiesController extends Controller
{
    public function getcities() {
        $cities = DB::table("cities")->select("id", "name")->get();
        #echo mb_convert_encoding("\u00e2", "UTF-8");
        return Response()->json($cities)->header(
            'Content-Type', 'application/json; charset=UTF-8');

    }

}