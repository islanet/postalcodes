<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class SettlementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $zoneType = '';
        if (Arr::get($this->resource, 'zoneType')) {
            $zoneType = replace_uppercases(mb_strtoupper(Arr::get($this->resource->zoneType, 'name')));
        }
        
        $settlementType = [];
        if (Arr::get($this->resource, 'settlementType')) {
            $settlementType['name'] = replace_uppercases(Arr::get($this->resource->settlementType, 'name'));
        }
        return [
            'key' => Arr::get($this->resource, 'key'),
            'name' => replace_uppercases(mb_strtoupper(Arr::get($this->resource, 'name'))),
            'zone_type' => $zoneType,
            'settlement_type' => $settlementType,
        ];
    }

   
}