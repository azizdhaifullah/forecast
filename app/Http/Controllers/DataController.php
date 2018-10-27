<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DataController extends Controller
{
    
    public function getRequestLocation(request $request)
    {
        $client = new Client();
        $getLoc = $client->request('GET', 'https://www.metaweather.com/api/location/search/?lattlong='.$request->lat.','.$request->long );
        $dataLoc = json_decode($getLoc->getBody());
        $woeid = $dataLoc[0]->woeid;
        
        $getDataWeather = $client->request('GET', 'https://www.metaweather.com/api/location/'.$woeid.'/' );
        $dataWeather = json_decode($getDataWeather->getBody()); 
        foreach ($dataWeather as $data) {
            $weather = $dataWeather->consolidated_weather;
        }
        return json_encode(array('weather'=>$weather,'loc'=>$dataWeather->title));
        //return view('show')->with('woeid',$woeid);
    }
}
