<?php
echo password_hash("Belmondo", PASSWORD_DEFAULT, ["cost" => 12])."<br>";//va crypter le mot de pass Belmondo
?>