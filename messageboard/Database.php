<?php

/**
 * Description of Database
 * 資料庫
 * @author jason_lee
 */
class Database
{
    public $conn = null;
    public $connect = null;
    public $database = null;

    function __construct()
    {
        $host = 'localhost';
        $account = 'root';
        $password = '1qaz';

        $this->conn = mysqli_connect($host, $account, $password, "db_messages");
        if ($this->conn) {
            mysqli_query($this->conn, "SET NAMES utf8");
        } else {
            die("無法對資料庫連線" . mysqli_connect_error());
        }
    }

    function __destruct()
    {
        // mysql_close($this->connect);
        mysqli_close($this->conn);
    }

}
