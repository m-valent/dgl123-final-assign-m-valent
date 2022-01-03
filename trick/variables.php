<?php

    $card_deck = [
        'club_01_A.png', 'club_02.png', 'club_03.png', 'club_04.png', 'club_05.png', 'club_06.png', 'club_07.png', 'club_08.png', 'club_09.png', 'club_10_T.png', 'club_11_J.png', 'club_12_Q.png', 'club_13_K.png',
    
        'diam_01_A.png', 'diam_02.png', 'diam_03.png', 'diam_04.png', 'diam_05.png', 'diam_06.png', 'diam_07.png', 'diam_08.png', 'diam_09.png', 'diam_10_T.png', 'diam_11_J.png', 'diam_12_Q.png', 'diam_13_K.png',
    
        'hart_01_A.png', 'hart_02.png', 'hart_03.png', 'hart_04.png', 'hart_05.png', 'hart_06.png', 'hart_07.png', 'hart_08.png', 'hart_09.png', 'hart_10_T.png', 'hart_11_J.png', 'hart_12_Q.png', 'hart_13_K.png',
    
        'spad_01_A.png', 'spad_02.png', 'spad_03.png', 'spad_04.png', 'spad_05.png', 'spad_06.png', 'spad_07.png', 'spad_08.png', 'spad_09.png', 'spad_10_T.png', 'spad_11_J.png', 'spad_12_Q.png', 'spad_13_K.png'
    ];
  
    $dealCards = $_POST['deal_cards'] ?? false; //prevents displaying cards until ready
    $shuffleCards = $_POST['shuffle_cards'] ?? false;  //waits displaying cards until ready
    $column = $_POST['column'] ?? 0; // what col is the card in
    $round = $_POST['round'] ?? 0; // which round is it

    $cardPath = 'images/cards/'; // path to image folder of cards

    $numbers = range(0, 8); // number of cards in column
    $cardColumn1 = array(); // will be column of cards
    $cardColumn2 = array();
    $cardColumn3 = array();
    $playingCards = array(); //deck of cards to play with
    $roundValue = array(); // control round of chance

  ?>