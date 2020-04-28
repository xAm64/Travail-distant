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
<?php
require_once ("methodes/monText.php");
?>
<script>
	function sendValue(){
		let nombre = document.getElementById("revenus").value;
		document.location.href="calculer.php?revenus="+nombre;
		}
	</script>
	<h1>Tp Php Poo 1</h1>
	<div class="cadre">
		<p>Exercice Calcul de la taxe</p>
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
	<div class="cadre">
	<p>Exercice la classe string</p>
	<?php
	if (isset($_GET['message'])){
		if ($_GET['message'] != null){
			$monText = new monText ($_GET['message']);
			echo $monText->afficherMessage();
			echo $monText->compterLettres();
			if (isset($_GET['caractere'])){
				if ($_GET['caractere'] != null){
					echo $monText->charAt($_GET['caractere']);
				}
			}
			echo $monText->subString();
			echo "<p>En minuscules: ".$monText->toLowerCase()."</p>";
			echo "<p>En majuscules: ".$monText->toUpperCase()."</p>";
		} else {
			echo "<p>Vous n'avez rien saisie<p>";
		}
		?>
		<a href="./"><input type="button" value="refaire"></a>
		<?php
	} else {
		?>
		<form method="get" enctype="text/plain">
			<p>Écrire votre text ici: <input type="text" name="message"></p>
			<p>Écrire le numéro du caractère que vous voullez extraire: <input type="number" min="1" name="caractere"> (laisser vide n'effectura pas cette opération)</p>
			<p><button type="submit">Envoyer</button></p>
		</form>
		<?php
	}
	?>
	</div>
</body>
</html>