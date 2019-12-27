<?php
require "index.php";

$conn = conn_db();

$userid = @$_GET['user_id'];

if(isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $sql = "SELECT * FROM users WHERE user_id='$userid'";

    $result = mysqli_query($conn, $sql);

   
    if (mysqli_num_rows($result) > 0) {
        $sql = "DELETE FROM users WHERE user_id='$userid'";
        if (mysqli_query($conn, $sql)) {
            header("Location:http://localhost:8080/doanhk2/doanhk2/admin/dashboard.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

    } else {
        header("Location: http://www.google.com/");
        die();
    }
}

?>