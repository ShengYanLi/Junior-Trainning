<?php

$host = 'localhost';
$account = 'root';
$password = '1qaz';
$dbName = 'db_messages';

$conn = mysqli_connect($host, $account, $password, $dbName);
if (!$conn) {
    die("無法對資料庫連線" . mysqli_connect_error());
}

mysqli_query("SET NAMES utf8");
