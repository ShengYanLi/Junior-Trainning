<?php

session_start();
if ($_SESSION['id'] != null) {
    header('Location: messageboard.php');
    exit;
}
header("Content-Type:text/html; charset=utf-8");
include("db_connect.php");

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM member WHERE id = '" . $id . "';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($id != null && $pw != null && $row['id'] == $id && $row['password'] == $pw) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $row['name'];
    echo '登入成功!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=messageboard.php>';
} else {
    echo '登入失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
