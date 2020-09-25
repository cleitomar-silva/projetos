<?php

include_once "Connection.php";

class Cliente{

    public static function index(){
        $con = new Connection();  
        $sql = "select * from usuario";
        $stmt = $con->conectar()->prepare($sql);
        $stmt->execute();
        
        return $stmt;
    }

    public static function create($data){
        $con = new Connection();
        $sql = "insert into usuario (NOME) values ('$data->nome')";
        $stmt = $con->conectar()->prepare($sql);
        $stmt->execute();

    }

    public static function show($id){       
        $con = new Connection();  
        $sql = "select * from usuario where ID = '$id' ";
        $stmt = $con->conectar()->prepare($sql);
        $stmt->execute();

        foreach ($stmt as  $value) {
            $value['NOME'];
            $value['ID'];
        }

        return $value;
    }

    public static function update($data){        
        $con = new Connection();  
        $sql = "update usuario set NOME = '$data->nome' where ID = '$data->id'";
        $stmt = $con->conectar()->prepare($sql);
        $stmt->execute();
    }

    public static function destroy($id){
        $con = new Connection();
        $sql = "delete from usuario where id = $id";
        $stmt = $con->conectar()->prepare($sql);
        $stmt->execute();
    }

}