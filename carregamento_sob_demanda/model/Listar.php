<?php
/**
 * Created by PhpStorm.
 * User: cleitomar
 * Date: 20/04/2019
 * Time: 08:37
 */

include_once 'Connection.php';


class Listar
{


    public static function listData($data)
    {
        $maxLimit = 3;
        $offset = ($data * $maxLimit) - $maxLimit;
        $offset = $offset.",".$maxLimit;

        $con = new Connection();
        $all = $con->runQuery("select * from comments LIMIT ".$offset);
        $con->closeConnection();

        foreach ($all as $key => $row)
        {
            $lista[$key] = array(
                'id'         => $row['id'],
                'nome'       => $row['nome'],
                'comentario' => $row['comentario'],
            );
        }

        return $lista;
    }


}