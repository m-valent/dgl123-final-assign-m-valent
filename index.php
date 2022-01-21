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
include "trick/shuffle_start.php";
include "php/counter_func.php";

// when starting out or RESTARTING, this clears the .txt files, clean slate
if ($dealCards && $shuffleCards) {

  if (is_file('playCards.txt')) {
  unlink('playCards.txt');
  }

  if (is_file('playCards02.txt')) {
    unlink('playCards02.txt');
    }
  
    if (is_file('playCards03.txt')) {
      unlink('playCards03.txt');
      }
}

if ($round == 4){

  $cardMagic = file_get_contents('playCards03.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "trick/shuffle_round04.php"; // reorganize the first 9 cards containing THE CARD

} elseif ($round == 3) {

  $cardMagic = file_get_contents('playCards02.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "trick/shuffle_round03.php"; // reorganize the first 9 cards containing THE CARD

} elseif ($round == 2) {

  $cardMagic = file_get_contents('playCards.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  include "trick/shuffle_round02.php"; // track the column containing THE CARD
}
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
    <?php include "trick/display_instructions.php"; ?>

    <h1>Magic Card Trick</h1>
    <h3 class="<?php echo $show; ?>">Misko will guess your playing card!</h3>
    <h3 class="<?php echo $showCard; ?>">Misko will now reveal your card...</h3>
    <p class="<?php echo $show; ?>">Greetings, nothing in life is assured except death and taxes. Misko will attempt to guess what your playing card is and if correct you will owe him $1 Billion. Sound fair? Okay, just kidding!  Let's play for fun... see if I can guess your card.</p>

    <h3 class="<?php echo $show; ?>">Instructions:</h3>
    <ol>
      <li class="<?php echo $show01; ?>">Click on the Shuffle & Deal button to start, you will be allowed to RESTART at anytime if you so desire!</li>
      <li class="<?php echo $show02; ?>">Now that the cards are dealt, take a moment, pick a card and remember it.  You may need to scroll up and down to see all the cards until you find your card of choice.</li>
      <li class="<?php echo $show02; ?>">When you have committed YOUR CHOSEN card to memory, click on the button below the column in which your card is located. Please select correctly.</li>
      <li class="<?php echo $show03; ?>">When The cards are re-dealt, find your card, and select the button below the column that your card is located in. Again select carefully.</li>
      <li class="<?php echo $show04; ?>">One last time, please select and click the button below the column in which your card is located. Prepare for the reveal!</li>
    </ol>

    <div class="row">
      <div class="reveal col text-center <?php echo $showCard; ?>">

      <?php
      if ($round == 4 && (!$correct && !$wrong)) {
        $question_counter = '';
        // echo  getCounter("reveals"); 
        echo "<img src='" . $cardPath . $magicCard[0] . "'>";
        echo "<br />";
        echo "<br />";

        echo "Is this your card?";
        echo "<br />";
      }        
      ?>
<br>
            <form class="<?php echo $question_counter; ?>" name="reveal_correct" action="" method="post">
              <!-- <input type="hidden" name="deal_cards" value="true"> -->
              <input type="hidden" name="round" value="4">
              <input type="hidden" name="card" value="<?php echo $magicCard[0]?>">

              <div class="row">
                <div class="col-sm text-center">
                <button type="submit" class="btn btn-warning" name="correct_guess" value="true">OMG Yes!</button>
                </div>
                <div class="col-sm text-center">
                <button type="submit" class="btn btn-warning" name="wrong_guess" value="true">LOL Nope!</button>
                </div>
              </div> <!-- asking if reveal was correct card -->
            </form>


          
            <?php 
            if ($correct) {
              echo "<br />";
              echo "<br />";
              echo "Number of times reveal was correct!";
              echo "<br />";

              echo '<p class="display-4">';
              echo getCounter("reveals");
              
            } elseif ($wrong) {
              echo "<br />";
              echo "<br />";
              echo "So sorry to hear, please give me another chance.";
              echo "<br />";
              echo "<br />";
            }
          ?>
          
<br>

      </div>
    </div>

    <form name="shuffle_button" action="" method="post">
      <input type="hidden" name="deal_cards" value="true">
      <div class="text-right <?php echo $showButton; ?>">
        <h6>By clicking this button,<br />you accept the challenge!</h6>
        <input type="hidden" name="round" value="1">
        <button type="submit" class="btn btn-primary" name="shuffle_cards" value="true">Shuffle & Deal the Cards</button>
      </div> <!-- button to start the trick -->

      <div class="text-right <?php echo $hide; ?>">
        <h6>You can restart anytime!</h6>
        <input type="hidden" name="round" value="1">
        <button type="submit" class="btn btn-primary" name="shuffle_cards" value="true">Shuffle & Re-Deal</button>
      </div>  <!-- button to RE-start the trick -->

      <div class="text-right <?php echo $showCard; ?>">
        <h6>Would you like to try again?</h6>
        <input type="hidden" name="round" value="1">
        <button type="submit" class="btn btn-primary" name="shuffle_cards" value="true">Double or nothing!</button>
      </div> <!-- button to try again -->
    </form>
    <hr class="<?php echo $show; ?>">

  </div>

  <?php include "trick/display_cards.php"; // control the display ?>

  <div class="tableTop container <?php echo $display; ?>">

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

  </div> <!-- END Tabletop -->

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- in case I feel to style the page -->
</body>

<footer>
<div class="container text-center pt-5">
<h6>This card trick is brought to you by <a target="blank" href="https://miskodjs.ca">MiškoDJs</a></h6>
<h6>&copy; 2022 - Wulfgaar Media</h6>
</div>
</footer>

</html>