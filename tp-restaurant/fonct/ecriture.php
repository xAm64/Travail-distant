<?php
class duchemin {
    private $db;
    private $requete;

    public function __construct() {
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

    public function modifier($_action){
        $this->requete->execute();
        echo "<table>
        <thead><tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date de visite</th><th>Actions</th></tr></thead>";
        echo "<tbody>";
        while ($tabRow = $this->requete->fetch()){
            echo "<tr>";
            for ($i = 1; $i < count($tabRow); $i++){
                $nom;
                if ($i == 1){
                    echo "<td>".$tabRow[$i]."</td>";
                    $nom = $tabRow[$i];
                } else if ($i == 5){
                    echo "<td>".$tabRow[$i]."/10</td>";  
                } else if ($i == 6){
                    echo "<td>".(new dateTime($tabRow[$i]))->format('j/n/Y')."</td><td><a href=\"?personne=".$nom."\"" ?>><input type="button" value="<?php echo $_action ?>"></a></td><?php
                } else {
                    echo "<td>".$tabRow[$i]."</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function ecrire($_nom, $_adresse, $_prix, $_commentaire, $_note, $_dateVisite){
        $_commentaire = addslashes($_commentaire);
        $_nom = addslashes($_nom);
        $_adresse = addslashes($_adresse);
        $this->db->exec ("INSERT INTO duchemin (nom, adresse, prix, commentaire, note, dateVisite) VALUES ('$_nom','$_adresse','$_prix','$_commentaire','$_note','$_dateVisite')");
    }

    public function effacer($_nom){
        $this->db->exec ("DELETE FROM duchemin WHERE nom='$_nom'");
    }

    public function recherche($_nom){
        $requete = "SELECT nom FROM duchemin WHERE nom='$_nom'";
        $execution = $this->db->query($requete);
        return $execution->fetch();
    }

    public function afficherLeNom($_nom){
        $requete = "SELECT * FROM duchemin WHERE nom='$_nom'";
        $execution = $this->db->query($requete);
        echo "<table>\n
        <thead><tr><th>nom</th><th>adresse</th><th>prix</th><th>commentaire</th><th>note</th><th>date de visite</th></tr></thead>";
        while ($tabRow = $execution->fetch()){
            echo '<tr><form action=" '. $_SERVER['PHP_SELF'] .' " method="post" enctype="multipart/form-data">';
            for ($i = 1; $i < count($tabRow); $i++){
                switch ($i){
                    case 1: 
                        echo '<td><input type="text" name="nom" value="'.$tabRow[$i].'" pattern="{6}"></td>';
                    break;
                    case 2:
                        echo '<td><input type="text" name="adresse" value="'.$tabRow[$i].'" pattern="{6}"></td>';
                    break;
                    case 3:
                        echo '<td><input type="number" name="prix" step="0.01" value="'.$tabRow[$i].'" min="0"></td>';
                    break;
                    case 4:
                        echo '<td><textarea name="commentaire" value="'.$tabRow[$i].'" rows="5"></textarea></td>';
                    break;
                    case 5:
                        echo '<td><input type="number" name="note" value="'.$tabRow[$i].'" min="0" max="10"></td>';
                    break;
                    case 6:
                        echo '<td><input type="date" name="date" value="'.(new dateTime($tabRow[$i]))->format('j/n/Y').'" pattern="{6}"></td>';
                    break;
                }
            }
            echo "</form></tr>";
        }
        echo '</table>
        <button type="submit">Envoyer</button>';
    }

}
?>