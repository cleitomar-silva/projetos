<?php

include_once 'Connection.php';

class Categorias
{
    public static function listarCategoria(){
        $con = new Connection();
        $all = $con->runQuery("select * from categorias");
        $con->closeConnection();
        return $all;
    }

    public static function novaCategoria($categoria)
    {
        $con = new Connection();
        $con->runData("insert into categorias (nome) values ('$categoria->nome')");

        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-sucess'] =  "Cadastro efetuado com sucesso!";
        }else{
            $_SESSION['msg-error'] = "Erro, Tente novamente!";
        }

        $con->closeConnection();
    }

}