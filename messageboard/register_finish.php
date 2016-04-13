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
$pw2 = $_POST['pw2'];
$name = $_POST['nickname'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if ($id != null && $pw != null && $pw2 != null && $pw == $pw2) {
    //新增資料進資料庫語法
    $sql = "INSERT INTO member (id, password, name) VALUES ('" . $id . "', '" . $pw . "', '" . $name . "');";
    if (mysqli_query($conn, $sql)) {
        echo '帳號新增成功!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } else {
        echo '申請失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
} else {
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
