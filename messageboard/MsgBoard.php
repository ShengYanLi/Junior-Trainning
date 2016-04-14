<?php

/**
 * Description of MsgBoard
 *
 * @author jason_lee
 */
session_start();
include_once('Message.php');
include_once('Database.php');

class MsgBoard extends Database
{

    // public $messages = array();

    function __construct()
    {
        // $this->showForm();
        parent::__construct();
        $this->receiveMsg();
        $this->loadMsg();
        // $this->showAllMsg();
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
        //$query = "INSERT INTO all_messages (name, time, content) VALUES ('" . $n . "', '" . $t . "', '" . $c . "');";
        $query = "INSERT INTO all_messages (name, time, content, parent) VALUES ('" . $n . "', '" . $t . "', '" . $c . "', '" . $p . "');";
        mysql_query($query);
    }

    function loadMsg()
    {
        $query = "SELECT * FROM all_messages WHERE parent = 0 ORDER BY sno DESC;";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $msg = new Message($row['name'], $row['time'], $row['content']);
            // $this->showAllMsg();
            $msg->show($row['sno']);
            $this->loadReply($row['sno']);
            // array_push($this->messages, $temp);
        }
    }

    function loadReply($p)
    {
        $query = "SELECT * FROM all_messages WHERE parent = $p ORDER BY sno DESC;";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $msg = new Message($row['name'], $row['time'], $row['content']);
            $msg->showReply();
        }
    }
    /*
    function showForm()
    {
        echo "<form action='' method='POST' ><table>";
        echo "<tr><td>Name:</td>" . "<td><input type='text' name='userName' ></td></tr>";
        echo "<tr><td>Content:</td>" . "<td><textarea name='content' rows='6' cols='30'></textarea></td></tr>";
        echo "</table><input type='submit' >";
        echo "</form>";
    }

    function showAllMsg()
    {
        foreach ($this->messages as $m) {
            $m->show();
        }
    }
    */
}
