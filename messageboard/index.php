<?php
session_start();
if($_SESSION['id'] != null) {
    header('Location: messageboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MessageBoard</title>
    </head>
    <body>
        <form action='logged-in.php' method='POST' >
            <table>
                <tr>登入留言板</tr>
                <tr>
                    <td>帳號:</td>
                    <td><input type='text' name='id' ></td>
                </tr>
                <tr>
                    <td>密碼:</td>
                    <td><input type='password' name='pw' ></td>
                </tr>
                <tr>
                    <td><input type='submit' value="登入"></td>
                </tr>
            </table>
        </form>
        <a href="register.php">申請帳號</a>
        <?php
        ?>
    </body>
</html>
