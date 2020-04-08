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
	<h1>Exercice php</h1>
	<input id="revenus" type="number" value="0" min="0">
	<?php
		$impots = 0;
		if ($revenus <= 14000){
			$impots = 9
		} else {
			$impots = 14
		}
		$montantImpots = $revenus * $impots / 100;
		echo '<p>Le montant de l\'impots est de $impots %, ce qui fait une somme de $montantImpots à payer';
	?>
	</table>
</body>
</html>