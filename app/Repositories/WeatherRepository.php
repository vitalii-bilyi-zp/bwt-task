<?php

namespace App\Repositories;

use App\Review;
use App\Parser\Parser;
use \phpQuery;

class WeatherRepository
{	
	
  	public function getWeatherData($url)
  	{
    	$parser = new Parser();
		$html = $parser->exec($url);
		$doc = phpQuery::newDocument($html);

		return $doc->find('.forecast_frame .tabs');
  	}
}