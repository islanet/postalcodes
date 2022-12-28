<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DataService;
use App\Jobs\ZipdataCSVUploadJob;

class DataController extends Controller
{
    protected DataService $dataService;
    /**
     * DataController constructor.
     */
    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function save(Request $request)
    {
        ini_set('max_execution_time', 300);
        if( $request->has('zipdata') ) {

            $csv = file($request->zipdata);
            $chunks = array_chunk($csv,3000);

            foreach ($chunks as $key => $chunk) {
                $data   = array_map(function($data) { return str_getcsv($data,"|");}
                , $chunk);
                  
                $data = convert_to_utf8_recursively($data);
                dispatch( new ZipdataCSVUploadJob(
                    $data
                ));
            }
        }
        return  json([]);
    } 
    
}
