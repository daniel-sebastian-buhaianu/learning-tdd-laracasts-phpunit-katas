<?php

namespace App;

class RomanNumerals
{
    const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    static public function generate($number)
    {
        if (1 > $number || 3999 < $number)
        {
            return false;
        }

        $result = '';

        foreach (static::NUMERALS as $numeral => $arabic)
        {
            for (; $number >= $arabic; $number -= $arabic)
            {
                $result .= $numeral;
            }
        }

        return $result;
    }
}