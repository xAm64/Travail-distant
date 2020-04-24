<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>exercice php</title>
	<meta name="Author" content="Manex"/>
	<meta name="Keywords" content="php" />
	<meta name="Description" content="exercice de calcul en php" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
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
		.bordureBas {border-bottom: 1px solid #ff9}
		th, td {border: 1px solid #ff9}
		.pair {background: #440; color: #ff9}
		.impair {background: 040; color: #9f9}
	</style>
</head>
<body>
<h1>Exercice prêt</h1>
<?php
require_once ("metier/serv-financier.php");
require_once ("metier/tableau.php");
?>

<?php
if (isset($_GET['montant']) && isset($_GET['taux']) && isset($_GET['annees'])){
	function direAn ($_an){
		$dire = '';
		if ($_an <= 1) {
			$dire = 'an';
		} else {
			$dire = 'ans';
		}
		return $dire;
	}
	$monFinancier = new financier ($_GET['montant'], $_GET['taux'], $_GET['annees']);
	$resultat = $monFinancier->calculMensualite();
	echo "<p>Pour: ".$_GET['montant']."€ empruntés avec un taux de: ".$_GET['taux']." %, vous devrez rembourser: ".round($resultat,2)."€ par mois. pendant :".$_GET['annees']." ".direAn($_GET['annees'])."</p>";
	if ($_GET['tableau'] == 'on'){
		$monTableau = new tableau($_GET['montant'], $_GET['taux'], $_GET['annees']);
		$voir = $monTableau->toutAfficher();
		echo $voir;
	}
	?>
	<a href="./"><input type="button" value="revenir"></a>
	<?php
} else {
	?>
	<div class="cadre">
		<p>Version sur cette page</p>
		<form method="get" enctype="text/plain">
			<p>Montant emprunté: <input type="number" name="montant" value="2000" min="500"></p>
			<p>Taux intérêt: <input type="number" name="taux" value="3" min="0" max="25">%</p>
			<p>Nombre d'années: <input type="number" name="annees" value="3" min="1" max="35"></p>
			<p>Faire un tableau<input type="checkbox" name="tableau"></p>
			<button type="submit">Envoyer</button>
		</form>
	</div>
	<?php
}

?>
<!--
<h2 class="bordureBas">Ancienne version</h2>
<div class="cadre">
	<p>Version 2, calcul mensualité</p>
	<p>Version mensualité sur un autre page</p>
	<form method="get" action="calcul.php" enctype="text/plain">
	<p>Montant emprunté
		<input type="number" id="montant" name="montant" value="2000" min="500">
	</p>
	<p>Taux intérêt %
		<input type="number" id="taux" name="taux" value="3" min="0" max="60">
	</p>
	<p>durée du remboursement en années
	<input type="number" id="annees" name="annees" value="4" min="0" max="35">
	</p>
	<input type="submit" value="envoyer" name="valider-simple">
	</form>
</div>
<div class="cadre">
	<p>Version tableau sur une autre page</p>
	<form method="get" action="calcul-details.php" enctype="text/plain">
	<p>Montant emprunté
		<input type="number" id="montant" name="montant" value="2000" min="500">
	</p>
	<p>Taux intérêt %
		<input type="number" id="taux" name="taux" value="3" min="0" max="60">
	</p>
	<p>durée du remboursement en années
		<input type="number" id="annees" name="annees" value="3" min="0" max="35">
	</p>
	<input type="submit" value="envoyer">
	</form>
</div>
-->
</body>
</html>