<?php
require_once ("fonct/header.php");
require_once ("fonct/ecriture.php");
//code
$myTable = new duchemin;
?>
<h2>Modifier un commentaire</h2>
<?php
if (isset($_GET['personne'])){
    if ($_GET['personne'] != null && $myTable->recherche($_GET['personne']) != null){
        $myTable->afficherLeNom($_GET['personne']);
    } else {
        echo "<p class=\"text-danger\">Une erreur à été détecter merci de recommencer</p>";
        echo $myTable->modifier('Modifier');
    }
} else {
    echo $myTable->modifier('Modifier');
}
?><br><a href="index.php"><input type="button" value="◄ Retour à l'accueil"></a><?php
require_once ("fonct/footer.php");
?>