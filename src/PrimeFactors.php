<?php

namespace App;

class PrimeFactors
{
    public function generate($number)
    {
        $factors = [];

        for ($divisor = 2; $number > 1; $divisor++)
        {
            for (; 0 === $number % $divisor; $number /= $divisor)
            {
                $factors[] = $divisor;
            }
        }
        
        return $factors;
    }
}