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
       
        $rows = $con->affected_rows();
        if($rows > 0)
        {
            return 'sucesso';

        }else
        {
           return 'erro';
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
                'codigo'        => $row['codigo'],
            );
        }

        return $lista;
    }


    public static function autoComplete($dado)
    {
        $con = new Connection();
        $cont = $con->runQuery("SELECT * FROM cliente WHERE nome LIKE '%".$dado."%' or  id LIKE '%".$dado."%' or codigo LIKE '%".$dado."%'  LIMIT 7");

       /* foreach ($cont as $key => $row){
            $lista = array(                
               // 'id'          => $row['id'],
                'nome'        => $row['nome'],
                //'codigo'        => $row['codigo']              
            );
        }*/

         foreach ($cont as  $row){
            $temp_array = array();        
            $temp_array['value'] = $row['id'];
            $temp_array['label'] = $row['nome'];

            $output[] = $temp_array;            
        }


        return $output;
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