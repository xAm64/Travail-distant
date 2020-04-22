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
			$montant = $_GET['montant'];
			$taux = ($_GET['taux'] / 100) / 12;
			$montant = $montant * (1 + $taux);
			$nombreMois = $_GET['annees']*12;
			$quotient = (1 - pow ( (1+$taux), -$nombreMois));
			$calculMensuel = $montant * $taux / $quotient;
			echo "Le montant mensuel à rembouser est de:".round($calculMensuel,2)."€ par mois";
		} else {
			?>
			<p>Une erreur à été détecter<br>
			Le calcul ne peux pas se faire</p>
			<a href="index.php"><input type="button" value="recommencer"></a>
			<?php
		}
		
		/*echo "<table>
		<tr><th>mois</th><th>capital du restant</th><th>intérêts restant</th></tr>
		<tr><td>1<7td><tr>"*/
	?>
<br><a href="index.php"><input type="button" value="revenir"></a>
</body>
</html>