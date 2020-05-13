<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?>
<h1>Guess a number between 0-100!</h1>
<p>You have <?= $tries ?> chance left.</p>
<form method="post">
    <input type="text" name="guess" pattern="[0-9]{1,3}">
<!--   <input type="hidden" name="number" value="80">
    <input type="hidden" name="tries" value="6"> -->
    <input type="submit" name="doGuess" value="Gissa">
    <input type="submit" name="doInit" value="Spela igen">
    <input type="submit" name="doCheat" value="Fuska">
</form>

<?php if ($res) : ?>
    <p>Your guess <b><?= $_SESSION['guessNumber']; ?></b> is <b><?= $res ?></b></p>
<?php endif;
 ?>

<?php if ($doCheat) : ?>
    <p>Cheat : The number is<b> <?= $number; ?></b></p>
<?php endif; 
?>