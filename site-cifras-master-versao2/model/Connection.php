<?php

class Connection {
    private $server;
    private $user;
    private $password;
    private $database;
    private $connection;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->database = 'cifra';
        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
       // mysqli_set_charset($this->connection,"utf8");

    }

    public function runQuery($sql){
        $container = $this->connection->query($sql);
        return $container;
    }

    public function affected_rows(){
        $container = mysqli_affected_rows($this->connection);
        return $container;
    }

    public function runQueryAssoc($sql){
        $container = $this->connection->query($sql);
        return $container->fetch_assoc();
    }

    public function runData($sql){
        $this->connection->query($sql);
    }

    public function closeConnection(){
        $this->connection->close();
    }
}