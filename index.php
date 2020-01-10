<?php
    require "banco.php";
    $banco = new Banco("localhost", "TestesCRUD", "root", "");
    /*
    $banco->insert("usuarios", array(  //insert
        "nome" => 'tereza',
        "sobrenome" => 'vieira',
        "email" => 'tereza.vieira08@gmail.com'
    ));


    $banco->update("usuarios", //tabela, nova informaçao, onde vai ser atualizado
        array("nome" => "JOAO"),
        array("id " => "1")
           
    );
    
    $banco->query("SELECT * FROM usuarios"); //query select
    print_r($banco->result()); //traz o resultado da query
    

    $banco->delete("usuarios", array("id"=>"1")); //delete

    */
?>
