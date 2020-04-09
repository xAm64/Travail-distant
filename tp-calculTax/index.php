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
	<a href="?revenus=0">lien test</a>
	<?php
		$impots = 0;
		if (isset($_GET['revenus'])){
			$revenusTotal = (int)$_GET['revenus'];
			if ($revenusTotal <= 14000){
				$impots = 9;
			} else {
				$impots = 14;
			}
			$montantImpots = $revenusTotal * $impots / 100;
			echo "<p>Le montant des revenus déclarés est: ".$revenusTotal.". L'impots est de ".$impots."%, ce qui fait une somme de ".$montantImpots." à payer";
		} else {
			?>
			<script>
				function sendValue(){
					let nombre = document.getElementById("revenus").value;
					document.location.href="?revenus="+nombre;
				}
			</script>
			<p>saisir le montant des revenus</p><input id="revenus" type="number" value="0" min="0"><input type="button" id="envoyer" value="envoyer" onclick="sendValue()"></input>
			<?php
		}
	?>

</body>
</html>