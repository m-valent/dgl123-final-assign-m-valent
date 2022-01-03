<?php

    // $randomCard01 = rand(0, 51);
    // $cardPath = 'images/cards/';
    // $card01 = 'images/cards/' . $card_deck[$randomCard01];
    // echo $card01;
    // echo "<img src='" . $card01 . "'>";

    ?>
    
    <img src="<?php echo $cardPath . $cardColumn1[0] ?>" alt="">
    <br>
    <img src="<?php echo $cardPath . $cardColumn1[1] ?>" alt="">
    <br>
    <img src="<?php echo $cardPath . $cardColumn1[2] ?>" alt="">


    
          <!-- <?php
                "<per>";
                print_r($cardColumn2);
                "</per>";
                ?> -->

// this places cards into card columns from shuffled deck
// foreach ($numbers as $card) {
//   $cardColumn1[] = $card_deck[$card];
//   $cardColumn2[] = $card_deck[$card + 9];
//   $cardColumn3[] = $card_deck[$card + 18];
// }

// $numb = range(0, 26); // number of cards in the playing deck

// foreach ($numb as $deck) {
//   $playingCards[] = $card_deck[$deck];
// }


if($round == 2) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn1[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }

        } elseif


        if ($round == 2) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        } elseif ($round == 1) {
          foreach ($numbers as $card) {
            $cardSelect = "$cardColumn3[$card]\n";
            file_put_contents('playCards.txt', $cardSelect, FILE_APPEND);
          }
        } else

        // elseif ($column == 1) {
//   $cardColumn1 = array_slice($playingCards, 0, 9);
//   $cardColumn2 = array_slice($playingCards, 9, 9);
//   $cardColumn3 = array_slice($playingCards, 18, 9);

//   $playingCards = array_replace($cardColumn1);
  // this places current playing cards into new card columns
  // foreach ($numbers as $card) {
  //   $playingCards[$card + 9] = $cardColumn2[$card];
  //   $playingCards[$card + 18] = $cardColumn3[$card];
  // }


  
// } elseif ($column == 1) {
//   $cardColumn1 = array_slice($playingCards, 0, 9);
//   $cardColumn2 = array_slice($playingCards, 9, 9);
//   $cardColumn3 = array_slice($playingCards, 18, 9);

  // $playingCards = arr?ay_replace($cardColumn1);
  // this places current playing cards into new card columns
  // foreach ($numbers as $card) {
  //   $playingCards[$card] = $cardColumn1[$card];
  //   $playingCards[$card + 9] = $cardColumn2[$card];
  //   $playingCards[$card + 18] = $cardColumn3[$card];
  // }


  elseif ($round == 3) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn1[] = $playingCards[$i];
          } elseif ($round == 2) {
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



        if ($round == 4) {
  $cardMagic = file_get_contents('playcards03.txt');
  $playingCards = explode("\n", $cardMagic);
  // bring in the deck of playing cards

  echo "<br />";
  echo "BEGIN round 4 - var column: ";
  var_dump($column);
  echo "<br />";
  echo "BEGIN round 4 - var round: ";
  var_dump($round);

  echo "<br />BEGIN round 4 contents playingCards: ";
  print_r($playingCards);
  echo "<br />";

  if ($column == 3) {
    $cardColumn1 = array_slice($playingCards, 2, 1);
    $cardColumn2 = array_slice($playingCards, 1, 1);
    $cardColumn3 = array_slice($playingCards, 0, 1);

    // this SHUFFLES playing cards into new card columns
    for ($i = 0; $i <= 8; $i += 1) {
      $cardColumn1[$i + 1] = $playingCards[$i + 3];
      $cardColumn2[$i + 1] = $playingCards[$i + 12];
      $cardColumn3[$i + 1] = $playingCards[$i + 19];
    }

    $playingCards = array_replace($cardColumn1);
    // this places playing cards into new card deck
    foreach ($numbers as $card) {
      $playingCards[$card + 9] = $cardColumn2[$card];
      $playingCards[$card + 18] = $cardColumn3[$card];
    }

    echo "<br /> after round 4, col-3 reshuffle:";
    print_r($playingCards);
    echo "<br />";
  }
}

if ($round >= 2) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn2[] = $playingCards[$i];
          } elseif ($dealCards) {
            echo "<img src='" . $cardPath . $playingCards[$i] . "'>";
            $cardColumn2[] = $playingCards[$i];
          } else {
            // echo "<img src='images/cards/cover_red.png'>";
          }