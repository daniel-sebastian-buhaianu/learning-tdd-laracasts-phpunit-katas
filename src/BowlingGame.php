<?php

namespace App;

class BowlingGame
{
    protected array $rolls = [];

    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        return array_sum($this->rolls);
    }
}