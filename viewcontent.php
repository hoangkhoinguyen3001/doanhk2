<?php
require "index.php";
$conn = conn_db();
if(isset($_GET['content_id'])&& $_GET['content_id'] > 0){
    $contentid = $_GET['content_id'];
    $sql = "SELECT * FROM content WHERE content_id = {$contentid} and content_id > 0";
    $result = mysqli_query($conn, $sql);
    $row = '';
    if (mysqli_num_rows($result) > 0) {
   
        $row = mysqli_fetch_assoc($result);
        var_dump($row);
    } else{
        header("Location: http://www.google.com/");
        die();
    }
}else{
    header("Location: http://www.google.com/");
    die();
}
mysqli_close($conn);
?>