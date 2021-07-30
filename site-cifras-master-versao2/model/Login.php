<?php

include_once 'Connection.php';

class Login
{

    public static function createLogin($dado){
        $con = new Connection();
        $con->runData("insert into login (nome, email, senha) values ('$dado->nome', '$dado->email', '$dado->senha')");

        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-cad-sucess'] = "Cadastro efetuado com sucesso!";

        }else
        {
            $_SESSION['msg-error-cad'] = "Erro, Tente novamente!";
        }

        $con->closeConnection();
    }

    public static function listarEmails(){
        $con = new Connection();
        $all = $con->runQuery("select * from login");
        $con->closeConnection();
        return $all;
    }

    public static function acesso($dado){
        $con = new Connection();
        $rowAcesso = $con->runQueryAssoc("select * from login where email = '$dado->email'");
        $con->closeConnection();
        return $rowAcesso;
    }


}