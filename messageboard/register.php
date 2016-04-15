<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: messageboard.php');
    exit;
}

include("Database.php");
header("Content-Type:text/html; charset=utf-8");

$idEpt = "";
$pwEpt = "";
$pw2Ept = "";
$nameEpt = "";
$notEqu = "";
$error = "";
$success = "";

if (count($_POST) != 0) {

    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
    $name = $_POST['nickname'];

    if ($id == null) {
        $idEpt = "未輸入帳號";
    }
    if ($pw == null) {
        $pwEpt = "未輸入密碼";
    }
    if ($pw2 == null) {
        $pw2Ept = "未輸入確認密碼";
    }
    if ($name == null) {
        $nameEpt = "未輸入暱稱";
    }
    if ($id && $pw && $pw2 && $name) {
        if ($pw != $pw2) {
            $notEqu = "輸入兩次密碼不相同";
        } else {
            $sql = "INSERT INTO member (id, password, name) VALUES ('" . $id . "', '" . $pw . "', '" . $name . "');";
            $db = new Database();
            if (!mysqli_query($db->conn, $sql)) {
                $error = '資料庫異常，申請失敗!';
                header("Refresh: 2; url='index.php'");
            } else {
                $success = '帳號新增成功!，自動返回登入頁面';
                header("Refresh: 1; url='index.php'");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>帳號申請</title>
    </head>
    <body>
        <form name="form" method="post" action="">
            帳號：<input type="text" name="id" ><span><b><?php echo $idEpt; ?></b></span><br>
            密碼：<input type="password" name="pw" ><span><b><?php echo $pwEpt; ?></b></span><br>
            再次輸入密碼：<input type="password" name="pw2" ><span><b><?php echo $pw2Ept; ?></b></span><br>
            暱稱：<input type="text" name="nickname" ><span><b><?php echo $nameEpt; ?></b></span><br>
            <input type="submit" name="button" value="送出" ><a href="index.php">回上頁</a>
            <span><b><?php echo $notEqu . $error . $success; ?></b></span>
        </form>
    </body>
</html>
