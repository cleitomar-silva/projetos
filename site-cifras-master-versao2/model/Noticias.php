<?php

include_once 'Connection.php';

class Noticias
{

    public static function listNoticias(){
        $con = new Connection();
        $all = $con->runQuery("select * from noticias order by id desc");
        $con->closeConnection();
        return $all;
    }

    public static function createNoticias($dado){
        $con = new Connection();
        $con->runData("insert into noticias (imagem) values ('$dado->novoNome')");
        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-sucesso'] = true;

        }else
        {
            $_SESSION['msg-error'] = true;
        }
        $con->closeConnection();
    }

    public static function deleteNoticias($id)
    {
        $con = new Connection();

        //exclui imagem local
        $registro = $con->runQueryAssoc("select imagem from  noticias where id = $id");
        $arquivo   =  $registro['imagem'];
        unlink('../upload/'.$arquivo);


        //exclui imagem no banco
        $con->runData("delete from noticias where id = $id");
        
        $con->closeConnection();

        return $registro;
    }






}

