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
       .page-footer {
        background-color: darkgreen;
      }
      body{
          color: white;
      }
      body > div.container.contact > div.row {
        margin-left: 1px;
        margin-bottom: 10px;
      }
      body > footer > div.container.text-center.text-md-left > div > div.col-md-4.col-lg-2.mx-auto.my-md-4.my-0.mt-4.mb-1 > ul > li > p > a{
          color: white;
      }
      .site-footer { 	background: darkgreen; }
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