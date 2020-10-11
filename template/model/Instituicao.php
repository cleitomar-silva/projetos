<?php

include_once 'Connection.php';


class Instituicao
{
    public static function listarCursos()
    {
        $con = new Connection();
        $all = $con->runQuery("select * from instituicao");
        $con->closeConnection();

        return $all;

    }

    public static function incluirInstituicao($instituicao)
    {
        $con = new Connection();
        $con->runData("insert into instituicao (nome) values ('$instituicao->nome')");

        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-sucess'] =  "Cadastro efetuado com sucesso!";
        }else{
            $_SESSION['msg-error'] = "Erro, Tente novamente!";
        }

        $con->closeConnection();
    }

    public static function excluirInstituicao($id)
    {
        $con = new Connection();
        $con->runData("delete from instituicao where id = $id");
        $con->closeConnection();
    }

    public static function pesquisarID($id)
    {
        $con = new Connection();
        $cont = $con->runQuery("select * from instituicao where id = $id");
        $con->closeConnection();

        foreach ($cont as $row){

            $lista = array(
                'id' => $row['id'],
                'nome' => $row['nome']
            );
        }

        return $lista;
    }

    public static function editarInstituicao($instituicao)
    {
        $con = new Connection();
        $con->runData("update instituicao set nome = '$instituicao->nome' where id = '$instituicao->id'");
        $con->closeConnection();
    }


}