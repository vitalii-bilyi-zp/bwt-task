<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WeatherRepository;

class WeatherController extends Controller
{
    protected $weather;

    public function __construct(WeatherRepository $weather)
    {
        $this->middleware('auth');

        $this->weather = $weather;
    }

    public function index()
    {
    	$url = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';
        $weather = $this->weather->getWeatherData($url);
        
        return view('weather.index', compact('weather'));
    }
}
