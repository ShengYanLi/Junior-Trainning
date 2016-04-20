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
    $errorMsg = loginValidation($_POST['account'], $_POST['password']);    
    $accountEpt = $errorMsg['accountEpt'];
    $passwordEpt = $errorMsg['passwordEpt'];
    $error = $errorMsg['error'];
    $success = $errorMsg['success'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MessageBoard</title>
    </head>
    <body>
        <form action='' method='POST' >
            <table>
                <tr>登入留言板</tr>
                <tr>
                    <td>帳號:</td>
                    <td><input type='text' name='account' ></td>
                    <td><b><?php echo $accountEpt; ?></b></td>
                </tr>
                <tr>
                    <td>密碼:</td>
                    <td><input type='password' name='password' ></td>
                    <td><b><?php echo $passwordEpt; ?></b></td>
                </tr>
                <tr>
                    <td><input type='submit' value="登入"></td>
                    <td><a href="register.php">申請帳號</a></td>
                    <td><b><?php echo $error . $success; ?></b></td>
                </tr>
            </table>
        </form>
    </body>
</html>
