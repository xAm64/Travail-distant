<?php
class monText {
public $message;

public function __construct($_message){
    $this->message = $_message;
}

public function afficherMessage(){
    echo "<p>Le text: ".$this->message."</p>";
}
 
public function compterLettres(){
    $x = strlen($this->message);
    return "<p>Il contient: ".$x." caractères</p>";
}

public function charAt($_nombre){
    $nombre = $_nombre -1 ;
    $retour = "";
    $string = $this->message;
    $classement;
    if($nombre > strlen($this->message) || $nombre < 0){
        $retour = "<p>Le caractère numéro: ".$_nombre." n'existe pas !</p>";
    } else {
        if ($_nombre == 1){
            $classement = "er";
        } else {
            $classement = "ème";
        }
        $retour = "<p>Le ".$_nombre."<sup>".$classement."</sup> caractère de: ".$this->message." est: ".$string[$nombre]."</p>";
    }
    return $retour;
}
}
?>