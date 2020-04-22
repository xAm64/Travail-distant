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
		if(isset($_GET['montant']) && isset($_GET['taux']) && isset($_GET['annees'])){
			$pair = false;
			$montant = $_GET['montant'];
			$taux = ($_GET['taux'] / 100) / 12;
			$montant = $montant * (1 + $taux);
			$nombreMois = $_GET['annees']*12;
			$quotient = (1 - pow ( (1+$taux), -$nombreMois));
			$calculMensuel = $montant * $taux / $quotient;
			$mensualiteMontant = ($_GET['montant'] / $_GET['annees']) / 12;
			$interets = $montant * (1 + ($_GET['taux'] / 100));
			$mensualiteInterets = ($_GET['montant'] * $_GET['taux'] / 100) / $nombreMois;
			$montantRestant = $_GET['montant'];
			$interetsRestant = $_GET['montant'] * 3 / 100;
			$mensualite = $mensualiteMontant + $mensualiteInterets;
			$totalPaye = 0;

			//rappel du montant
			echo "<p>Le montant emprunté est: ".$_GET['montant']."€, la durée du crédit est sur: ".$nombreMois." mois, soit: ".round($calculMensuel,2)." € par mois</p>"
			?>
			<table>
			<tr><th>mois</th><th>capital du restant</th><th>intérêts restant</th><th>Mensualitée</th><th>Déjà payé</th></tr>
			<?php
			//algorythme calcul
			for ($i = 1; $i < $nombreMois; $i++){
				if ($pair == true){
					echo "<tr class=\"pair\"><td class=\"pair\">".$i."</td><td class=\"pair\">".round($montantRestant,2)."</td><td class=\"pair\">".round($interetsRestant,2)."</td><td class=\"pair\">".round($mensualite,2)."</td><td class=\"pair\">".round($totalPaye,2)."</td></tr>";
					$montantRestant = $montantRestant - $mensualiteMontant;
					$interetsRestant = $interetsRestant - $mensualiteInterets;
					$totalPaye = $totalPaye + $mensualite;
					$pair = false;
				} else {
					echo "<tr class=\"impair\"><td class=\"impair\">".$i."</td><td class=\"impair\">".round($montantRestant,2)."</td><td class=\"impair\">".round($interetsRestant,2)."</td><td class=\"impair\">".round($mensualite,2)."</td><td class=\"impair\">".round($totalPaye,2)."</td></tr>";
					$montantRestant = $montantRestant - $mensualiteMontant;
					$interetsRestant = $interetsRestant - $mensualiteInterets;
					$totalPaye = $totalPaye + $mensualite;
					$pair = true;
				}
			}
			if ($pair == true){
				echo "<tr class=\"pair\"><td class=\"pair\">".$nombreMois."</td><td class=\"pair\">".round($montantRestant,2)."</td><td class=\"pair\">".round($interetsRestant,2)."</td><td class=\"pair\">".round($mensualite,2)."</td><td class=\"pair\">".round($totalPaye,2)."</td></tr>
				</table>";
			} else {
				echo "<tr class=\"impair\"><td>".$nombreMois."</td class=\"impair\"><td>".round($montantRestant,2)."</td class=\"impair\"><td>".round($interetsRestant,2)."</td></td class=\"impair\"><td>".round($mensualite,2)."</td></td class=\"impair\"><td>".round($totalPaye,2)."</td></tr>
				</table>";
			}

		} else {
			?>
			<p>Une erreur à été détecter<br>
			Le calcul ne peux pas se faire</p>
			<a href="index.php"><input type="button" value="recommencer"></a>
			<?php
		}
		
	?>
<br><a href="index.php"><input type="button" value="revenir"></a>
</body>
</html>