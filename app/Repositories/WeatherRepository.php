<?php

namespace App\Repositories;

use App\Review;
use App\Parser\Parser;
use \phpQuery;

class WeatherRepository
{	
	/**
   * Parsing of weather data received by $url, and its subsequent storage in array.
   *
   * @param string $url
   * @return array
   */
  	public function getWeatherData($url)
  	{
    	$parser = new Parser();
		$html = $parser->exec($url);
		$doc = phpQuery::newDocument($html);
		
		$title = $doc->find('.pageinfo_title h1')->text();
		$tabs = $doc->find('.forecast_frame .tab');

		$data = [];
		foreach($tabs as $tab) {
			$tab = pq($tab);

			$date = [];
			$temperature = [];
			$svg = [];

			$date[0] = $tab->find('.tab-content .date:eq(0)')->text();
			$date[1] = $tab->find('.tab-content .date:eq(1)')->text();

			if(count($tab->find('.tab-weather'))) {
				$temperature['c'] = $tab->find('.tab-weather__value .unit_temperature_c')->text();
				$temperature['f'] = $tab->find('.tab-weather__value .unit_temperature_f')->text();
			}
			else {
				$temperature['min']['c'] = $tab->find('.tabtempline .values .value:eq(0) .unit_temperature_c')->text();
				$temperature['min']['f'] = $tab->find('.tabtempline .values .value:eq(0) .unit_temperature_f')->text();
				$temperature['max']['c'] = $tab->find('.tabtempline .values .value:eq(1) .unit_temperature_c')->text();
				$temperature['max']['f'] = $tab->find('.tabtempline .values .value:eq(1) .unit_temperature_f')->text();
			}

			$svg['element'] = $tab->find('.img svg');

			$data[] = compact('date', 'temperature', 'svg');
		}

		return compact('title', 'data');
  	}
}