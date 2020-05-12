<?php
require_once ("fonct/header.php");
?>
<h1>Ajouter des commentaires</h1>
<?php
require_once ("fonct/ecriture.php");
$maTable = new duchemin();

// Fonctions
function verify1(){
    //vérifie que le formulaire est envoyé
    if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prix']) && isset($_POST['commentaire']) && isset($_POST['note']) && isset($_POST['dateVisite'])){
        return true;
    } else {
        return false;
    }
}
function verify2(){
    //vérifie que le formilaire est prêt à partir
    if (isset($_POST['confirm']) && $_POST['confirm']=="ok"){
        return true;
    } else {
        return false;
    }
}
function verify3($_nom, $_adresse, $_prix, $_commentaire ,$_note, $_dateVisite){
    //vérifie qu'il n'y ait pas de champ vides
    $valeur = true;
    if($_nom==null){
        $valeur=false;
    }
    if($_adresse==null){
        $valeur=false;
    }
    if($_prix==null){
        $valeur=false;
    }
    if($_commentaire==null){
        $valeur=false;
    }
    if($_note==null){
        $valeur=false;
    }
    if($_dateVisite==null){
        $valeur==false;
    }
    return $valeur;
}
function afficherFormulaire($_nom, $_adresse, $_prix, $_commentaire ,$_note, $_dateVisite){
    //affiche le formulaire
    $affichage = "<table>
        <tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date</th></tr>
        <tr><td>".$_nom."</td><td>".$_adresse."</td><td>".$_prix."€</td><td>".$_commentaire."</td><td>".$_note."/10</td><td>".(new dateTime($_dateVisite))->format('j/n/Y')."</td></tr>
    </table>";
    return $affichage;
}

//code
if (verify1()==true){
// Vérifie si les champs ne sont pas vides
    if ((verify1()==true) && (verify2()==true) && (verify3($_POST['nom'], $_POST['adresse'], $_POST['prix'], $_POST['commentaire'], $_POST['note'], $_POST['dateVisite']) == true)){
        // va envoyer dans la base de données si tout est bon
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $prix = $_POST['prix'];
        $commentaire = $_POST['commentaire'];
        $note = $_POST['note'];
        $dateVisite = $_POST['dateVisite'];
        ?>
        <p>La table suivante a bien été envoyé !</p>
        <?php echo afficherFormulaire($nom, $adresse, $prix, $commentaire, $note, $dateVisite);?>
        <a href="index.php"><input type="button" value="◄ Retour à l'accueil"></a><?php
        $maTable->ecrire($nom, $adresse, $prix, $commentaire, $note, new dateTime($dateVisite));
    } else {
    // Va afficher le formulaire à l'utilisateur avant de l'envoyer
    if (verify3($_POST['nom'], $_POST['adresse'], $_POST['prix'], $_POST['commentaire'], $_POST['note'], $_POST['dateVisite']) == true){
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $prix = $_POST['prix'];
        $commentaire = $_POST['commentaire'];
        $note = $_POST['note'];
        $dateVisite = $_POST['dateVisite'];
        echo $dateVisite;
        echo afficherFormulaire($_POST['nom'], $_POST['adresse'], $_POST['prix'], $_POST['commentaire'], $_POST['note'], $_POST['dateVisite']);
        ?>
        <table>
        <p>Confirmer vous cet envoie ?</p>
        <tr><!-- oui --><td><form action ="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="nom" value="<?php echo $nom ?>">
            <input type="hidden" name="adresse" value="<?php echo $adresse ?>">
            <input type="hidden" name="prix" value="<?php echo $prix ?>">
            <input type="hidden" name="commentaire" value="<?php echo $commentaire ?>">
            <input type="hidden" name="note" value="<?php echo $note ?>">
            <input type="hidden" name="dateVisite" value="<?php echo $dateVisite ?>">
            <input type="hidden" name="confirm" value="ok">
            <button type="submit">Oui</button></form></td>
            <!-- non --><td><a href="index.php"><form method="post" enctype="text/plain">
            <input type="hidden" name="confirm" value="no">
            <button type="submit">Non</button></a></td></tr>
        </table>
        <?php
    } else {
        // des champs sont vide le formulaire ne pars pas
        echo "<p>Les champs vides ne sont pas autorisés, votre formulaire n'a pas été envoyé !</p>"
        ?>
        <a href="index.php"><button>Retour</button></a>
        <?php
    }
    }
} else {
    // rien est rempli, l'utilisateur tombe sur le formulaire à remplir
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <p>Nom et Pérnom: <input type="text" name="nom" pattern="{6}"></p>
        <p>Adresse: <input type="text" name="adresse" pattern="{15}"></p>
        <p>Prix: <input type="number" name="prix" step="0.01" min="0"></p>
        <p>Commentaire: <textarea name="commentaire" rows="5" cols="60" pattern="{20}"></textarea></p>
        <p>Note /10: <input type="number" name="note" min="0" max="10"></p>
        <p>Date: <input type="date" name="dateVisite"></p>
        <button type="submit">Envoyer</button>
    </form>
    <?php
}
require_once ("fonct/footer.php");
?>