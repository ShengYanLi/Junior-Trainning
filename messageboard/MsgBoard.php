<?php

include_once("database.php");
header("Content-Type:text/html; charset=utf-8");

class MsgBoard
{

    function __construct()
    {
        $this->receiveMsg();
        $this->loadMsg();
    }

    /**
     * 接收用戶留言與回覆
     */
    function receiveMsg()
    {
        if (count($_POST) != 0) {
            $this->saveMsg($_SESSION['name'], new DateTime(date('Y-m-d h:i:s', time())), $_POST['content'], $_POST['parent']);
        }
    }

    /**
     * 插入一筆新資料進留言table
     */
    function saveMsg($n, $t, $c, $p = 0)
    {
        global $entityManager;
        $c = nl2br($c);
        $massege = new Message();
        $massege->setName($n);
        $massege->setTime($t);
        $massege->setContent($c);
        $massege->setParent($p);
        $entityManager->persist($massege);
        $entityManager->flush();
    }

    /**
     * 載入所有頂層留言
     */
    function loadMsg()
    {
        global $entityManager;
        $msgRepository = $entityManager->getRepository('Message');
        $msgs = $msgRepository->findBy(array('parent' => 0), array('sno' => 'DESC'));
        foreach ($msgs as $msg) {
            echo "==============================================<br>";
            echo "<table><tr><td>Name:</td><td>" . $msg->getName() . "</td></tr>";
            echo "<tr><td>Time:</td><td>" . $msg->getTime() . "</td></tr>";
            echo "<tr><td>Content:</td><td>" . $msg->getContent() . "</td></tr></table>";
            echo "<form action='' method='POST' >";
            echo "<textarea name='content' rows='2' cols='20' style='margin-left:10ex'></textarea>";
            echo "<input type='text' name='parent' value='" . $msg->getSno() . "' style='display:none'>";
            echo "<input type='submit' value='回覆'></form>";
            $this->loadReply($msg->getSno());
        }
    }

    /**
     * 載入個別留言的回覆
     */
    function loadReply($p)
    {
        global $entityManager;
        $msgRepository = $entityManager->getRepository('Message');
        $replies = $msgRepository->findBy(array('parent' => $p));
        foreach ($replies as $reply) {
            echo "<div style='margin-left:10ex'>---------------------------------------------------------<br>";
            echo "<table><tr><td>Name:</td><td>" . $reply->getName() . "</td></tr>";
            echo "<tr><td>Time:</td><td>" . $reply->getTime() . "</td></tr>";
            echo "<tr><td>Content:</td><td>" . $reply->getContent() . "</td></tr></table>";
            echo "</div>";
        }
    }

}
