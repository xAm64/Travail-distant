<?php
class utilisateur {
    function identification ($_username, $_password) {
        $id;
        if ($_username == 'Admin' && $_password == 'admin')/* code public j'ai mit un mot de pass de base à na pas utiliser */{
            $id = true;
        } else {
            $id = false;
        }
        return $id;
    }
}