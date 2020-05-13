<?php require_once ("fonct/header.php");
echo "<h1>TP restaurant</h1>";
$db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '');
$afficher = $db->query('SELECT * from duchemin ORDER BY dateVisite DESC');
require_once ("fonct/ecriture.php");
$maTable = new duchemin();
$maTable->lecture();
/*?>
<table>
	<tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date de visite</th></tr>
<?php while ($sortie = $afficher->fetch()){
	?><tr><td><?php echo $sortie['nom'] ?></td><td><?php echo $sortie['adresse'] ?></td><td><?php echo $sortie['prix'] ?></td><td><?php echo $sortie['commentaire'] ?></td><td><?php echo $sortie['note']?>/10</td><td><?php echo implode('-',array_reverse(explode('/',$sortie['dateVisite'])))?></td></tr><?php
	}*/ ?>
<!-- </table>
<table> -->
	<p>Gestion des données</p>
	<tr><td><a href="ajout.php"><input type="button" value="Ajouter"></a></td><td><a href="suppression.php"><input type="button" value="Supprimer"></a></td></tr>
</table>
<?php require_once ("fonct/footer.php"); ?>