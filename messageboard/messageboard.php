<?php
session_start();
if ($_SESSION['id'] == null) {
    header('Location: index.php');
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
        
        <?php
        session_start();
        echo $_SESSION['name'].'  歡迎光臨留言板  ';
        echo '<a href="logout.php">登出</a><br>';
        ?>
        發表留言：
        <form action='' method='POST' >
            <textarea name='content' rows='4' cols='30'></textarea>
            <input type='submit' value="送出">
        </form>
        <?php
        include_once('MsgBoard.php');
        $mb = new MsgBoard();
        ?>
    </body>
</html>