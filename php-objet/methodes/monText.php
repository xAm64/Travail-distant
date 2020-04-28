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
    if($_nombre > strlen($this->message) || $nombre < 0){
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

public function subString(){
    $first = $this->message[0];
    $last = $this->message[(strlen($this->message) -1)];
    $sortie = "<p>la première lettre de: ".$this->message." est: ".$first." et la dernière est: ".$last.".";
    return $sortie;
}

public function toLowerCase(){
    return strtolower($this->message);
}

public function toUpperCase(){
    return strtoupper($this->message);
}

}
?>