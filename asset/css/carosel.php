<?php
  // Make number array
  $howMany = 2 ;

  for ($i = 1; $i <= $howMany; $i++) {
    $numbers[] = rand(10,100);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Number Maker</title>
    <style>
      .embed-responsive {
        position: relative;
        display: block;
        height: 100%;
        padding: 0;
        overflow: hidden;
    </style>
  </head>
  <body>
    <p class="numbers">
      <?php foreach($numbers as $num) : ?>
      <span><?php  ?></span>
      <?php endforeach ?>
    </p>
  </body>
</html>