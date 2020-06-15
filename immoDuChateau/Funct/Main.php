<?php
class Immo {
    private $db;
    private $requete;

    public function __construct (){
        $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_NUM);
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=immo_du_chateau', 'root', '', $options);
        } catch (exeption $e){
            die ($e->getMessage());
            $this->db = '';
        }
    }
}
?>