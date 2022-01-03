<?php

if ($column == 3) {
    $cardColumn1 = array_slice($playingCards, 8, 1);
    $cardColumn3 = array_slice($playingCards, 7, 1);
    $cardColumn2 = array_slice($playingCards, 6, 1);
    $cardColumn1 = array_slice($playingCards, 5, 1);
    $cardColumn3 = array_slice($playingCards, 4, 1);
    $cardColumn2 = array_slice($playingCards, 3, 1);
    $cardColumn1 = array_slice($playingCards, 2, 1);
    $cardColumn3 = array_slice($playingCards, 1, 1);
    $cardColumn2 = array_slice($playingCards, 0, 1);

    // this SHUFFLES playing cards into new card columns
    for ($i = 0; $i <= 6; $i += 1) {
      $cardColumn1[$i + 3] = $playingCards[$i + 9];
      $cardColumn2[$i + 3] = $playingCards[$i + 15];
      $cardColumn3[$i + 3] = $playingCards[$i + 21];
    }

    $playingCards = array_replace($cardColumn1);
    // this places playing cards into new card deck
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
    }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    echo "<br />AFTER round 3, col-3 reshuffle:";
    print_r($playingCards);
    echo "<br />";
  } elseif ($column == 2) {
    $cardColumn3 = array_slice($playingCards, 8, 1);
    $cardColumn1 = array_slice($playingCards, 7, 1);
    $cardColumn2 = array_slice($playingCards, 6, 1);
    $cardColumn3 = array_slice($playingCards, 5, 1);
    $cardColumn1 = array_slice($playingCards, 4, 1);
    $cardColumn2 = array_slice($playingCards, 3, 1);
    $cardColumn3 = array_slice($playingCards, 2, 1);
    $cardColumn1 = array_slice($playingCards, 1, 1);
    $cardColumn2 = array_slice($playingCards, 0, 1);

    $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
    }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    echo "<br />AFTER round 3, col-2 reshuffle:";
    print_r($playingCards);
    echo "<br />";
  } elseif ($column == 1) {
    $cardColumn2 = array_slice($playingCards, 8, 1);
    $cardColumn3 = array_slice($playingCards, 7, 1);
    $cardColumn1 = array_slice($playingCards, 6, 1);
    $cardColumn2 = array_slice($playingCards, 5, 1);
    $cardColumn3 = array_slice($playingCards, 4, 1);
    $cardColumn1 = array_slice($playingCards, 3, 1);
    $cardColumn2 = array_slice($playingCards, 2, 1);
    $cardColumn3 = array_slice($playingCards, 1, 1);
    $cardColumn1 = array_slice($playingCards, 0, 1);

    $playingCards = array_replace($cardColumn1);
    // this places current playing cards into new card columns
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
    }
    foreach ($numbers as $card) {
        $playingCards[$card + 18] = $cardColumn3[$card];
      }

    echo "<br />AFTER round 3, col-1 reshuffle:";
    print_r($playingCards);
    echo "<br />";
  }

  ?>