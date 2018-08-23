<?php

use App\FieldReflection;

function castObjectToArray($object)
{
    $array = (array)$object;
    $arrayWithCorrectedKeys = array();
    foreach ($array as $key => $value) {
        $keyItems = explode("\0", $key);
        $correctedKey = end($keyItems);
        $arrayWithCorrectedKeys[$correctedKey] = $value;
    }
    return $arrayWithCorrectedKeys;
}