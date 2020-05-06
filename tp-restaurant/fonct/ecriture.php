<?php
class enregistreur {
    private $nom;
    private $adresse;
    private $prix;
    private $commentaire;
    private $note;
    private $dateVisite;

    function __construct (string $_nom, string $_adresse, double $_prix, string $_commentaire, bit $_note, $_date){
        $this->nom = $_nom;
        $this->adresse = $_adresse;
        $this->prix = $_prix;
        $this->commentaire = $_commentaire;
        $this->note = $_note;
        $this->$date = $_date;
    }

    function ecrire(){
        $db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '');
        $bd->exec ("INSERT INTO duchemin
        (nom, adresse, prix, commentaire, note, dateVisite)
        VALUES ('$this->nom','$this->adresse','$this->prix','$this->commentaire','$this->note','$this->dateVisite')
        ");
    }
}
?>