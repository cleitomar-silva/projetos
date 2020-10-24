<?php
/**
 * Created by PhpStorm.
 * User: cleitomar
 * Date: 20/04/2019
 * Time: 08:03
 */

class Connection {
    private $server;
    private $user;
    private $password;
    private $database;
    private $connection;

    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "test";

        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
    }

    //run = executar

    public function runQuery($sql)
    {
        $container = $this->connection->query($sql);
        return $container;
    }

    public function affected_rows(){
        $container = mysqli_affected_rows($this->connection);
        return $container;
    }

    public function runData($sql)
    {
        $container = $this->connection->query($sql);
        return $container;
    }

    public function runQueryAssoc($sql){
        $container = $this->connection->query($sql);
        return $container->fetch_assoc();
    }


    public function closeConnection()
    {
        $this->connection->close();
    }


}