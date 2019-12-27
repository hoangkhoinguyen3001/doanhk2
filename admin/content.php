<?php
$sql_err ="";
$title = $detail = $cate_id = $userid = $img_id = $date_post ="";
$titleErr = $detailErr = $cate_idErr = $useridErr = $imgidErr = $date_postErr ="";
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"]) && !empty($_POST["title"])) {
        $title = $_POST["title"];
    } else {
        $titleErr = "title is required";
    }

    if(isset($_POST["detail"]) && !empty($_POST["detail"])) {
        $detail = $_POST["detail"];
    } else {
        $detailErr = "detail is required";
    }

    if(isset($_POST["cate_id"]) && !empty($_POST["cate_id"])) {
        $cate_id = $_POST["cate_id"];
    } else {
        $cate_idErr = "category id is required";
    }
    if(isset($_POST["user_id"]) && !empty($_POST["user_id"])) {
        $userid = $_POST["user_id"];
    } else {
        $useridErr = "user id is required";
    }
    if(isset($_POST["img_id"]) && !empty($_POST["img_id"])) {
        $img_id = $_POST["img_id"];
    } else {
        $imgidErr = "image id is required";
    }
    if(isset($_POST["date_post"]) && !empty($_POST["date_post"])) {
        $date_post = $_POST["date_post"];
    } else {
        $date_postErr = "date post is required";
    }
    // xu ly add vao mysql
    if(empty($titleErr) && empty($detailErr) && empty($cate_idErr) && empty($useridErr) && empty($imgidErr) && empty($date_postErr)) {
        require "index.php";
        $conn = conn_db();
        $sql = "INSERT INTO content (title, detail, cate_id, user_id, img_id, date_post)
        VALUES ('{$title}', '{$detail}', {$cate_id}, {$userid}, {$img_id}, {$date_post})";

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $sql_err = "Add successed <a href='view.php?content_id={$last_id}' target='_blank'>new item</a>";
        } else {
            
            $sql_err = "Add Fail" . mysqli_error($conn);;
        }
        mysqli_close($conn);
        $title = $detail = $cate_id = $userid = $img_id = $date_post ="";
    }
}
?>
<?=$sql_err?>
<form method ="POST" action ="content.php">
    TITLE :<input type="text" name ="title" id ="<?=$title?>" required> <span><?=$titleErr?></span>
    <br>
    DETAIL :<input type="text" name ="detail" id ="<?=$detail?>" required><span><?=$detailErr?></span>
    <br>
    CATEGORY ID :<input type="number" name ="cate_id" id ="<?=$cate_id?>" required><span><?=$cate_idErr?></span>
    <br>
    USER ID :<input type="number" name ="user_id" id ="<?=$userid?>" required> <span><?=$useridErr?></span>
    <br>
    IMAGE ID :<input type="number" name ="img_id" id ="<?=$img_id?>" required> <span><?=$imgidErr?></span>
    <br>
    DATE POST :<input type="date" name ="date_post" id ="<?=$date_post = date ("Y-m-d H:i:s", $phptime);?>" required> <span><?=$date_postErr?></span>
    <br>
    <input type="submit" value="submit">
</form>