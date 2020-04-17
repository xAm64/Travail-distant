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
            if ($revenus >= 0){
                $montantImpots = $impots->calculerTaux($revenus);
            echo "<p>Vous avez déclarer: ".$revenus."€, vous devez payer: ".$montantImpots."€ d'impots.</p>";
            ?>
            <a href="./index.html"><input type="button" value="nouvel essaie"></a>
            <?php
            } else {
                redirection('La valeur minimale est de 0');
            }
            
        } else {
            redirection("Vous avez envoyer une valeur qui n'existe pas (merci de saisir que des chiffres supérieurs à 0)");
        }
    function redirection($_message){
        echo "<p>Vous avez fait l'erreur suivante: ".$_message."</p>"
        ?>
        <a href="./index.html"><input type="button" value="recommencer"></a>
        <?php
    }
    ?>
</body>
</html>