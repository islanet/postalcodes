<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;


    /**
    * Get the the Federal Entity of Locality
    */
    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

    /**
    * Get the the zip codes of Locality
    */
    public function zipCodes()
    {
        return $this->hasMany(ZipCode::class);
    }

}
