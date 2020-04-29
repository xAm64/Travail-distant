<?php
session_start();

if(isset($_SESSION["login"]) && isset($_SESSION["pwd"])){
	echo "<p>Bravo  M(e)".$_SESSION["login"]." vous êtes connecté(e)</p>"
	?><a href="db/deco.php"><input type="button" value="Déconnexion"></a><?php

	} else {
	echo "Erreur vous devez recommencer!! ";
}

?>
<p><a href="./"><input type="button" value="◄ Retour"></a></p>


