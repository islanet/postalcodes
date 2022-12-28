<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    /**
    * Get the the ZoneType of Settlement
    */
    public function zoneType()
    {
        return $this->belongsTo(ZoneType::class);
    }
    /**
    * Get the the settlementType of Settlement
    */
    public function settlementType()
    {
        return $this->belongsTo(SettlementType::class);
    }
}
