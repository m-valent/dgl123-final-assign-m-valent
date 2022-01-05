<?php

  if ($column == 3) {
    $cardColumn1 = array_slice($playingCards, 18, 9);
    $cardColumn2 = array_slice($playingCards, 9, 9);
    $cardColumn3 = array_slice($playingCards, 0, 9);

    $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
    foreach ($numbers as $card) {
        $playingCards[$card + 9] = $cardColumn2[$card];
      }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    // echo "<br />AFTER round 2, col-03 reshuffle: ";
    // print_r($playingCards);
    // echo "<br />";

  } elseif ($column == 2) {
    $cardColumn3 = array_slice($playingCards, 18, 9);
    $cardColumn1 = array_slice($playingCards, 9, 9);
    $cardColumn2 = array_slice($playingCards, 0, 9);

    $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
    }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    // echo "<br />AFTER round 2, col-02 reshuffle: ";
    // print_r($playingCards);
    // echo "<br />";

  } else {
    $cardColumn2 = array_slice($playingCards, 18, 9);
    $cardColumn3 = array_slice($playingCards, 9, 9);
    $cardColumn1 = array_slice($playingCards, 0, 9);

    $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
    }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    // echo "<br />AFTER round 2, col-01 reshuffle: ";
    // print_r($playingCards);
    // echo "<br />";
  }
