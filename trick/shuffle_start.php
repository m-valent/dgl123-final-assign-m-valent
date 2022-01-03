<?php

if ($shuffleCards) {
    shuffle($card_deck); // shuffles the deck of cards when ready to play
    $numb = range(0, 26); // number of cards in the playing deck
  
    foreach ($numb as $deck) {
      $playingCards[] = $card_deck[$deck];
    }
  
    echo "<br />";
    echo "AFTER first shuffle and deal playingCards: ";
    print_r($playingCards);
    echo "<br />";
  }
  ?>