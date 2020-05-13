<?php
class GuessException extends \Exception
{
}
try {
      $res = $game->makeGuess($guess);
  } catch (Affe\Guess\GuessException $e) {
      $res = '<p>Warning: </p>' . $e->getMessage();
  } catch (TypeError $e) {
      $res = `The given number {$guess} is out of range.`;
  }