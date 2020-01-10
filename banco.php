<?php
    //conexão com o bando de dados
    class Banco {
        private $pdo;
        private $numRows;
        private $array;
        private $sql;

        public function __construct($host, $dbname, $dbuser, $dbpassword){
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpassword);
            } catch(PDOException $e){
                echo "Erro : ".$e->getMessage();
            }
        }
        
    //Método pra executar Query
        public function query($sql){
            $query = $this->pdo->Query($sql);
            $this->numRows = $query->rowCount();
            $this->array = $query->fetchAll();
        }

    //funçao pra mostrar os registros pesquisados
        public function numRows(){
            return $this->numRows;
        }
    //Método Result
        public function result(){
            return $this->array;
        }

    //Método insert 
        public function insert($table, $data){
            if(!empty($table) && (is_array($data) && count($data) > 0)){
                $sql = " INSERT INTO ".$table." SET ";
                $dados = Array();
                foreach ($data as $key => $value) {
                    $dados[] = $key."= '". addslashes($value)."'";
                }
                $sql =$sql.implode(",", $dados);
                $this->pdo->query($sql);
            }
        }

    //Método Update
        public function update($table, $data, $where = array(), $where_cond = 'AND'){
            if(!empty($table) && (is_array($data) && count($data) > 0) && is_array($where)){
                $sql = "UPDATE ".$table." SET ";
                $dados = Array();
                foreach ($data as $key => $value) {
                    $dados[] = $key."= '". addslashes($value)."'";
                }
                    $sql = $sql.implode(",", $dados);

                if(count($where) > 0){
                    $dados = Array();
                    foreach ($where as $key => $value) {
                        $dados[] = $key."= '". addslashes($value)."'";
                    }
                    $sql =$sql." WHERE ".implode(" ".$where_cond." ", $dados);
                }    
                $this->pdo->Query($sql);               
            }
        }
    //Delete
        public function delete($table, $where, $where_cond = "AND"){
            if(!empty($table) && (is_array($where) && count($where) > 0)){
                $sql = "DELETE FROM ".$table;
                if(count($where) > 0){
                    $dados = Array();
                    foreach ($where as $key => $value) {
                        $dados[] = $key."= '". addslashes($value)."'";
                    }
                    $sql =$sql." WHERE ".implode(" ".$where_cond." ", $dados);               
                } 
                $this->pdo->query($sql);
            }         
        }


    }
?>