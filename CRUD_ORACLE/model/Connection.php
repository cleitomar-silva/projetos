<?php

class Connection
{
    private $db;
    private $user;
    private $pass;
    private $connection;

    public function conectar()
    {
        $this->db = 'oci:dbname=orcl_teste';
        $this->user = 'system';
        $this->pass = 'Cl88441417';
        
        try{
            $this->connection = new PDO($this->db, $this->user, $this->pass);
            $this->connection->exec('SET CARACTER SET utf8');

            if($this->connection)
            {
               // echo "Conectado com sucesso!";
                return $this->connection;
            }
        }catch(Exception $e)
        {
            echo "Error de conexion: ".$e->getMessage();
        }
    }



}


