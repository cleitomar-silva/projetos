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
        return $container->fetch_all();
    }

    public function runData($sql)
    {
        $this->connection->query($sql);
    }


    public function closeConnection()
    {
        $this->connection->close();
    }


}