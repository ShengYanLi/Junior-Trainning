<?php

session_start();
if ($_SESSION['id'] == null) {
    header('Location: index.php');
    exit;
}
header("Content-Type:text/html; charset=utf-8");
//unset($_SESSION['id']);
session_unset();
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
