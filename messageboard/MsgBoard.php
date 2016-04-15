<?php

include_once('Message.php');
include_once('Database.php');

/**
 * Description of MsgBoard
 * 留言板
 * @author jason_lee
 */
class MsgBoard extends Database
{    
    function __construct()
    {
        parent::__construct();
        $this->receiveMsg();
        $this->loadMsg();
    }

    function receiveMsg()
    {
        if (count($_POST) != 0) {
            $this->saveMsg($_SESSION['name'], date('Y-m-d h:i:s', time()), $_POST['content'], $_POST['parent']);
        }
    }

    function saveMsg($n, $t, $c, $p = 0)
    {
        $c = nl2br($c);
        $query = "INSERT INTO all_messages (name, time, content, parent) VALUES ('" . $n . "', '" . $t . "', '" . $c . "', '" . $p . "');";
        // mysql_query($query);
        mysqli_query($this->conn, $query);
    }

    function loadMsg()
    {
        $query = "SELECT * FROM all_messages WHERE parent = 0 ORDER BY sno DESC;";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $msg = new Message($row['name'], $row['time'], $row['content'], $row['sno']);
            $msg->show();
            $this->loadReply($row['sno']);
        }
    }

    function loadReply($p)
    {
        $query = "SELECT * FROM all_messages WHERE parent = $p ORDER BY sno DESC;";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $msg = new Message($row['name'], $row['time'], $row['content'], $row['sno']);
            $msg->showReply();
        }
    }
}
