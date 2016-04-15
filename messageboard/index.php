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
$error = "";
$success = "";

if (count($_POST) != 0) {

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    if ($id == null) {
        $idEpt = "未輸入帳號";
    }
    if ($pw == null) {
        $pwEpt = "未輸入密碼";
    }
    if ($id && $pw) {
        $sql = "SELECT * FROM member WHERE id = '" . $id . "';";
        $db = new Database();
        $result = mysqli_query($db->conn, $sql);
        $row = mysqli_fetch_array($result);

        if ($row['id'] != $id || $row['password'] != $pw) {
            $error = "帳號或密碼錯誤";
        } else {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $row['name'];
            $success = "登入成功！ 請稍等";
            header("Refresh: 1; url='messageboard.php'");
        }
    }
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
                    <td><input type='text' name='id' ></td>
                    <td><b><?php echo $idEpt; ?></b></td>
                </tr>
                <tr>
                    <td>密碼:</td>
                    <td><input type='password' name='pw' ></td>
                    <td><b><?php echo $pwEpt; ?></b></td>
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
