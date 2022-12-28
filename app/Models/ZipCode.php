<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    /**
    * Get the the settlements of ZipCodes
    */
    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
    /**
    * Get the the municipality of ZipCodes
    */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
     /**
    * Get the the locality of ZipCodes
    */
    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }


}
