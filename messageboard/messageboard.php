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
//        echo "test1<br>";
//        include_once("database.php");
//        echo "test2<br>";
//        $query = $entityManager->createQuery('SELECT u FROM message u WHERE u.parent = 0 ORDER BY u.sno DESC');
//        echo "test3<br>";
//        $msgs = $query->getResult();
//        echo "test4<br>";
//        foreach ($msgs as $msg) {
//            echo "==============================================<br>";
//            echo "<table><tr><td>Name:</td><td>" . $msg->getName() . "</td></tr>";
//            echo "<tr><td>Time:</td><td>" . $msg->getTime() . "</td></tr>";
//            echo "<tr><td>Content:</td><td>" . $msg->getContent() . "</td></tr></table>";
//            echo "<form action='' method='POST' >";
//            echo "<textarea name='content' rows='2' cols='20' style='margin-left:10ex'></textarea>";
//            echo "<input type='text' name='parent' value='" . $msg->getSno() . "' style='display:none'>";
//            echo "<input type='submit' value='回覆'></form>";
//        }
        ?>
    </body>
</html>