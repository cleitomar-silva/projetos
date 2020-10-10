<?php

include_once 'Connection.php';

class Cursos
{

    private $id;
    private $nome;
    private $categoria_id;

    public function __construct()
    {
        $this->id = 0;
        $this->nome = "";
        $this->categoria_id = "";
    }


    public static function listarCursos()
    {
        $con = new Connection();
        $all = $con->runQuery("select c.*, t. `nome` as categoria from `cursos` as c
            inner join  `categorias` as t on 
            c. `categoria_id` = t.`id`        
            order by c.`id` desc");

        $con->closeConnection();

        return $all;

    }

    public static function buscarCurso($pequisa)
    {
        $con = new Connection();
        $all = $con->runQuery("select c.*, t. `nome` as categoria from `cursos` as c
            inner join  `categorias` as t on 
            c. `categoria_id` = t.`id` 
        WHERE UPPER(c.nome) LIKE '%$pequisa%'");
        $con->closeConnection();
        return $all;
    }

    public static function incluirCurso($curso)
    {
        $con = new Connection();
        $con->runData("insert into cursos (nome, categoria_id) values ('$curso->nome', '$curso->categoria')");

        $rows = $con->affected_rows();
        if($rows > 0)
        {
            $_SESSION['msg-sucess'] =  "Cadastro efetuado com sucesso!";
        }else{
            $_SESSION['msg-error'] = "Erro, Tente novamente!";
        }

        $con->closeConnection();
    }

    public static function editarCurso($curso)
    {
        $con = new Connection();
        $con->runData("update cursos set nome = '$curso->nome', categoria_id = '$curso->categoria' where id = '$curso->id'");
        $con->closeConnection();
    }

    public static function pesquisarID($id){
        $con = new Connection();
        $cont = $con->runQuery("select c.*, t. `nome` as categoria from `cursos` as c
            inner join  `categorias` as t on 
            c. `categoria_id` = t.`id` 
            where c.id = $id");
        $con->closeConnection();

        foreach ($cont as $row){

            $lista = array(
                'id' => $row['id'],
                'nome' => $row['nome'],
                'categoria_id' => $row['categoria_id'],
                'categoria' => $row['categoria'],
            );

        }

        return $lista;
    }

    public static function excluirCurso($id)
    {
        $con = new Connection();
        $con->runData("delete from cursos where id = $id");
        $con->closeConnection();
    }


}