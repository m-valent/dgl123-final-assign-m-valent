<!DOCTYPE html>
<html lang="en">
<!--
Title:      Final Assignment

Student:    Misko Valent
Due Date:   Dec 08, 2021
Filename:   index.php

Class:      DGL 123 - Introduction to PHP
Semester:   2021 Fall North Island College
Instructor: Brad Best
-->

<?php

include "trick/variables.php";
include "inspect/show_beginning.php";  // for testing, to follow along
include "trick/shuffle_start.php";

// when starting out, this clears the .txt files, clean slate
if ($dealCards && $shuffleCards) {
  unlink('playCards.txt');
  unlink('playCards02.txt');
  unlink('playCards03.txt');
}

if ($round == 4){

  $cardMagic = file_get_contents('playCards03.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "inspect/show_round04.php";  // for testing, to follow along
  include "trick/shuffle_round04.php"; // reorganize the first 9 cards containing THE CARD


} elseif ($round == 3) {

  $cardMagic = file_get_contents('playCards02.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "inspect/show_round03.php";  // for testing, to follow along
  include "trick/shuffle_round03.php"; // reorganize the first 9 cards containing THE CARD

} elseif ($round == 2) {

  $cardMagic = file_get_contents('playCards.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "inspect/show_round02.php";  // for testing, to follow along
  include "trick/shuffle_round02.php"; // track the column containing THE CARD
}

include "inspect/show_currentValues.php"; // for testing, to follow along

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="images/cards/joker_red.png" type="image/x-icon" /> <!-- intention is to alter the image at end of trick -->

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/styles.css" />

  <title>Your Card by Misko Valent</title>
</head>

<body>
  <div class="container">
    <h1>Magic Card Trick</h1>
    <h3>Misko will guess your playing card!</h3>
    <p>Greetings, nothing in life is assured except death and taxes. Misko will attempt to guess what your playing card is and if correct you will owe him $1 Billion. Sound fair?</p>

    <h3>Instructions:</h3>
    <ol>
      <li>Click on the Shuffle & Deal button.</li>
      <li>Once the cards are dealt, take a moment, pick a card and remember it. Don't touch the screen or hover the mouse over it, use your mind only!</li>
      <li>When you have committed the card to memory, click on the button below the column in which your card is located. Please select correctly.</li>
      <li>The cards will be re-dealt, find your card, and select the button below the column that your card is located in. Again select carefully.</li>
      <li>One more time. After the cards are again re-dealt, please select and click the button below the column in which your card is located. Prepare for the review!</li>
    </ol>

    <form name="shuffle_button" action="" method="post">
      <input type="hidden" name="deal_cards" value="true">
      <div class="text-right">
        <h6>By clicking this button,<br />you accept the challenge!</h6>
        <input type="hidden" name="round" value="1">

        <button type="submit" class="btn btn-primary" name="shuffle_cards" value="true">Shuffle & Deal the Cards</button>
      </div>
    </form>
    <hr>
  </div>
  <div class="tableTop container">

    <br>
    <!-- displaying cards -->
    <div class="row">

      <!-- cards in 1st column -->
      <div class="col text-center">
        <?php
        
        for ($i = 0; $i < 26; $i += 3) {
          // this will post the cards from $playingCards array
          if ($round >= 2) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            // $cardColumn1[] = $playingCards[$i];
          } elseif ($dealCards) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn1[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_black.png'>";
          }
        }

        // this will "save" the new sequence into text file
        if ($round == 3) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn1[$card]\n";
            file_put_contents('playCards03.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($round == 2) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn1[$card]\n";
            file_put_contents('playCards02.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn1[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }
        ?>
      </div>

      <!-- cards in 2nd column -->
      <div class="col text-center">
        <?php
        for ($i = 1; $i < 26; $i += 3) {
          // this will post the cards from $playingCards array
          if ($round >= 2) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            // $cardColumn2[] = $playingCards[$i];
          } elseif ($dealCards) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn2[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_red.png'>";
          }
        }

        // this will "save" the new sequence into text file
        if ($round == 3) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn2[$card]\n";
            file_put_contents('playCards03.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($round == 2) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn2[$card]\n";
            file_put_contents('playCards02.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn2[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }
        ?>
      </div>

      <!-- cards in 3rd column -->
      <div class="col text-center">
        <?php
        for ($i = 2; $i <= 26; $i += 3) {
          // this will post the cards from $playingCards array
          if ($round >= 2) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            // $cardColumn3[] = $playingCards[$i];
          } elseif ($dealCards) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn3[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_black.png'>";
          }
        }

        // this will "save" the new sequence into text file
        if ($round == 3) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards03.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($round == 2) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards02.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }

        ?>
      </div>

    </div> <!-- row end displaying cards -->

    <form name="pick_column" action="" method="post">

      <?php
      if ($round == 3) {
        $value = '4';
      } elseif ($round == 2) {
        $value = '3';
      } elseif ($dealCards == true or $round == 1) {
        $value = '2';
      }
      ?>

      <input type="hidden" name="round" value="<?php echo $value; ?>">

      <?php

      $display = 'd-none'; // to not display the buttons until ready

      if ($dealCards == true or $round >= 1) {
        $display = '';
      }

      ?>
      <div class="row mt-2 <?php echo $display; ?>">
        <div class="col text-center">
          <button type="submit" class="btn btn-warning" name="column" value="1">Card is above</button>
        </div>

        <div class="col text-center">
          <button type="submit" class="btn btn-warning" name="column" value="2">Card is above</button>
        </div>

        <div class="col text-center">
          <button type="submit" class="btn btn-warning" name="column" value="3">Card is above</button>
        </div>
      </div>
      <br>
    </form>
    <br>

    <?php include "inspect/show_end.php"; ?> <!-- for testing, to follow along -->

  </div>

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- in case I feel to style the page, 
        if need be bootstrap 4.6 is something I am used to -->
</body>

</html>