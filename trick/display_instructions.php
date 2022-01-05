<?php // control the instruction display
    $showButton = 'd-none';
    $hide = 'd-none';
    $show01 = '';
    $show02 = '';
    $show03 = '';
    $show04 = '';

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
  ?>