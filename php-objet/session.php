<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>exercice php</title>
	<meta name="Author" content="Manex"/>
	<meta name="Keywords" content="php" />
	<meta name="Description" content="Exercice objet en Php" />
	<!--<link href="css/style.css" rel="stylesheet" type="text/css" />
	Importation de polices
	<link href='http://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy' rel='stylesheet' type='text/css'>-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<style>
		* {box-sizing: border-box}
		body {background: #020; color: #9f9}
		a {color: #bf9}
		a:hover {color: #fa9}
	</style>
</head>
<body>
<?php
require 'identification.php';
$user = new utilisateur;
$userName = $_POST['userName'];
$password = $_POST['password'];
$entrer = $user->identification ($userName, $password);
if ($entrer == true){
	echo "<p>Accès autorisé</p>";
} else {
	echo "<p>Accès refusé</p>";
}
?>
<a href="index.php"><input type="button" value="retour"></a>
</body>
</html>