<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = "";
    $bd = "inner_join";

    $con = new mysqli($servidor, $usuario, $senha, $bd);

    //c = tabela cursos
    //t = tabela categoria

    /* COM WHERE

      $resultado = "select c.*, t. `nome` as categoria from `cursos` as c
            inner join  `categorias` as t on
            c. `categoria_id` = t.`id`
            WHERE t.id = 1
            order by c.`nome` asc
    ";*/

    $resultado = "select c.*, t. `nome` as categoria from `cursos` as c
        inner join  `categorias` as t on 
        c. `categoria_id` = t.`id`        
        order by c.`nome` asc
    ";

    $resultado_cursos = mysqli_query($con, $resultado);

    while ($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){
        echo $rows_cursos['nome']."<br>";
        echo $rows_cursos['categoria']."<br><hr>";

    }
