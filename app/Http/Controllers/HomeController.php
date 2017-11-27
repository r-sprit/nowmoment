<?php

namespace App\Http\Controllers;

use App\UserMode;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\View\View;


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

        if (is_null($usermode)) {
            return view('home/index', ['user_mode' => "netural"]);
        }

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

    public function predict_mode() {

        $sql_expr = "DATE_FORMAT(`forcost_date`, '%Y%m%d') as forcost_date, 
                     ROUND(AVG(humidity), 2) AS humidity, 
                     ROUND(AVG(temperature_max), 2) AS temperature, 
                     sky, ROUND(AVG(pressure), 2) AS pressure, 
                     AVG(rain) AS rain,
                     ROUND(AVG(wind_speed), 2) AS wind_speed";
        $live_weather_data = DB::table("live_weather_forcast")
            ->select(DB::raw($sql_expr))
            ->groupBy("forcost_date", "city_id")
            ->where("city_id", "1835848")
            ->orderBy('forcost_date', 'desc')
            ->take(60)->get();

        $command = escapeshellcmd('/var/pythonscript/prediction_result.py');

        $cmd_output = shell_exec($command . " " . $live_weather_data . " 2>&1");
		#echo $cmd_output;
        $cmd_output = str_replace(["[", "]", "\n"], "", $cmd_output);
        $cmd_output = explode(" ", $cmd_output);



       $forcast_date = $live_weather_data->pluck("forcost_date")->toArray();
        $output_coll = array_combine(
            $forcast_date,
            $cmd_output);
        return Response()->json($output_coll);
    }

    public function getNaverNews(Request $request) {

        $city_name = "Seoul";
        if( $request->has("news_city_name")) {
            $city_name = $request->get("news_city_name");
        }

        $sql_query = "SELECT TRIM(english_name) as english_name FROM cities_korean";
        $results = DB::select($sql_query);

        $sql_query = "SELECT * FROM cities_korean WHERE MATCH(english_name) AGAINST('$city_name')";
        $cities_results = DB::select($sql_query);

        $korean_city_name = "";

        foreach ($cities_results as $city_result) {
            $korean_city_name = $korean_city_name . $city_result->state . " ";
            $korean_city_name = $korean_city_name . $city_result->district . " ";
            $korean_city_name = $korean_city_name . $city_result->city . " ";
        }


        $client = new Client();
        $response = $client->request('GET', 'https://openapi.naver.com/v1/search/news.json', [
            'query' => ['query' => $korean_city_name, "display" => 5],
            'headers' => ["content-type" => "application/json",
                            'X-Naver-Client-Id' => 'dvK_oJU8XFF4kyG1bVCJ',
                            'X-Naver-Client-Secret' => 'pACS2Bxrrj'
                ],
        ]);
        #echo $response->getStatusCode() . "<br />";      // >>> 200
        #echo $response->getReasonPhrase() . "<br />";    // >>> OK
        $body = json_decode($response->getBody(), TRUE);
        #echo var_dump($body["items"]);
        return  \view("home/navernews",  ['news_data' => $body["items"],
            'cities_list' => $results, 'city_name' => $city_name]);

    }

}
