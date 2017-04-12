<?php
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	if($login == "admin" and $pass == "root")
	{
		session_start();
		$_SESSION['login'] = $login;
		echo "1";
	}
	else
	{
		echo "0";
	}
?>