<?php
require "./index.php";
$conn = conn_db();
$sql_err ="";
$usernameErr = $passwordErr = $roleidErr = $statusErr = "";
$username = $password = $roleid = $status = "";
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"]) && !empty($_POST["username"])) {
        $username = $_POST["username"];
    } else {
        $usernameErr = "User name is required";
    }

    if(isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        $passwordErr = "Password is required";
    }

    if(isset($_POST["roleid"]) && !empty($_POST["roleid"]) && in_array($_POST["roleid"], [1,2,3])) {
        $roleid = $_POST["roleid"];
    } else {
        $roleidErr = "Role id is required";
    }
    if(isset($_POST["status"]) && !empty($_POST["status"]) && in_array($_POST["status"], [1,0])) {
        $status = $_POST["status"];
    } else {
        $statusErr = "Status is required";
    }

    // xu ly add vao mysql
    if(empty($usernameErr) && empty($passwordErr) && empty($roleidErr) && empty($statusErr)) {
        $sql = "UPDATE users SET users.username='{$username}',users.password={$password},users.role_id={$roleid} WHERE user_id={$_POST['user_id']}";

        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost:8080/doanhk2/doanhk2/admin/dashboard.php");
            
        } else {
            var_dump(mysqli_error($conn));
            die("false");
        }
        $user_id = $username = $password = $role_id = $status = "";
    }
}
// check logic
$user_id = 0;
$row = "";
if(isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // viet cau sql
    $sql = "SELECT * FROM users WHERE user_id = {$_GET['user_id']}";
    // chay sql => lay record
    $result = mysqli_query($conn, $sql);

    // check logic co ton tai 1 record
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);

    } else {
        // khong tim thay record
        header("Location: http://www.google.com/");
        die();
    }
    // dong ket voi mysql
} else {
    // die();
    header("Location: google.com");
}


mysqli_close($conn);
?>
<form method="POST" action="update.php?user_id=<?=$row['user_id']?>">
    USER NAME:<input type="text" name="username" value="<?=$row['username']?>"><span><?=''?></span>
    <br>
    PASSWORD:<input type="password" name="password" value="<?=$row['password']?>" id=""><span><?=''?></span>
    <br>
    ROLE ID :<select name="roleid" id="">
        <option value="1">supper admin</option>
        <option value="2">admin</option>
        <option value="3">user</option>
    </select><span><?=$roleidErr?></span>
    <br>
    Status<select name="status" id="">
        <option value="1" <?=$row['status'] == 1 ? "selected" : "" ?> >Active</option>
        <option value="0" <?=$row['status'] == 0 ? "selected" : "" ?>>Deactive</option>
    </select><span><?=''?></span>
    <br>
    <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
    <input type="submit" value="submit">
</form>