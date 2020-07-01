<from action ="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <p>Nom d'utilisateur<input type="text" name="username"></p>
    <p>Mot de pass<input type="password" name="password"></p>
    <p><button type="submit">Envoyer</button></p>
</from>
<?php
if (isset($_POST["username"]) && isset($_POST["password"])){
    $identifiant = verifierUser($_POST["username"], $_POST["password"]);
    if ($identifiant == null){
        echo "<p>Le nom d'utilisateur et/ou le mot de pass sont faux</p>";
    } else {
        echo "<p>Bienvenue ".$_POST["username"]." vous êtes connecter</p>";
    }
}
function verifierUser($_username, $_password){
    $connexion = immo::getImmo();
    $rq = "SELECT *
    FROM utilisateurs
    WHERE nom_utilisateur = $_username AND pass_utilisateur = $_password";
    $resultat = $connexion->query($rq);
    return $resultat;
}
?>
