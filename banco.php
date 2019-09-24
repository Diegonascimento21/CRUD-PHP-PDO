<?php
    //conexão com o bando de dados
    class Banco {
        private $pdo;
        private $numRows;
        private $array;

        public function __construct($host, $dbname, $dbuser, $dbpassword){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpassword);
            } catch(PDOException $e){
                echo "Erro : ".$e->getMessage();
            }
        }
        
    //Método pra executar Query
        public function Query($sql){
            $query = $this->pdo->Query($sql);
            $this->numRows = $query->rowCount();
            $this->array = $query->fetchAll();
        }

    //funçao pra mostrar os registros pesquisados
        public function numRows(){
            return $this->numRows;
        }
    }
    // Método Result
        public function Result(){
            return $this->array;
        }
        
    
?>