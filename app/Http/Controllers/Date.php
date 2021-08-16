<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Date extends Controller
{
    protected $ordinals = array(
        "first",
        "second",
        "third",
        "fourth",
        "fifth",
        "last"
    );

    protected $days = array(
        "monday",
        "tuesday",
        "wednesday",
        "thursday",
        "friday",
        "saturday",
        "sunday"
    );

    public function parsing(Request $request) {
        $date_description = $request['date_description'];

        if (empty($date_description)) {
            return "No date is provided";
        }

        $invalid_description = "Please provide date description in a correct format";
        $date_segments = explode("of", $date_description);

        if (count($date_segments) !== 2) {
            return $invalid_description;
        }

        $month = strtotime($date_segments[1]);
        $ordinal = null;
        $day = null;
        foreach (explode(" ", strtolower($date_segments[0])) as $day_info) {
            if (in_array($day_info, $this->ordinals)) {
                $ordinal = $day_info;
            }

            if (in_array($day_info, $this->days)) {
                $day = $day_info;
            }
        }

        if (!empty($ordinal) && !empty($day)) {
            $date = date("Y-m-d", strtotime($ordinal . ' ' . $day . " of this month", $month));

            return $date;
        } else {
            return $invalid_description;
        }
    }
}