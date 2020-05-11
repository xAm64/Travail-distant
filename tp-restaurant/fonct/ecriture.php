<?php
class duchemin {
    private $db;
    private $requete;

    public function __construct (){
        $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_NUM);
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=tprestaurant', 'root', '', $options);
        } catch (exeption $e){
            die ($e->getMessage());
            $this->db = '';
        }
        $this->requete = $this->db->prepare("SELECT * FROM duchemin ORDER BY DateVisite desc");
    }

    public function lecture(){
        $this->requete->execute();
        echo "<table>
        <thead><tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date de visite</th></tr></thead>";
        echo "<tbody>";
        while ($tabRow = $this->requete->fetch()){
            echo "<tr>";
            for ($i = 1; $i < count($tabRow); $i++){
                if ($i == 5){
                    echo "<td>".$tabRow[$i]."/10</td>";  
                } else if ($i == 6){
                    echo "<td>".(new dateTime($tabRow[$i]))->format('j/n/Y')."</td>";
                } else {
                    echo "<td>".$tabRow[$i]."</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function ecrire($_nom, $_adresse, $_prix, $_commentaire, $_note, $_dateVisite){
        $this->db->exec ("INSERT INTO duchemin
        (nom, adresse, prix, commentaire, note, dateVisite)
        VALUES ($_nom,$_adresse,$_prix,$_commentaire,$_note,$_dateVisite)
        ");
    }

    public function effacer($_nom){
        $this->db->exec ("DELETE FROM duchemin WHERE nom='$nom'");
    }
}
?>