<?php
session_start();
if (isset($_SESSION['id'])) {
	if ($_POST['logout'] == '登出') {
		session_unset();
		header("Content-Type:text/html; charset=utf-8");
		echo '登出中......';
		header("Refresh: 1; url='index.php'");
	} else {
		header("Location: messageboard.php");
	}
} else {
	header("Location: index.php");
}
