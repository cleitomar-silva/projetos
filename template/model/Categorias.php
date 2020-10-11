<?php

include_once 'Connection.php';

class Categorias
{
    public  function listarCategoria(){
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

    public static function excluirCategoria($id)
    {
        $con = new Connection();
        $con->runData("delete from categorias where id = $id");
        $con->closeConnection();
    }

    public static function pesquisarID($id)
    {
        $con = new Connection();
        $cont = $con->runQuery("select * from categorias where id = $id");
        $con->closeConnection();

        foreach ($cont as $row){

            $lista = array(
                'id' => $row['id'],
                'nome' => $row['nome']
            );
        }

        return $lista;
    }

    public static function editarCategoria($categoria)
    {
        $con = new Connection();
        $con->runData("update categorias set nome = '$categoria->nome' where id = '$categoria->id'");
        $con->closeConnection();
    }

}