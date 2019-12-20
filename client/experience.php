<!DOCTYPE html>
<html lang="en">
<head> 
	<?php include "../helper/bootstrap_common.php";?>
 </head>
 <style>
    .embed-responsive {
    position: relative;
    display: block;
    height: 100%;
    padding: 0;
    overflow: hidden;
}
 </style>
 <?php include "../asset/css/navstyle.php";?>
 
 <body>
    <?php include "../setting/constant.php";?>   
    <?php $Detect = EXP ;?>
    <div><?php include "../helper/header_common.php";?></div>
    
        <div class="mapzoo">
        <!--<img src="../asset/img/mapzoo.png" alt="">-->
        <div class='embed-responsive' style='padding-bottom:150%'>
        <object data='../asset/img/mapzoo.pdf' type='application/pdf' width='100%' height='100%'></object>
        </div>
    <?php include "../helper/footer_common.php";?>
    <?php include "../helper/script.php";?>
</body>
</html>