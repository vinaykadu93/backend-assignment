<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    public function index(Request $request) {
        $string = str_replace(' ', '', $request->string);

        $squareRoot = sqrt(strlen($string));
        $whole = floor($squareRoot);
        $fraction = $squareRoot - $whole;
        if ($fraction > 0) {
            $liesFrom = (int)$whole;
            $liesTo = $liesFrom + 1;
        } else {
            $liesFrom = (int)$whole - 1;
            $liesTo = $liesFrom + 1;
        }

        $start = 0;
        $encryptedArray = array();

        for($i = 0 ; $i<$liesFrom; $i++) {
            array_push($encryptedArray, substr($string,$start, $liesTo));
            $start += $liesTo;
        }

        $encryptedString = '';
        for ($i = 0; $i < strlen($encryptedArray[0]); $i++) {
            for ($j = 0; $j < count($encryptedArray); $j++) {
                $encryptedString .= substr($encryptedArray[$j],$i, 1);
            }
            $encryptedString .= ' ';
        }

        return $encryptedString;
    }
}
