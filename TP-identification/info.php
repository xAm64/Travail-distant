<?php
session_start();

if(isset($_SESSION["login"]) && isset($_SESSION["pwd"])){
	echo "<p>Bravo  M(e)".$_SESSION["login"]." vous êtes connecté(e)</p>"
	?>
	<input type="hidden" name="suppr_session" id="suppr" value="suppr">
	<button type="submit" class="btn btn-primary">Déconnexion</button></a><?php

	} else {
	echo "Erreur vous devez recommencer!! ";
}

if(isset ($_POST["suppr_session"]) && $_POST["suppr_session"]=="suppr"){
	session_destroy();
	session_unset();

header("location: index.php");
}

?>
<p><a href="./"><input type="button" value="◄ Retour"></a></p>


