<?php
require_once ("fonct/header.php");
?>
<h1>Ajouter des commentaires</h1>
<?php
if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prix']) && isset($_POST['commentaire']) && isset($_POST['note']) && isset($_POST['date'])){
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
        $date = $_POST['date'];
        ?>
        <table>
        <tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date</th></tr>
        <tr><td><?php echo $nom ?></td><td><?php echo $adresse ?></td><td><?php echo $prix ?>€</td><td><?php echo $commentaire ?></td><td><?php echo $note ?></td><td><?php echo $date ?></td></tr>
        </table>
        <p>Confirmer vous cet envoie ?<button type="submit">Oui</button><button type="restet">Non</button>
        <?php
    } else {
        echo "<p>Les champs vides ne sont pas autorisés, votre formulaire n'a pas été envoyé !</p>"
        ?>
        <a href="index.php"><button>Retour</button></a>
        <?php
    }
} else {
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <p>Nom et Pérnom: <input type="text" name="nom" pattern="{6}"></p>
        <p>Adresse: <input type="text" name="adresse" pattern="{15}"></p>
        <p>Prix: <input type="number" name="prix" min="0"></p>
        <p>Commentaire: <input type="textarea" name="commentaire" pattern="{20}"></p>
        <p>Note /10: <input type="number" name="note" min="0" max="10"></p>
        <p>Date: <input type="date" name="date"></p>
        <button type="submit">Envoyer</button>
    </form>
    <?php
}
require_once ("fonct/footer.php");
?>