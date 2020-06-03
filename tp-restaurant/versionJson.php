<?php require_once ("fonct/header.php");
echo "<h1>TP restaurant</h1>";
$db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '');
$afficher = $db->query('SELECT * from duchemin ORDER BY dateVisite DESC');
require_once ("fonct/ecriture.php");
$maTable = new duchemin();
$monJson = $maTable->genererCollection(); //mon json est ici

$flux = fopen("fonct/resto.json","w+");
fwrite($flux, $monJson);
fclose($flux);

echo "<p> Json brut :<br>".$monJson."<br>Fin du post</p>";
echo '<script src="fonct/script.js"></script>';
require_once ("fonct/footer.php");
?>