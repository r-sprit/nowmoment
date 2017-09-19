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
    public function getLatestData() {
        $sql_expr = "DATE_FORMAT(`RECORD_DATE`, '%Y-%m-%d %H:%i') as RECORD_DATE, 
                     MAX(WIND) AS WIND, MAX(SOLAR) AS SOLAR, 
                     MAX(TEMPERATURE) AS TEMPERATURE, MAX(HUMADITY) AS HUMADITY, SENSOR_ID";
        $live_weather_data = DB::table("LIVE_WEATER_SENSOR_DATA")
            ->select(DB::raw($sql_expr))
            ->groupby('RECORD_DATE', 'SENSOR_ID')
            ->orderBy('ID', 'desc')
            ->take(10)->get();

        $output_coll = collect([
            "SENSOR_ID" => $live_weather_data->pluck("SENSOR_ID"),
            "RECORD_DATE" => $live_weather_data->pluck("RECORD_DATE"),
            "TEMPERATURE" => $live_weather_data->pluck("TEMPERATURE"),
            "WIND" => $live_weather_data->pluck("WIND"),
            "HUMADITY" => $live_weather_data->pluck("HUMADITY"),
            "SOLAR" => $live_weather_data->pluck("SOLAR")
        ]);

        return Response()->json($output_coll);
    }
}