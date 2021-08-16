<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Number extends Controller
{
    public function superInt(Request $request) {
        $number = (int) $request['number'];

        if (empty($number) || !is_int($number)) {
            return "Please provide an integer";
        }

        $super_int = $super_int_calculating = $number;
        //$number_string = (string) $number;
        
        while (strlen((string) $super_int) > 1) {
            $super_int_string = (string) $super_int;
            $number_length = strlen($super_int_string);
            $super_int_calculating = 0;

            for ($i = 0; $i < $number_length; $i++) {
                $super_int_calculating += (int) $super_int_string[$i];
            }

            $super_int = $super_int_calculating;
        }

        return $super_int;
    }
}