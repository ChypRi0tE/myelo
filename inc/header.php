<!doctype html>
<?php session_start(); ?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="League of Legends, Rating, classement, equipes, ranked team, french, francais">
	<meta name="description" content="Description">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Elo League France</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<?php	$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['login']) || empty($_POST['pass'])) {
		$error = 'Au moins un des champs est vide.';
	} else {
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		if ($login == "chypriote" && $pass == "1234") {
			$_SESSION['user'] = "ChypRiotE";
			header('Location: index.php');
		} else {
			$error = "Username or Password is invalid";
		}
	}
}
?>
<?php $_DEBUG_ = false;
      $_LOCAL_ = false;
if (isset($_GET['disconnect'])) {
	session_destroy();
	header('Location: index.php');
}
include_once('inc/connect.php');
include_once('inc/utils.php');
?>