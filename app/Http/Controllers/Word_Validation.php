<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Word_Validation extends Controller
{
    public function hasDuplicate(Request $request) {
        $word = $request['word'];

        if (empty($word)) {
            return "No word is provided";
        }

        $letters = array();
        $word_lowercase = strtolower($word);
        $string_length = strlen($word_lowercase);
        for ($i = 0; $i < $string_length; $i++) {
            if (empty($letters[$word_lowercase[$i]])) {
                $letters[$word_lowercase[$i]] = $word_lowercase[$i];
            } elseif (preg_match ("/[a-z]/", $word_lowercase[$i])) {
                return false;
            }
        }

        return true;
    }
}
