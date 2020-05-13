<?php

$app->router->get("guess/init", function () use ($app) {
    $game = new Affe\Guess\Guess();
    $_SESSION["guess"] = $game;
    $_SESSION["res"] = false;

    return $app->response->redirect("guess/play");
});



/**
 * Show game status
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game!";
    if (!isset($_SESSION["guess"])) {
        $_SESSION["guess"] = new Affe\Guess\Guess();
        $_SESSION["res"] = false;
    }

    $game = $_SESSION["guess"];

    $res = $_SESSION["res"] ?? null;
    $number = $game->number() ?? null;
    $tries = $game->tries() ?? null;
    $doCheat = $_SESSION["doCheat"] ?? null;

    $data = [
        "res" => $res ?? null,
        "tries" => $tries ?? null,
        "res" => $res ?? null,
        "guess" => $guess ?? null,
        "doCheat" => $doCheat ?? null,
        "number" => $number ?? null
    ];

    $app->page->add("guess/play", $data);
    
    //debug om man vill använda
    //$app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});


// Make a guess

$app->router->post("guess/play", function () use ($app) {
    $_SESSION["res"] = false;
    $_SESSION["doCheat"] = false;

    if ($_POST["doGuess"] ?? false) {
        $spelet = $_SESSION["guess"];
        $_SESSION["res"] = $spelet->makeGuess($_POST["guess"]);
        $_SESSION["guess"] = $spelet;

    } else if ($_POST["doInit"] ?? false) {
        unset($_SESSION["guess"]);
    } else if ($_POST["doCheat"] ?? false) {
        $_SESSION["doCheat"] = true;
    }

    return $app->response->redirect("guess/play");
});