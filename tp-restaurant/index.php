<?php require_once ("fonct/header.php");
echo "<h1>TP restaurant</h1>";
$db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '');
$afficher = $db->query('SELECT * from duchemin');
/*$avis = $db->prepare($sql); //prépare la requête SQL
$avis->setFetchMode(PDO::FETCH_ASSOC); //Récupére le contenue
$avis->execute(); //execute la requête
$sortie = $sql->fetchAll(PDO::FETCH_OBJ);*/
?>
<table>
	<tr><th>identitiant</th><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date</th></tr>
<?php while ($sortie = $afficher->fetch()){
	echo "<tr><td>".$sortie['id']."</td><td>".$sortie['nom']."</td><td>".$sortie['adresse']."</td><td>".$sortie['prix']."</td><td>".$sortie['commentaire']."</td><td>".$sortie['note']."/10</td><td>".implode('-',array_reverse(explode('/',$sortie['date'])))."</td></tr>";
	}?>
</table> 
<?php require_once ("fonct/footer.php"); ?>