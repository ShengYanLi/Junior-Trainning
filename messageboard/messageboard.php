<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MessageBoard</title>
    </head>
    <body>
        <form action="logout.php" method='POST'>
            <b><?php echo $_SESSION['name'] ?></b>&nbsp;&nbsp;歡迎光臨留言板&nbsp;&nbsp;
            <input type='submit' name='logout' value='登出'>
        </form>
        <span>發表留言：</span>
        <form action='' method='POST'>
            <textarea name='content' rows='4' cols='30'></textarea>
            <input type='text' name='parent' value='0' style='display:none'>
            <input type='submit' value="送出">
        </form>
        <?php
        include_once('MsgBoard.php');
        $mb = new MsgBoard();
        ?>
    </body>
</html>