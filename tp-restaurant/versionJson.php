<?php require_once ("fonct/header.php");
echo "<h1>TP restaurant</h1>";
$db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '');
$afficher = $db->query('SELECT * from duchemin ORDER BY dateVisite DESC');
require_once ("fonct/ecriture.php");
$maTable = new duchemin();
$json = $maTable->genererCollection();
?>
	<p>Gestion des données</p>
	<tr><td><a href="ajout.php"><input type="button" value="Ajouter"></a></td><td><a href="suppression.php"><input type="button" value="Supprimer"></a></td>
	<td><a href="modifier.php"><input type="button" value="Modifier"></a></td></tr>
</table>
<?php
require_once ("fonct/footer.php");
?>