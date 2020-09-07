<?php

include_once 'conexao.php';

$titulos = $_POST["titulo"];


$cont_insert = false;

foreach($titulos as $titulo)
{

    $queryInsert   = $link->query("insert into aulas values(default,'$titulo')");
    $affected_rows = mysqli_affected_rows($link);


    if ($affected_rows>0) {
        $cont_insert = true;
    }else{
        $cont_insert = false;
    }	    
}

if($cont_insert)
{
    echo "<p style='color:green;'>Cadastrado com Sucesso</p>";
}else
{
    echo "<p style='color:red;'>Erro ao cadastrar</p>";
}

