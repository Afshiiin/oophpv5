<?php

include "./src/autoload.php";
include "./src/config.php";
//require __DIR__ . "./src/guess.php";

session_name("guess");
session_start();

//$number=$_POST["number"] ?? null;
//$tries=$_POST["tries"] ?? null;
$guess=$_POST["guess"] ?? null;
$doInit=$_POST["doInit"] ?? null;
$doGuess=$_POST["doGuess"] ?? null;
$doCheat=$_POST["doCheat"] ?? null;

$number = $_SESSION["number"] ?? null;
$tries = $_SESSION["tries"] ?? null;
$game=null;

if ($doInit || $number === null) {
    $game = new Guess();
    $number = $_SESSION["number"] = $game->number();
    $tries = $_SESSION["tries"] = $game->tries();
    //$tries = 5;
} elseif ($doGuess) {
    $game = new Guess($number, $tries);
    $res = $game->makeGuess($guess);
    $_SESSION["tries"]=$game->tries();
}
//var_dump($_SESSION["number"]);
//var_dump($_SESSION["tries"]);
include "./src/form.php";
