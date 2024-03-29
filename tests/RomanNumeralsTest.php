<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** 
     * @test
     * @dataProvider checks 
    */
    public function it_generates_roman_numeral_for_number_equal_or_greater_than_1($number, $expected)
    {
        $this->assertEquals($expected, RomanNumerals::generate($number));
    }

    /** @test */
    public function it_cannot_generate_roman_numeral_for_number_less_than_1()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    public function it_cannot_generate_roman_numeral_for_number_greater_than_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    static public function checks()
    {
        return [
            [1,'I'],
            [2,'II'],
            [3,'III'],
            [4,'IV'],
            [5,'V'],
            [6,'VI'],
            [7,'VII'],
            [8,'VIII'],
            [9,'IX'],
            [10,'X'],
            [13,'XIII'],
            [14,'XIV'],
            [20,'XX'],
            [49,'XLIX'],
            [50,'L'],
            [99,'XCIX'],
            [100,'C'],
            [400,'CD'],
            [500,'D'],
            [900, 'CM'],
            [1000,'M'],
            [3999,'MMMCMXCIX'],
        ];
    }
}