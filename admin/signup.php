<?php
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
        require "index.php";
        $conn = conn_db();
        $sql = "INSERT INTO users (username, password, role_id, status)
        VALUES ('{$username}', '{$password}', {$roleid}, {$status})";

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $sql_err = "Add successed <a href='view.php?id={$last_id}' target='_blank'>new item</a>";
        } else {
            
            $sql_err = "Add Fail" . mysqli_error($conn);;
        }
        mysqli_close($conn);
        $username = $password = $roleid = $status = "";
    }
}
?>
<?=$sql_err?>
<form method ="POST" action ="signup.php">
    USER NAME :<input type="text" name ="username" id ="<?=$username?>" required> <span><?=$usernameErr?></span>
    <br>
    PASSWORD :<input type="password" name ="password" id ="" required><span><?=$passwordErr?></span>
    <br>
    ROLE ID :<select name="roleid" id="">
        <option value="1">supper admin</option>
        <option value="2">admin</option>
        <option value="3">user</option>
    </select><span><?=$roleidErr?></span>
    <br>
    Status<select name="status" id="">
        <option value="1">active</option>
        <option value="0">deactive</option>
    </select><span><?=$statusErr?></span>
    <br>
    <input type="submit" value="submit">
</form>