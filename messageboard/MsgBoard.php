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
            $this->saveMsg($_SESSION['id'], $_POST['parentId'], new DateTime(date('Y-m-d h:i:s', time())), $_POST['content']);
        }
    }

    /**
     * 插入一筆新資料進留言table
     * @param integer $memberId 留言者編號
     * @param integer $parentId 其上層留言編號，預設值0表示頂層留言
     * @param DateTime $time 留言時間
     * @param string $content 留言內容
     */
    function saveMsg($memberId, $parentId = 0, $time, $content)
    {
        global $entityManager;

        $content = nl2br($content);
        $member = $entityManager->getRepository('Member')->find($memberId);
        $massege = new Message($parentId, $time, $content);
        $member->getMessages()->add($massege);
        $massege->setMember($member); //
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
        $msgs = $msgRepository->findBy(array('parentId' => 0), array('id' => 'DESC'));
        foreach ($msgs as $msg) {
            echo "==============================================<br>";
            echo "<table><tr><td>Name:</td><td>" . $msg->getMember()->getName() . "</td></tr>";
            echo "<tr><td>Time:</td><td>" . $msg->getTime() . "</td></tr>";
            echo "<tr><td>Content:</td><td>" . $msg->getContent() . "</td></tr></table>";
            echo "<form action='' method='POST' >";
            echo "<textarea name='content' rows='2' cols='20' style='margin-left:10ex'></textarea>";
            echo "<input type='text' name='parentId' value='" . $msg->getId() . "' style='display:none'>";
            echo "<input type='submit' value='回覆'></form>";
            $this->loadReply($msg->getId());
        }
    }

    /**
     * 載入個別留言的回覆
     * @param integer $parentId 回覆的上層留言編號
     */
    function loadReply($parentId)
    {
        global $entityManager;
        $msgRepository = $entityManager->getRepository('Message');
        $replies = $msgRepository->findBy(array('parentId' => $parentId));
        foreach ($replies as $reply) {
            echo "<div style='margin-left:10ex'>---------------------------------------------------------<br>";
            echo "<table><tr><td>Name:</td><td>" . $reply->getMember()->getName() . "</td></tr>";
            echo "<tr><td>Time:</td><td>" . $reply->getTime() . "</td></tr>";
            echo "<tr><td>Content:</td><td>" . $reply->getContent() . "</td></tr></table>";
            echo "</div>";
        }
    }

}
