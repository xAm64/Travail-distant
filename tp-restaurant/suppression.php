<?php
require_once ("fonct/header.php");
require_once ("fonct/ecriture.php");
$myTable = new duchemin;
//fonctions
function verifierGet(){
    $verify = false;
    if (isset($_GET['personne'])){
        $verify = true;
    }
    return $verify;
}
function verifierNonVide($_valeur){
    $verify = false;
    if ($_valeur != null){
        $verify = true;
    }
    return $verify;
}
function afficherFormulaire(){
    $formulaire = '
    <form action="'.$_SERVER['PHP_SELF'].'" method="get" enctype="multipart/form-data">
        <p>Indiquer le nom du contenue à supprimmer</p><input type="text" name="personne"><button type="submit">Supprimmer</button>
    </form>';
    return $formulaire;
}

//code
echo "<h2>Supprimmer une personne</h2>";
if (isset($_POST['personne'])){
    $verify=true;
    if (verifierNonVide($_POST['personne'])==false){
        $verify=false;
    }
    if ($myTable->recherche($_POST['personne'])==null){
        $verify=false;
    }
    if ($verify==true){
        $myTable->effacer($_POST['personne']);
        echo "<p>La partie de: ".$_POST['personne']." à bien été effacer</p>";
        echo '<a href="index.php"><input type="button" value="◄ Retour à l\'accueil"></a>';
    } else {
        echo '<p class="text-danger>Erreur importante détecter, l\'action n\'a pas abouti</p>';
    echo '<a href="index.php"><input type="button" value="◄ Retour à l\'accueil"></a>';
    }   
}
if (verifierGet()==true){
    $personne = ($_GET['personne']);
    if(verifierNonVide($personne)==true){
        if (verifierNonVide($myTable->recherche($personne))==false){
            echo '<p class="text-danger">Ce nom n\'existe pas !</p>';
            echo afficherFormulaire();
        } else {
            // créer un formulaire de confirmation de suppression
            echo '<p class="text-success">Ce nom existe</p>';
            ?>
            <table>
                <p>Êtes vous sur de vouloir supprimmer le contenue de: <?php echo $personne ?>?</p>
                <tr><!-- oui --><td><form action="<?php $_SERVER['PHP_SELF'] ?>"method="post" enctype="multipart/form-data">
                    <input type="hidden" name="personne" value="<?php echo $personne ?>">
                    <button type="submit">Oui</button></form></td>
                <!-- non --><td><a href="suppression.php"><input type="button" value="non"></a></td></tr>
            </table>
            <?php
        }
    } else {
        echo '<p class="text-danger">Veuillez indiquer un nom, je ne suis pas madame soleil</p>';
        echo afficherFormulaire();
    }
} else {
    echo afficherFormulaire();
}
?><br><a href="index.php"><input type="button" value="◄ Retour à l'accueil"></a><?php
echo "<p>Liste des commentaires</p>";
echo $myTable->lecture();
require_once ("fonct/footer.php");
?>