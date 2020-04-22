<?php
class personne {
    private $nom;
    protected $prenom;
    protected $adress;
    private $mail;

    public function __construct (string $_nom, string $_prenom, string $_adress, string $_mail) {
        $this->nom = $_nom;
        $this->prenom = $_prenom;
        $this->adress = $_adress;
        $this->mail = $_mail;
    }

    public function getPersonne(){
        $message = "cette personne s'appelle: ".$this->nom." ".$this->prenom." elle habite: ".$this->adress." son mail est: ".$this->mail;
        return $message;
    }

    public function setAdress($_nouvelleAdresse){
        $this->adress = $_nouvelleAdresse;
    }

    public function setMail($_newMail){
        $this->mail = $_newMail;
    }

}

class Employe extends personne{
    private $numEmp;

    public function __construct($_Nom, $_prenom, $_adress, $_mail, $_numEmp){
        parent::__construct($_nom, $_prenom, $_adress, $_mail);
    }
}