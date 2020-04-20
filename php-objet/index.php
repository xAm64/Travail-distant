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
		.cadre {border: 2px solid #ba9; margin-bottom: 5px;}
	</style>
</head>
<body>
<script>
	function sendValue(){
		let nombre = document.getElementById("revenus").value;
		document.location.href="calculer.php?revenus="+nombre;
		}
	</script>
	<h1>Tp Php Poo 1</h1>
	<div class="cadre">
		<p>saisir le montant des revenus</p>
		<input id="revenus" type="number" value="0" min="0">
		<input type="button" id="envoyer" value="envoyer" onclick="sendValue()">
	</div>
	<div class="cadre">
		<p>--- Exercice mot de pass ---</p>
		<form method="post" action="session.php">
			<p>Identifier vous</p>
			<p>Nom d'utilisateur<input type="text" id="userName" name="userName"></p>
			<p>Mot de pass<input type="password" id="password" name="password"></p>
			<p><input type="submit" value="Envoyer"></p>
		</form>
	</div>
</body>
</html>