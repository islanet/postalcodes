<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettlementType;

class SettlementController extends Controller
{
    
    public function types()
    {
        return  json(SettlementType::all());
    }
}
