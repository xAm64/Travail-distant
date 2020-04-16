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
	</style>
</head>
<body>
    <?php
        require 'calcul.php';
        $impots = new calcul;
        if(isset($_GET['revenus'])){
            $revenus = (int)$_GET['revenus'];
            $montantImpots = calcul.calculerTaux($revenus);
            echo "<p>Vous avez déclarer: ".$revenus."€, vous devez payer: ".$montantImpots."€ d'impots.</p>";
        } else {
            ?>
            <p>Vous avez fait une erreur, le calcul ne pourra pas se faire</p>
            <p>Voici l'option qui vous est proposer</p>
            <a href="./index.html"><input type="button" value="recommencer"></a>
            <?php
        }
    ?>
</body>
</html>