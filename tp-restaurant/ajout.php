<?php
require_once ("fonct/header.php");
?>
<h1>Ajouter des commentaires</h1>
<?php
require_once ("fonct/ecriture.php");
$maTable = new duchemin;
if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prix']) && isset($_POST['commentaire']) && isset($_POST['note']) && isset($_POST['date'])){
    if (isset($_POST['confirm'])=="oui"){
        $maTable->ecrire($_POST['nom'], $_POST['adresse'], $_POST['prix'], $_POST['commentaire'], $_POST['note'], $_POST['date']);
        ?><table>
        <p>La table suivante a bien été envoyé !</p>
        <tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date</th></tr>
        <tr><td><?php echo $nom ?></td><td><?php echo $adresse ?></td><td><?php echo $prix ?>€</td><td><?php echo $commentaire ?></td><td><?php echo $note ?>/10</td><td><?php echo (new dateTime($date))->format('j/n/Y') ?></td></tr>
        </table>
        <a href="index.php"><input type="button" value="◄ Retour"></a><?php
    } else {
        $verification = true;
    if ($_POST['nom']==null){
        $verification = false;
    }
    if ($_POST['adresse']==null){
        $verification = false;
    }
    if ($_POST['prix']==null){
        $verification = false;
    }
    if ($_POST['commentaire']==null){
        $verification = false;
    }
    if ($_POST['note']==null){
        $verification = false;
    }
    if ($_POST['date']==null){
        $verification = false;
    }
    if ($verification == true){
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $prix = $_POST['prix'];
        $commentaire = $_POST['commentaire'];
        $note = $_POST['note'];
        $dateVisite = $_POST['date'];
        ?>
        <table>
        <tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date</th></tr>
        <tr><td><?php echo $nom ?></td><td><?php echo $adresse ?></td><td><?php echo $prix ?>€</td><td><?php echo $commentaire ?></td><td><?php echo $note ?>/10</td><td><?php echo (new dateTime($dateVisite))->format('j/n/Y') ?></td></tr>
        </table>
        <table>
        <p>Confirmer vous cet envoie ?</p>
        <tr><td><form method="post" enctype="text/plain"><input type="hidden" name="confirm" value="oui"><button type="submit">Oui</button></form></td><td><a href="index.php"><form method="post" enctype="text/plain"><input type="hidden" name="confirm" value="non"><button type="submit">Non</button></a></td></tr></table>
        <?php
    } else {
        echo "<p>Les champs vides ne sont pas autorisés, votre formulaire n'a pas été envoyé !</p>"
        ?>
        <a href="index.php"><button>Retour</button></a>
        <?php
    }
    }
} else {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <p>Nom et Pérnom: <input type="text" name="nom" pattern="{6}"></p>
        <p>Adresse: <input type="text" name="adresse" pattern="{15}"></p>
        <p>Prix: <input type="number" name="prix" min="0"></p>
        <p>Commentaire: <input type="textarea" name="commentaire" rows="5" pattern="{20}"></p>
        <p>Note /10: <input type="number" name="note" min="0" max="10"></p>
        <p>Date: <input type="date" name="date"></p>
        <button type="submit">Envoyer</button>
    </form>
    <?php
}
require_once ("fonct/footer.php");
?>