<?php
    require"index.php";
    $conn = conn_db();
    $sql = "SELECT user_id, username, password, role_id, status FROM users";
    $result = mysqli_query($conn, $sql);
    $_data = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_data[] = $row;
            
        }
    }
    mysqli_close($conn);
?>
<button><a href="signup.php">ADD</a></button>
<style>
    tr,th,td{border: 1px solid black};
</style>
<table>
    <tr>
        <th>USER ID</th>
        <th>USER NAME</th>
        <th>PASSWORD</th>
        <th>ROLE ID</th>
        <th>STATUS</th>
    </tr>
    <?php foreach ($_data as $key => $value) : ?>
    <tr>
        <td><?=$value['user_id']?></td>
        <td><?=$value['username']?></td>
        <td><?=$value['password']?></td>
        <td><?=$value['role_id']?></td>
        <td><?=$value['status'] == 1 ? "active" : "deactive"?></td>
        <td><a href="<?="view.php?user_id={$value['user_id']}"?>">view</a>||
        <a href="<?="update.php?user_id={$value['user_id']}"?>">edit</a>||
        <a href="<?="delete.php?user_id={$value['user_id']}"?>">delete</a>
        </td>
    </tr>
    <?php endforeach?>
</table>