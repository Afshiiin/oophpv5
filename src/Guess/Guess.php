<?php

namespace Affe\Guess;


/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    private $number = null; //the secret num (random)
    public $tries = 6;


     


    public function __construct(int $number = -1, int $tries = 6)
    { 

        $this->tries = $tries;
        if ($number === -1) {
            $number = rand(1, 100);
        }
        $this->number = $number;
    }

    public function random() : void 
    {
        $this->number = rand(1, 100);
    }
    
    public function tries() 
    {
        return $this->tries;
    }
    
    public function number() 
    {
        return $this->number;
    }
    
    public function makeGuess($guess) : string 
    {
        $_SESSION['guessNumber']=$guess;
        if ($guess < 1 || $guess > 100 || empty($_POST['guess'])) {
            try {
                throw new GuessException("Try one more time!");
            }
            catch (GuessException $e) {
              echo $e->errorMessage();
              $res =null;
            }
        } elseif (intval($guess) === $this->number) {
            $res = " correct";
            $this->tries = 0;
        //    unset($_SESSION["number"]);
        //    unset($_SESSION["tries"]);
        } elseif ($guess > $this->number && $this->tries > 0) {
            $this->tries -= 1;
            $res = " too High";
        } elseif ($guess < $this->number && $this->tries > 0) {
            $this->tries -= 1;
            $res = " too Low";
        } else {
            $this->tries = 0;
            $res = " not accepted because you have no chance left to play.";
        }
        return $res;
    }
}
