<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: messageboard.php');
    exit;
}

include_once("database.php");
include_once("formValidation.php");
header("Content-Type:text/html; charset=utf-8");

if (count($_POST) != 0) {
    $errorMsg = registerValidation($_POST['id'], $_POST['pw'], $_POST['pw2'], $_POST['name']);
    $idEpt = $errorMsg['idEpt'];
    $pwEpt = $errorMsg['pwEpt'];
    $notEqu = $errorMsg['notEqu'];
    $nameEpt = $errorMsg['nameEpt'];
    $error = $errorMsg['error'];
    $success = $errorMsg['success'];
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
            再次輸入密碼：<input type="password" name="pw2" ><span><b><?php echo $notEqu; ?></b></span><br>
            暱稱：<input type="text" name="name" ><span><b><?php echo $nameEpt; ?></b></span><br>
            <input type="submit" name="button" value="送出" ><a href="index.php">回上頁</a>
            <span><b><?php echo $error . $success; ?></b></span>
        </form>
    </body>
</html>
