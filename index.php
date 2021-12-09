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

$card_deck = [
  'club_01_A.png', 'club_02.png', 'club_03.png', 'club_04.png', 'club_05.png', 'club_06.png', 'club_07.png', 'club_08.png', 'club_09.png', 'club_10_T.png', 'club_11_J.png', 'club_12_Q.png', 'club_13_K.png',

  'diam_01_A.png', 'diam_02.png', 'diam_03.png', 'diam_04.png', 'diam_05.png', 'diam_06.png', 'diam_07.png', 'diam_08.png', 'diam_09.png', 'diam_10_T.png', 'diam_11_J.png', 'diam_12_Q.png', 'diam_13_K.png',

  'hart_01_A.png', 'hart_02.png', 'hart_03.png', 'hart_04.png', 'hart_05.png', 'hart_06.png', 'hart_07.png', 'hart_08.png', 'hart_09.png', 'hart_10_T.png', 'hart_11_J.png', 'hart_12_Q.png', 'hart_13_K.png',

  'spad_01_A.png', 'spad_02.png', 'spad_03.png', 'spad_04.png', 'spad_05.png', 'spad_06.png', 'spad_07.png', 'spad_08.png', 'spad_09.png', 'spad_10_T.png', 'spad_11_J.png', 'spad_12_Q.png', 'spad_13_K.png'
];

$dealCards = $_POST['deal_cards'] ?? false; //prevents displaying cards until ready
$shuffleCards = $_POST['shuffle_cards'] ?? false;  //waits displaying cards until ready
$column = $_POST['column'] ?? 0;
$round = $_POST['round'] ?? 0; // which pick is it

$cardPath = 'images/cards/';

$numbers = range(0, 8); // number of cards in column
$cardColumn1 = array(); // will be column of cards
$cardColumn2 = array();
$cardColumn3 = array();
$playingCards = array(); //deck of cards to play with
$roundValue = array(); // control round of chance

if ($shuffleCards) {
  shuffle($card_deck); // shuffles the deck of cards when ready to play
  $numb = range(0, 26); // number of cards in the playing deck

  foreach ($numb as $deck) {
    $playingCards[] = $card_deck[$deck];
  }
}

if ($round == 2) {

  $cardMagic = file_get_contents('playcards.txt');
  $playingCards = explode("\n", $cardMagic);

  if ($column == 2) {
    $cardColumn1 = array_slice($playingCards, 9, 9);
    $cardColumn2 = array_slice($playingCards, 0, 9);
    $cardColumn3 = array_slice($playingCards, 18, 9);
  }

  $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
foreach ($numbers as $card) {
  
  $playingCards[$card + 9] = $cardColumn2[$card];
  $playingCards[$card + 18] = $cardColumn3[$card];
}

}

print_r($cardColumn1);
echo "<br />";
print_r($cardColumn2);
echo "<br />";
print_r($cardColumn3);
echo "<br />";
print_r($playingCards);

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

    <!-- <h3>Instructions:</h3>
      <ol>
        <li>Click on the Shuffle & Deal button.</li>
        <li>Once the cards are dealt, take a moment, pick a card and remember it.  Don't touch the screen or hover the mouse over it, use your mind only!</li>
        <li>When you have committed the card to memory, click on the button below the column in which your card is located.  Please select correctly.</li>
        <li>The cards will be re-dealt, find your card, and select the button below the column that your card is located in.  Again select carefully.</li>
        <li>One more time.  After the cards are again re-dealt, please select and click the button below the column in which your card is located.  Prepare for the review!</li>
      </ol> -->

    <form name="shuffle_button" action="" method="post">
      <input type="hidden" name="deal_cards" value="true">
      <div class="text-right">
        <h6>By clicking this button,<br />you accept the challenge!</h6>
        <button type="submit" class="btn btn-primary" name="shuffle_cards" value="true">Shuffle & Deal the Cards</button>
      </div>
    </form>
    <hr>
  </div>
  <div class="tableTop container">

    <br>
    <!-- displaying cards -->
    <div class="row">

      <div class="col text-center">
        <?php
        for ($i = 0; $i < 26; $i += 3) {
          if ($round == 2) {
            // echo "Round two pick!";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn1[] = $playingCards[$i];
          } elseif ($dealCards) {
            // echo "<img src='" . $cardPath . $cardColumn1[$i] . "'>";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn1[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_black.png'>";
          }
        }
        if ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn1[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }
        ?>
      </div>

      <div class="col text-center">
        <?php
        for ($i = 1; $i < 26; $i += 3) {
          if ($round == 2) {
            // echo "Round two pick!";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn2[] = $playingCards[$i];
          } elseif ($dealCards) {
            // echo "<img src='" . $cardPath . $cardColumn2[$i] . "'>";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn2[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_red.png'>";
          }
        }
        if ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn2[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }

        ?>
      </div>

      <div class="col text-center">
        <?php
        for ($i = 2; $i <= 26; $i += 3) {
          if ($round == 2) {
            // echo "Round two pick!";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn3[] = $playingCards[$i];
          } elseif ($dealCards) {
            // echo "<img src='" . $cardPath . $cardColumn3[$i] . "'>";
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn3[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_black.png'>";
          }
        }
        if ($dealCards) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        }

        ?>
      </div>

    </div> <!-- row end displaying cards -->



    <form name="pick_column" action="" method="post">
      <input type="hidden" name="round" value="2">

      <?php

      $display = 'd-none'; // to not display the buttons until ready

      if ($dealCards == true or $round == 2 or $round == 3) {
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
    </form>

    <br>

  </div>

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- in case I feel to style the page, 
        if need be bootstrap 4.6 is something I am used to -->
</body>

</html>