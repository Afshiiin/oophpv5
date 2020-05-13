<?php

namespace Affe\Guess;

class GuessException extends \Exception
{
    public function errorMessage() {
    //error message
    $errorMsg = '<h1>Error!!!</h1><hr><br> Error on line <b>'.$this->getLine().
    '</b> in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> <br>';
    return $errorMsg;
  }
}

