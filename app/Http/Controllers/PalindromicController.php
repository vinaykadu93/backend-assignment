<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalindromicController extends Controller
{
    public function index(Request $request) {
        $string = strtolower($request->string);
        $palindrome = array();
        for ($i = 0; $i <= strlen($string); $i++) {
            $subString1 = substr($string, $i, strlen($string));
            for ($j = 0; $j <= strlen($subString1); $j++) {
                $subString2 = substr($subString1,0, $j);
                if ($this->isPalindrome($subString2) && strlen($subString2) > 2) {
                    array_push($palindrome, $subString2);
                }
            }
        }
        //sort palindrome array in descending order
        usort($palindrome,[$this, 'sort']);
        //calculate max score by multiplying first 2 elements
        $maxScore = strlen($palindrome[0]) * strlen($palindrome[1]);
        return $maxScore;
    }

    private function sort($a,$b){
        return strlen($b)-strlen($a);
    }

    private function isPalindrome($MyString) {
        $revString = strrev($MyString);
        if ($revString == $MyString){
            return true;
        } else {
            return false;
        }
    }
}
