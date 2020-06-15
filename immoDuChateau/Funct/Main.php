<?php
class immo {
    private $db;
    private $requete;
    private static $connexion = null;

    public function __construct (){
        //vide
    }

    static public final function getImmo() {
        if (is_null(self::$connexion)){
            try {
                self::$connexion = new PDO('mysql:host=127.0.0.1;dbname=immo_du_chateau','root','',array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM
                ));
            } catch (PDOExeption $e) {
                die("Database connection failed: " . $e->getMessage());
				echo "erreur connexion";
            }
        }
        return self::$connexion;
    }
}
?>