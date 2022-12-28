<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZipCode;
use App\Http\Resources\ZipCodeResource;

class ZipCodeController extends Controller
{
    
    public function settlements(string $zipCode)
    {
        $zipCode = ZipCode::where('code',$zipCode)->with('municipality.federalEntity','locality.federalEntity','settlements.zoneType','settlements.settlementType')->first();
        return json($zipCode, ZipCodeResource::class);
    }
}
