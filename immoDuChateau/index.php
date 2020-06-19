<?php
require_once("Funct/header.php");//affiche le header
require_once("Funct/menu.php");//affiche le menu principale
?>
<main>
<h1>Immo du chateau</h1>
<?php
require_once ("Funct/main.php");
$connect = immo::getImmo();

/*$state=$connect->prepare("Call afficher_par_type(?)");
if(!empty($_GET["lib_cat"])){
    $libelle = $_GET["lib_cat"];
    */require_once("Funct/formulaireRecherche.php");/*
}
$state->bindParam(1,$libelle,PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT,250);
$state->execute();

if(!empty($_GET["dep"])){
    $departement = $_GET["dep"];
}
$connect = immo::getImmo();
$state2 = $connect->prepare("Call afficher_departement(?)");
$state2->bindParam(1,$departement,PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT,3);
$state2->execute();*/

$rq = 'SELECT biens_immobiliers.*
FROM biens_immobiliers 
INNER JOIN categories on biens_immobiliers.id_categorie=categories.id_categorie
 WHERE categories.lib_categorie='.$_GET["lib_cat"].'';

if (!empty($_GET["dep"])){
    $rq.= immo::filtreRequete('num_departement', '=', $_GET["dep"]);
}
if (!empty($_GET["prix"])){
    $rq.= immo::filtreRequete('prix_vente', '<=', $_GET["prix"]);
}
if (!empty($_GET["nbPieces"])){
    if ($_GET["valPcs"] == 'egal'){
        $rq.= immo::filtreRequete('nbr_pieces', '=', $_GET["nbPieces"]); 
    }
    if ($_GET["valPcs"] == 'mini'){
        $rq.= immo::filtreRequete('nbr_pieces', '>=', $_GET["nbPieces"]);
    }
}

var_dump($rq);


/*echo '<table class="table table-dark table-hover" ><tbody>';
while($tabligne=$state1->fetch()) {
	echo"<tr>";
	echo '<th><form method="POST" action="modifier.php" > <input type="hidden" value="'.$tabligne[0].'" name="idmod"  id="idmod'.$tabligne[0].'" > <input type="submit" id="btnMod" name="btnMod" value="Modifier" class="btn btn-primary" > </form> </th><th><a href="detail.php?id='.$tabligne[0].'"  target="_blank" >Voir détail</a></th>';
	for($i=0; $i<sizeof($tabligne);$i++){
		if($i!=0){
                {
				echo"<td>".stripslashes($tabligne[$i])."</td>";
                }
            }	
		}
        echo"</tr>";
    }
echo '</tbody></table>';	
echo'</div><!-- /.span4 --> </div><!-- /.row -->';*/
?>
</main>
<?php
require_once("Funct/footer.php");//affiche le footer
?>