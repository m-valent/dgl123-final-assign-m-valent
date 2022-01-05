<?php // control the instruction display
    $showButton = 'd-none';
    $hide = 'd-none';
    $show = '';
    $show01 = '';
    $show02 = '';
    $show03 = '';
    $show04 = '';
    $showCard ='d-none';

    if ($round == null) {
      $showButton = '';
    }

    if ($round >= 1 && $round <=3) {
      $hide = '';
    } 

    if ($round == 1) {
      $show01 = 'd-none';
      $show02 = '';
      $show03 = 'd-none';
      $show04 = 'd-none';
    }

    if ($round == 2) {
      $show01 = 'd-none';
      $show02 = 'd-none';
      $show03 = '';
      $show04 = 'd-none';
    }

    if ($round == 3) {
      $show01 = 'd-none';
      $show02 = 'd-none';
      $show03 = 'd-none';
      $show04 = '';
    }

    if ($round == 4) {
      $show = 'd-none';
      $show01 = 'd-none';
      $show02 = 'd-none';
      $show03 = 'd-none';
      $show04 = 'd-none';
      $showCard = '';
    }
  ?>