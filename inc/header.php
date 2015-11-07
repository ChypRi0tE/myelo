<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="League of Legends, Rating, classement, equipes, ranked team, french, francais">
	<meta name="description" content="Description">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/favicon-trophy.ico">
	<title>Classement des teams Françaises</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet/less" type="text/css" href="assets/css/style.less">
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
<?php   $_DEBUG_ = false;
    include_once('inc/utils.php');
    include_once('inc/connect.php');
?>