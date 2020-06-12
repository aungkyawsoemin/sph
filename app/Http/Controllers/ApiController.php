<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollutantIndex;
use App\Models\WeatherIndex;
use File;

class ApiController extends Controller
{
    private $third_party_apis = [
        'pollutant' => 'https://api.data.gov.sg/v1/environment/psi',
        'weather' => 'https://api.data.gov.sg/v1/environment/air-temperature'
    ];

    private $jsonFormat = [
        'code' => 200,
        'message' => 'success',
        'data' => array()
    ];

    public function getAirPollutionData(Request $request) {
        $batch = $this->getPollutant();
        $pollutant_data = PollutantIndex::where('batch', $batch)->get();

        $batch = $this->getWeather();
        $weather_data = WeatherIndex::where('batch', $batch)->get();

        $this->jsonFormat['data'] = [
            'pollutant_info' => $pollutant_data,
            'weather_info' => $weather_data,
        ];

        return response($this->jsonFormat, 200);
    }

    private function getPollutant() {
        $data_source = 'API';
        if(config('app.source_of_data') == 'API') $response = requestAPI($this->third_party_apis['pollutant'], 'GET');
        else {
            $data_source = 'FILE';
            $temp_response = json_decode(File::get(storage_path('json/12062020.json')), true);
            $response = $temp_response['pollutant_data'];
        }

        $last_index = PollutantIndex::where('batch','>', 0)->orderBy('batch','desc')->first();
        $batch = 0;
        if($last_index == null) $batch = 1;
        else $batch = $last_index->batch + 1;

        $pollutant_readings = $response['items'][0]['readings'];
        $pollutant_indexes = array();
        foreach($response['region_metadata'] as $region) {
            $regions[] = $region['name'];
        }
        $pollutant_types = ['pm10_twenty_four_hourly', 'pm25_twenty_four_hourly', 'co_sub_index', 'o3_sub_index', 'so2_sub_index'];
        
        foreach($regions as $region) {
            $temp_index = ['location' => $region, 'batch' => $batch, 'sourceOfData' => $data_source, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
            foreach($pollutant_types as $type) {
                $temp_index[$type] = $pollutant_readings[$type][$region];
            }
            $pollutant_indexes[] = $temp_index;
        }
        PollutantIndex::insert($pollutant_indexes);
        /** DeveloperComment
         * Return BATCH instead of direct pollutant data for getting Data from database
         * return $pollutant_indexes;
         *  */ 
        return $batch;
    }

    private function getWeather() {
        $data_source = 'API';
        if(config('app.source_of_data') == 'API') $response = requestAPI($this->third_party_apis['weather'], 'GET');
        else {
            $data_source = 'FILE';
            $temp_response = json_decode(File::get(storage_path('json/12062020.json')), true);
            $response = $temp_response['weather_data'];
        }

        $last_index = WeatherIndex::where('batch','>', 0)->orderBy('batch','desc')->first();
        $batch = 0;
        if($last_index == null) $batch = 1;
        else $batch = $last_index->batch + 1;

        $stations = array();
        foreach($response['metadata']['stations'] as $station) {
            $stations[] = [
                'batch' => $batch,
                'device_id' => $station['device_id'],
                'name' => $station['name'],
                'latitude' => $station['location']['latitude'],
                'longitude' => $station['location']['longitude'],
                'air_temp' => 0,
                'sourceOfData' => $data_source,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $items = collect($response['items'][0]['readings']);
        foreach($stations as &$row) {
            $temp = $items->firstWhere('station_id', '=', $row['device_id']);
            if($temp != null) $row['air_temp'] = $temp['value'];
        }
        WeatherIndex::insert($stations);
        return $batch;
    }
}
