<?php
/**
 * Created by PhpStorm.
 * User: Shoaib
 * Date: 9/19/2017
 * Time: 12:47 PM
 */

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WeatherDataController extends Controller
{
    public function getLatestData($city_id = 1835848) {
        $sql_expr = "DATE_FORMAT(`record_date`, '%Y-%m-%d %H:%i') as record_date, 
                     humidity, temperature, pressure, wind_speed";
        $live_weather_data = DB::table("live_weather_api")
            ->select(DB::raw($sql_expr))
            ->where("city_id", $city_id)
            ->orderBy('id', 'desc')
            ->take(24)->get();

        $output_coll = collect([
            "RECORD_DATE" => $live_weather_data->pluck("record_date"),
            "TEMPERATURE" => $live_weather_data->pluck("temperature"),
            "WIND" => $live_weather_data->pluck("wind_speed"),
            "HUMADITY" => $live_weather_data->pluck("humidity"),
            "SOLAR" => $live_weather_data->pluck("pressure")
        ]);

        return Response()->json($output_coll);
    }
}