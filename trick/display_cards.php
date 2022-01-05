<?php // control the display
    $display = 'd-none'; 

    if (($dealCards == true or $round >= 1) && ($round !=4)) {
      $display = '';
    }
  ?>