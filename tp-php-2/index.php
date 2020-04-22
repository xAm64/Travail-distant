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
<h1>TP Php</h1>
<p>créer une nouvelle personne<p>
<p>Nom<input type="text" name="nom" value="nom"></p>
<p>Prénom<input type="text" name="prenom" value="prenom"></p>
<p>Adresse<textarea name="adress" rows="5">quelque part</textarea></p>
<p>Mail<input type="email" name="mail" value="moi@mon.adress.com"></p>
<p><input type="submit" value="Envoyer"></p>
<?php
	require personne.php;
?>
</body>
</html>