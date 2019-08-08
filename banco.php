<?php
    class Banco {
        private $pdo;

        public function __construct($host, $dbname, $dbuser, $dbpassword){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpassword);
            } catch(PDOException $e){
                echo "Erro : ".$e->getMessage();
            }
        }
    }
?>