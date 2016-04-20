<?php
session_start();
if (isset($_SESSION['account'])) {
    header('Location: messageboard.php');
    exit;
}

include_once("database.php");
include_once("formValidation.php");
header("Content-Type:text/html; charset=utf-8");

if (count($_POST) != 0) {
    $errorMsg = registerValidation($_POST['account'], $_POST['password'], $_POST['password2'], $_POST['name']);
    $accountEpt = $errorMsg['accountEpt'];
    $passwordEpt = $errorMsg['passwordEpt'];
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
            帳號：<input type="text" name="account" ><span><b><?php echo $accountEpt; ?></b></span><br>
            密碼：<input type="password" name="password" ><span><b><?php echo $passwordEpt; ?></b></span><br>
            再次輸入密碼：<input type="password" name="password2" ><span><b><?php echo $notEqu; ?></b></span><br>
            暱稱：<input type="text" name="name" ><span><b><?php echo $nameEpt; ?></b></span><br>
            <input type="submit" name="button" value="送出" ><a href="index.php">回上頁</a>
            <span><b><?php echo $error . $success; ?></b></span>
        </form>
    </body>
</html>
