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
	</style>
</head>
<body>
	<h1>Exercice prêt</h1>
	<?php
		if(isset($_GET['montant']) && isset($_GET['taux']) && isset($_GET['annees'])){
			$montant = (int)$_GET['montant'];
			$taux = (int)$_GET['taux'] / 100;
			$montant = $montant * (1 + $taux);
			$annees = (int)$_GET['annees'];
			$calculMensuel = ($montant / $annees) / 12;
			echo "Le montant mensuel à rembouser est de:".$calculMensuel."€ par mois";
		} else {
			?>
			<p>Montant emprunté<input type="number" id="montant" name="montant" value="0" min="0"></imput></p>
			<p>Taux intérêt %<input type="number" id="interets" name="interets" value="0" min="0" max="60"></imput></p>
			<p>durée du remboursement en années<input type="number" id="annees" name="annees" value="0" min="0" max="35"></imput></p>
			<input type="button" id="envoyer" value="envoyer" onclick="envoyer()"></input>
			<?php
			function envoyer(){
				$_POST['montant'];
				$_POST['interets'];
				$_POST['annees'];
			}
			?>
				<form method="post" action="#">
			<?php
		}
	?>

</body>
</html>