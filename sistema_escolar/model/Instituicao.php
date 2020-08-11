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
}