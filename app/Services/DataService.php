<?php

namespace App\Services;

use App\Http\Requests\Export\InvoiceExportRequest;
use App\Models\Export;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Settlement;
use App\Models\FederalEntity;
use App\Models\Locality;
use App\Models\Municipality;
use App\Models\SettlementType;
use App\Models\ZoneType;
use App\Models\ZipCode;
use Illuminate\Support\Facades\Log;
use Throwable;

class DataService
{
    public function parse(array $chunk): void
    {
        
                    foreach ($chunk as $line) {
                        try {
                            $zipCodeCode = $line[0];
                            $settlementName = $line[1];
                            $settlementTypeName = $line[2];
                            $municipalityName = $line[3];
                            $federalEntityName = $line[4];
                            $localityName = $line[5];
                            $var = $line[6];
                            $federalEntityKey = $line[7];
                            $var1 = $line[8];
                            $var2 = $line[9];
                            $settlementTypeKey = $line[10];
                            $municipalityKey = $line[11];
                            $settlementKey = $line[12];
                            $zoneTypeName = $line[13];
                            $localityKey = $line[14]??null;
                            
                            $federalEntity = FederalEntity::where('name', $federalEntityName)->first();
                            if (!$federalEntity){
                                $federalEntity = new FederalEntity();
                                $federalEntity->name = $federalEntityName;
                                $federalEntity->key = $federalEntityKey;
                                $federalEntity->save();
                            }
                            $municipality = Municipality::where('name', $municipalityName)
                                            ->where('federal_entity_id',$federalEntity->id)->first();
                            if (!$municipality){
                                $municipality = new Municipality();
                                $municipality->name = $municipalityName;
                                $municipality->key = $municipalityKey;
                                $municipality->federal_entity_id = $federalEntity->id;
                                $municipality->save();
                            }
                            $localityId = null;
                            if ($localityName!=''){
                                $locality = Locality::where('name', $localityName)
                                                ->where('federal_entity_id',$federalEntity->id)->first();
                                if (!$locality){
                                    $locality = new Locality();
                                    $locality->name = $localityName;
                                    $locality->federal_entity_id = $federalEntity->id;
                                    $locality->code = $localityKey;
                                    $locality->save();
                                }
                                $localityId = $locality->id;
                            }
                            $zipCode = ZipCode::where('code', $zipCodeCode)
                            ->where('locality_id', $locality->id)
                            ->where('municipality_id', $municipality->id)->first();
                            if (!$zipCode){
                                $zipCode = new ZipCode();
                                $zipCode->locality_id =  $localityId;
                                $zipCode->municipality_id =  $municipality->id;
                                $zipCode->code = $zipCodeCode;
                                $zipCode->save();
                            }

                            $settlementType = SettlementType::where('name', $settlementTypeName)
                            ->first();
                            if (!$settlementType){
                                $settlementType = new SettlementType();
                                $settlementType->name = $settlementTypeName;
                                $settlementType->key = $settlementTypeKey;
                                $settlementType->save();
                            }
                            $zoneType = ZoneType::where('name', $zoneTypeName)
                            ->first();
                            if (!$zoneType){
                                $zoneType = new ZoneType();
                                $zoneType->name = $zoneTypeName;
                                $zoneType->key = 4;
                                $zoneType->save();
                            }

                            $settlement = Settlement::where('name', $settlementName)->first();
                            if (!$settlement){
                                $settlement = new Settlement();
                                $settlement->name = $settlementName;
                                $settlement->zone_type_id = $zoneType->id;
                                $settlement->settlement_type_id = $settlementType->id;
                                $settlement->zip_code_id = $zipCode->id;
                                $settlement->key = $settlementKey;
                                $settlement->locality_id = $localityId;
                                $settlement->municipality_id =  $municipality->id;
                                $settlement->save();
                            }
                        } catch (Throwable $e) {
                            Log::error($e->getMessage(), $line);
                            continue;
                        }
                    }
        
    }

    
}