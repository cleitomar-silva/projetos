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

    public static function createData($rol)
    {
        $con = new Connection();
        $con->runData("insert into cliente (nome) values ('$rol->nome')");
        $con->closeConnection();
    }

    public static function searchId($id)
    {
        $con = new Connection();
        $cont = $con->runQuery("select * from cliente where id = $id");
        return $cont[0];
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