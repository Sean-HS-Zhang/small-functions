<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class String_Action extends Controller
{
    public function merge(Request $request) {
        $string_1 = $request['string_1'];
        $string_2 = $request['string_2'];

        if (empty($string_1) || empty($string_2)) {
            return "Two strings are required";
        }

        $merged_string = "";
        $string_1_length = strlen($string_1);
        $string_2_length = strlen($string_2);

        for ($i = 0; $i < max($string_1_length, $string_2_length); $i++) {
            if (!empty($string_1[$i]) && !empty($string_2[$i])) {
                $merged_string = $merged_string . $string_1[$i] . $string_2[$i];
            } elseif (empty($string_2[$i])) {
                $merged_string = $merged_string . $string_1[$i];
            } else {
                $merged_string = $merged_string . $string_2[$i];
            }
        }

        return $merged_string;
    }
}