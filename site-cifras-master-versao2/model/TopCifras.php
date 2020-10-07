<?php

include_once 'Connection.php';

class TopCifras
{

    /*private $id;
    private $name;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
    }*/

    public static function listData(){
        $con = new Connection();
        $all = $con->runQuery("select * from top order by id desc");
        $con->closeConnection();

        return $all;
    }

    public static function createData($dado){
        $con = new Connection();
        $con->runData("insert into top (musica, artista) values ('$dado->musica', '$dado->artista')");
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

    public static function deleteData($id){
        $con = new Connection();
        $con->runData("delete from top where id = $id");
        $con->closeConnection();
    }

    public static function editData($dado){
        $con = new Connection();
        $con->runData("update top set musica = '$dado->musica', artista = '$dado->artista' where id ='$dado->id' ");
        $con->closeConnection();
    }

    public static function searchId($id){
        $con = new Connection();
        $cont = $con->runQuery("select * from top where id = $id");
        $con->closeConnection();

        foreach ($cont as $row){
            $lista = array(
                'id'        => $row['id'],
                'musica'    => $row['musica'],
                'artista'   => $row['artista']

            );
        }

        return $lista;
    }





}