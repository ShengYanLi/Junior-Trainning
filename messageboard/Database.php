<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author jason_lee
 */
class Database {

    var $database = null;

    function __construct() {
        $host = 'localhost';
        $account = 'root';
        $password = '1qaz';

        $this->database = mysql_connect($host, $account, $password);
        if (!$this->database) {
            echo "DB connect fail.<br>";
        }
        $result = mysql_select_db("db_messages", $this->database);
        if (!$result) {
            echo "DB select fail.<br>";
        }
        echo "==============================================<br>";
    }

    function __destruct() {
        mysql_close($this->database);
    }

}
