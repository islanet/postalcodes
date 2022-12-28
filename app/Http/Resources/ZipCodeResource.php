<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ZipCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $locality = '';
        if (Arr::get($this->resource, 'locality')) {
            $locality = Arr::get($this->resource->locality, 'name');
        }
        $municipality = [];
        if (Arr::get($this->resource, 'municipality')) {
            $municipality['key'] = Arr::get($this->resource->municipality, 'key');
            $municipality['name'] = replace_uppercases(mb_strtoupper(Arr::get($this->resource->municipality, 'name')));
        }
        $federalEntity = [];
        if (Arr::get($this->resource->municipality, 'federalEntity')) {
            $federalEntity['key'] = Arr::get($this->resource->municipality->federalEntity, 'key');
            $federalEntity['name'] = replace_uppercases(mb_strtoupper(Arr::get($this->resource->municipality->federalEntity, 'name')));
            $federalEntity['code'] = Arr::get($this->resource->municipality->federalEntity, 'code');

        }
        return [
            'zip_code' => Arr::get($this->resource, 'code'),
            'locality' => replace_uppercases(mb_strtoupper($locality)),
            'federal_entity' => $federalEntity,
            'settlements' => SettlementResource::collection($this->settlements),
            'municipality'=> $municipality,
        ];
    }

   
}