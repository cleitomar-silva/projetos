<?php
/**
 * Created by PhpStorm.
 * User: cleitomar
 * Date: 20/04/2019
 * Time: 08:37
 */

include_once '../model/Connection.php';


class RolesGive
{

    private $id;
    private $name;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
    }


    public static function listData()
    {
        $con = new Connection();
        $all = $con->runQuery("select * from cliente");
        $con->closeConnection();

        return $all;
    }

    public static function listar($dado)
    {
        $con = new Connection();
        $all = $con->runQuery("select * from cliente where nome like '%".$dado."%' ");
        $con->closeConnection();
        return $all;
    }

    public static function createData($rol)
    {
        $con = new Connection();
        $con->runData("insert into cliente (nome) values ('$rol->nome')");
        $con->closeConnection();
        $rows = $con->affected_rows();
        if($rows > 0)
        {
            die(json_encode('sucesso'));

        }else
        {
            die(json_encode('erro'));
        }
    }

    public static function searchId($id)
    {
        $con = new Connection();
        $cont = $con->runQuery("select * from cliente where codigo = $id");

        foreach ($cont as $key => $row){
            $lista[$key] = array(       //para retornar so um retirar [$key]
                'id'          => $row['id'],
                'nome'        => $row['nome'],
            );
        }

        return $lista;
    }

    public static function editData($rol)
    {
        $con = new Connection();
        $con->runData("update cliente set nome = '$rol->name' where id = ". $rol->id);
        $con->closeConnection();
    }

    public static function deleteData($id)
    {
        $con = new Connection();
        $con->runData("delete from cliente where id = $id");
        $con->closeConnection();
    }

}