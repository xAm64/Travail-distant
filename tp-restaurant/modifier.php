<?php
require_once ("fonct/header.php");
require_once ("fonct/ecriture.php");
//code
$myTable = new duchemin;
?>
<h2>Modifier ou supprimmer un commentaire</h2>
<?php
if (verifId() == true){
    $identifiant = $_GET['nom'];
    if (verifNoVide($identifiant) == true && verifContenue($identifiant) == true){
        echo "<p>Vous voulez supprimmer l'id: ".$identifiant."?</p>";
    }
}
echo "<p>Liste des commentaires</p>";
echo $myTable->modifier();

//fonctions
function verifId(){
    $verif = false;
    if (isset($_GET['nom'])){
        $verif = true;
    }
    return $verif;
}
function verifNoVide($_valeur){
    $verif = false;
    if ($_valeur != null){
        $verif = true;
    }
    return $verif;
}
function verifContenue($_nom){
    $verif = false;
    if ($myTable->recherche($_nom) != null){
        $verif = true;
    }
    return $verif;
}
?><br><a href="index.php"><input type="button" value="◄ Retour à l'accueil"></a><?php
require_once ("fonct/footer.php");
?>