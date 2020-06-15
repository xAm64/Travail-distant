<?php
require_once("Funct/header.php");//affiche le header
require_once("Funct/menu.php");//affiche le menu principale
?>
<main>
<h1>Immo du chateau</h1>
<?php
require_once ("Funct/main.php");
$connect = immo::getImmo();

$state=$connect->prepare("Call afficher_par_type(?)");
if(!empty($_GET["lib_cat"])){
    $libelle = $_GET["lib_cat"];
}
$state->bindParam(1,$libelle,PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT,250);
$state->execute();
echo '<table class="table table-dark table-hover" ><tbody>';
while($tabligne=$state->fetch()) {
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
		echo'</div><!-- /.span4 --> </div><!-- /.row -->';
?>
</main>
<?php
require_once("Funct/footer.php");//affiche le footer
?>