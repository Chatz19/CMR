<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username == "unilorin" && $password == "usu001"){
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	header('location: home.php');
}
else{
	header('location: login.php');
}
?>