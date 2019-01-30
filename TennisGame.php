<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    public $score = '';

    public function getScore($playerOneScore, $playerTwoScore)
    {
        $advantagePlayer = $playerOneScore >= 4 || $playerTwoScore >= 4;
        $deuce = $playerOneScore == $playerTwoScore;
        if ($deuce) {
            $this->matchDeuce($playerOneScore);
        } else if ($advantagePlayer) {
            $this->matchAdvantage($playerOneScore, $playerTwoScore);
        } else {
            $this->matchResult($playerOneScore, $playerTwoScore);
        }
    }

    public function __toString()
    {
        return $this->score;
    }

    public function matchAdvantage($playerOneScore, $playerTwoScore)
    {
        $minusResult = $playerOneScore - $playerTwoScore;
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player2";
    }

    public function matchDeuce($playerOneScore)
    {
        switch ($playerOneScore) {
            case 0:
                $this->score = "Love-All";
                break;
            case 1:
                $this->score = "Fifteen-All";
                break;
            case 2:
                $this->score = "Thirty-All";
                break;
            case 3:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;

        }
    }

    public function matchResult($playerOneScore, $playerTwoScore)
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $playerOneScore;
            else {
                $this->score .= "-";
                $tempScore = $playerTwoScore;
            }
            switch ($tempScore) {
                case 0:
                    $this->score .= "Love";
                    break;
                case 1:
                    $this->score .= "Fifteen";
                    break;
                case 2:
                    $this->score .= "Thirty";
                    break;
                case 3:
                    $this->score .= "Forty";
                    break;
            }
        }
    }
}