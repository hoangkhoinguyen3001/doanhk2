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
      .navbar{
    font-size: .6em !important;
    background: darkgreen;
    }
    .nav-link{
        margin-left: 10px;
    }
    .navbar .navbar-brand{
            color: white;
            margin-left: 80px;
    }
    .navbar .navbar-nav li a{
            color: white !important;
        
    }
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