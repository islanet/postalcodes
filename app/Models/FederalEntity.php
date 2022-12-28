<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;


    /**
    * Get the the localities of Federal Entity
    */
    public function localities()
    {
        return $this->hasMany(Locality::class);
    }
    /**
    * Get the the monicipalities of Federal Entity
    */
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

}