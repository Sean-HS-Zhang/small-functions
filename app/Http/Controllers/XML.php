<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class XML extends Controller
{
    public function parsing() {
        $file = 'sample-reaxml.xml';
        $xml_string = file_get_contents(storage_path() . "/" . $file);
        $xml_object = simplexml_load_string($xml_string);
        $result = array();

        foreach ($xml_object as $property_type => $property) {
            $result[(string) $property->uniqueID] = $property_type;
        }

        return $result;
    }
}