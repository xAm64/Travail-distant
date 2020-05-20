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

//code
echo "<h2>Supprimmer une personne</h2>";
if (isset($_POST['personne'])){
    $verify=true;
    if (verifierNonVide($_GET['personne'])==false){
        $verify=false;
    }
    if ($myTable->recherche($_GET['personne'])==null){
        $verify=false;
    }
    if ($verify==true){
        $myTable->effacer($_GET['personne']);
        echo "<p>La partie de: ".$_GET['personne']." à bien été effacer</p>";
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
    }
} else {
    echo "<p>Séléctionner un nom dans la liste</p>";
}
?><br><a href="index.php"><input type="button" value="◄ Retour à l'accueil"></a><?php
echo "<p>Liste des commentaires</p>";
echo $myTable->modifier('supprimmer');
require_once ("fonct/footer.php");
?>