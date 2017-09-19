<?php
/**
 * Created by PhpStorm.
 * User: Shoaib
 * Date: 9/19/2017
 * Time: 12:40 PM
 */

namespace App\Http\Controllers;


class DataJson extends Controller
{
    public function datapoints()
    {
        return Response("HELLO WORLD");
    }
}