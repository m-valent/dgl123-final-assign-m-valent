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

