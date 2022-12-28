<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

/**
 * Replace vocals with acents to vocals without acents
 *
 * @param string $string
 * @return string
 */
function replace_uppercases(string $string):string 
{
        return str_replace(
            array('Á', 'É', 'Í', 'Ó','Ú'),
            array('A', 'E', 'I', 'O','U'),
            $string
        );
}
/**
 * Represents the given resource data as JSON
 *
 * @param mixed $data
 * @param string $resource
 * @param int $code
 * @return JsonResponse
 */
function json(mixed $data, string $resource = null, int $code = 200):JsonResponse
{
    if($resource) {
        $data = new $resource($data);
    } else {
        if(!is_array($data) && !($data instanceof AnonymousResourceCollection)) {
            $data = [$data];
        }
    }

    return response()->json($data, $code);
}
/**
 * Convert Recursively from ISO-8859-1 to UTF-8
 *
 * @param mixed $dat
 * @return mixed
 */
function  convert_to_utf8_recursively($dat):mixed
{
    if( is_string($dat) ){
        return html_entity_decode(htmlentities($dat, ENT_QUOTES, "ISO-8859-1"),ENT_QUOTES, "UTF-8");

    }
    elseif( is_array($dat) ){
        $ret = [];
        foreach($dat as $i => $d){
            $ret[$i] = convert_to_utf8_recursively($d);
        }
        return $ret;
    }
    else{
        return $dat;
    }
}