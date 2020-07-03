<from action ="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <p><input type="radio" id="inscription" name="service" value="inscription"><label>Inscription</label>
    <input type="radio" id="connexion" name="service" value="connexion" checked><label>Connexion</label></p>
    <p>Nom d'utilisateur<input type="text" name="username"></p>
    <p>Prénom <input type="text" name="prenom"></p>
    <p>Adresse e-mail <input type="email" name="mail"></p>
    <p>Mot de pass<input type="password" name="password"></p>
    <p><button type="submit">Envoyer</button></p>
</from>
<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["service"])){
    if($_POST["service"] == 'connexion'){
        $identifiant = verifierUser($_POST["username"], $_POST["password"]);
            if ($identifiant == null){
            echo "<p>Accès refusé, le nom d'utilisateur et/ou le mot de pass sont faux</p>";
            } else {
            echo "<p>Bienvenue ".$_POST["username"]." vous êtes connecter</p>";
        }
    } elseif ($_POST["service"] == 'inscription'){
        if (isset($_POST["mail"]) && isset($_POST["prenom"])){
            if (verifierUser($_POST["username"], $_POST["password"]) != null){
                $connexion = immo::getImmo();
                $mot2Pass = encodePassword($_POST["passworld"]);
                $rq = 'INSERT INTO utilisateurs (nom_utilisateur, prenom_utilisateur, mail_utilisateur, pass_utilisateur)
                VALUES ('.$_POST["username"].','.$_POST["prenom"].','.$_POST["mail"].','.$mot2Pass.');';
                $connexion->query($rq);
                echo '<p class="success>L\'utilisateur à été ajouté</p>';
            } else {
                echo '<p class="danger">Cette personne existe déjà</p>';
            }
        } else {
            echo '<p class="warning>Le prénon et/ou l\'adresse mail manque</p>';
        }
    } else {
        echo '<p class="danger">Une erreur à été détecter, le formulaire n\'a pas été encoyer</p>';
    }
}

//fonctions
function verifierUser($_username, $_password){
    $connexion = immo::getImmo();
    $rq = "SELECT *
    FROM utilisateurs
    WHERE nom_utilisateur = $_username AND pass_utilisateur = $_password";
    $resultat = $connexion->query($rq);
    return $resultat;
}
function encodePassword ($_motDePass){
    $Emprinte = password_hash($_motDePass, PASSWORD_DEFAULT);
    return $Emprinte;
}
?>
