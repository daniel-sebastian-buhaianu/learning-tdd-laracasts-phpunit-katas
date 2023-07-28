<?php

use PHPUnit\Framework\TestCase;
use App\BowlingGame;

class BowlingGameTest extends TestCase
{
    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

    /** @test */
    function it_scores_all_ones()
    {
        $game = new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }

    /** @test */
    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $game = new BowlingGame();

        $game->roll(5);
        $game->roll(5);
        // score so far: 5 + 5 + 8 = 18 (spare bonus)

        $game->roll(8);
        // score so far: 18 + 8 = 26

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(26, $game->score());
    }

    /** @test */
    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $game = new BowlingGame();

        $game->roll(10);
        // score so far: 10 + 5 + 2 = 17 (strike bonus)

        $game->roll(5);
        $game->roll(2);
        // score so far: 17 + 7 = 24 

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }

        $this->assertSame(24, $game->score());
    }

    /** @test */
    function a_spare_in_the_final_frame_grants_one_extra_ball()
    {
        $game = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5);

        $game->roll(5);

        $this->assertSame(15, $game->score());
    }
}