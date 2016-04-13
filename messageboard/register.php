<?php
session_start();
if ($_SESSION['id'] != null) {
    header('Location: messageboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>帳號申請</title>
    </head>
    <body>
        <form name="form" method="post" action="register_finish.php">
            帳號：<input type="text" name="id" ><br>
            密碼：<input type="password" name="pw" ><br>
            再次輸入密碼：<input type="password" name="pw2" ><br>
            暱稱：<input type="text" name="nickname" ><br>
            <input type="submit" name="button" value="送出" >
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
