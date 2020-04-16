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
		
		th, td {border: 1px solid #ff9}
		.pair {background: #440; color: #ff9}
		.impair {background: 040; color: #9f9}
	</style>
</head>
<body>
	<h1>Exercice prêt</h1>
	<?php
		if (empty($_POST['montant']) || empty($_POST['taux']) || empty($_POST['annees'])){
			header('location: ./index.php');
			exit();
		}
		$pair = false;
		$montant = $_POST['montant'];
		$tauxBase = $_POST['taux'];
		$taux = $_POST['taux'] / 100;
		$interets = $montant * 3 / 100;
		$annees = $_POST['annees'];
		$nombreMois = $annees * 12;
		$mensualiteMontant = ($montant / $annees) / 12;
		$mensualiteInterets = ($interets / $annees) / 12;
		$an = "";
		if ($annees <= 1){
			$an = "anée";
		} else {
			$an = "années";
		}
		echo "<p>Le montant emprunté est: ".$montant."€, les intérêts sont de: ".$tauxBase."%, la durée du crédit est sur: ".$annees." ".$an."</p>
		<table>
		<tr><th>mois</th><th>capital du restant</th><th>intérêts restant</th></tr>";
		for ($i = 1; $i < $nombreMois; $i++){
			if ($pair == true){
				$afficherMontant = number_format($montant,2);
				$afficherInterets = number_format($interets,2);
				echo "<tr class=\"pair\"><td class=\"pair\">".$i."</td><td class=\"pair\">".$afficherMontant."</td><td class=\"pair\">".$afficherInterets."</td></tr>";
				$montant = $montant - $mensualiteMontant;
				$interets = $interets - $mensualiteInterets;
				$pair = false;
			} else {
				$afficherMontant = number_format($montant,2);
				$afficherInterets = number_format($interets,2);
				echo "<tr class=\"impair\"><td class=\"impair\">".$i."</td><td class=\"impair\">".$afficherMontant."</td><td class=\"impair\">".$afficherInterets."</td></tr>";
				$montant = $montant - $mensualiteMontant;
				$interets = $interets - $mensualiteInterets;
				$pair = true;
			}
		}
		if ($pair == true){
			$afficherMontant = number_format($montant,2);
			$afficherInterets = number_format($interets,2);
			echo "<tr class=\"pair\"><td>".$nombreMois."</td><td>".$afficherMontant."</td><td>".$afficherInterets."</td></tr>
			</table>";
			$pair = false;
		} else {
			$afficherMontant = number_format($montant,2);
			$afficherInterets = number_format($interets,2);
			echo "<tr class=\"impair\"><td>".$nombreMois."</td><td>".$afficherMontant."</td><td>".$afficherInterets."</td></tr>
			</table>";
			$pair = true;
		}
	?>
<br><a href="index.php"><input type="button" value="revenir"></a>
</body>
</html>