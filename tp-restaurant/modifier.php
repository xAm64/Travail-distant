<?php
require_once ("fonct/header.php");
require_once ("fonct/ecriture.php");
//code
$myTable = new duchemin;
?>
<h2>Modifier ou supprimmer un commentaire</h2>
<?php
if (verifId() == true){
    if (verifNoVide($_GET['id'])==true){
        if (verifContenue($_GET['id'])==true){
            echo $myTable->afficherId($numero);
        }
    }
}
echo "<p>Liste des commentaires</p>";
echo $myTable->modifier();

//fonctions
function verifId(){
    $verif = false;
    if (isset($_GET['id'])){
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
function verifContenue($_id){
    $verif = false;
    if (($myTable->rechercheId($_id))!=null){
        $verif = true;
    }
    return $verif;
}

require_once ("fonct/footer.php");
?>