<?php

namespace App\Http\Controllers\Api\v1\Front\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return $cities;
    }
}
