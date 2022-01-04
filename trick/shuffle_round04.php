<?php

if ($column == 3) {

array_push($magicCard, $playingCards[2]);

    echo "<br />The CARD is: ";
    print_r($magicCard);
    echo "<br />";

  } elseif ($column == 2) {

    array_push($magicCard, $playingCards[1]);

    echo "<br />The CARD is: ";
    print_r($magicCard);
    echo "<br />";

  } elseif ($column == 1) {

    array_push($magicCard, $playingCards[0]);

    echo "<br />The CARD is: ";
    print_r($magicCard);
    echo "<br />";
  }

  ?>