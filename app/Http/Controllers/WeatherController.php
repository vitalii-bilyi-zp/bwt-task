<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WeatherRepository;

class WeatherController extends Controller
{
    /**
     * The weather repository instance.
     *
     * @var WeatherRepository
     */
    protected $weather;

    /**
     * Create a new controller instance.
     *
     * @param  WeatherRepository  $weather
     * @return void
     */
    public function __construct(WeatherRepository $weather)
    {
        $this->middleware('auth');

        $this->weather = $weather;
    }

    /**
     * Display the weather forecast that specified by $url.
     *
     * @return Response
     */
    public function index()
    {
    	$url = 'https://www.gismeteo.ua/weather-zaporizhia-5093/';
        $weather = $this->weather->getWeatherData($url);
        
        return view('weather.index', compact('weather'));
    }
}
