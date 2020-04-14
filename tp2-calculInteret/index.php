<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>exercice php</title>
	<meta name="Author" content="Manex"/>
	<meta name="Keywords" content="php" />
	<meta name="Description" content="exercice de calcul en php" />
	<!--<link href="css/style.css" rel="stylesheet" type="text/css" />
	Importation de polices
	<link href='http://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy' rel='stylesheet' type='text/css'>-->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<style>
		* {box-sizing: border-box}
		body {background: #020; color: #9f9}
		a {color: #bf9}
		a:hover {color: #fa9}
		
		.cadre {border: 2px solid #ff9;
		margin-bottom: 5px}
	</style>
</head>
<body>
	<h1>Exercice prêt</h1>
	<div class="cadre">
		<p>Version 2, calcul mensualité</p>
		<form method="post" action="calcul.php">
		<p>Montant emprunté<input type="number" id="montant" name="montant" value="0" min="0"></imput></p>
		<p>Taux intérêt %<input type="number" id="taux" name="taux" value="0" min="0" max="60"></imput></p>
		<p>durée du remboursement en années<input type="number" id="annees" name="annees" value="0" min="0" max="35"></imput></p>
		<input type="submit" value="envoyer">
		</form>
	</div>
	<div class="cadre">
		<p>Version 1, calcul avec tableau</p>
		<form method="post" action="calcul-details.php">
		<p>Montant emprunté<input type="number" id="montant" name="montant" value="0" min="0"></imput></p>
		<p>Taux intérêt %<input type="number" id="taux" name="taux" value="0" min="0" max="60"></imput></p>
		<p>durée du remboursement en années<input type="number" id="annees" name="annees" value="0" min="0" max="35"></imput></p>
		<input type="submit" value="envoyer">
		</form>
	</div>
</body>
</html>