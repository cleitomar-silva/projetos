<?php
session_start();
include '../model/Cursos.php';

switch ($_GET['a'])
{
    case 'novo':

        $curso->nome = $_POST['nome'];
        $curso->categoria = $_POST['categoria'];
        Cursos::incluirCurso($curso);
        header("Location:../view/curso-novo.php");
        break;

    case 'excluir':
        Cursos::excluirCurso($_GET['id']);
        header("Location:../view/cursos.php");
        break;

    case 'editar':

        $curso->id = $_POST['id'];
        $curso->nome = $_POST['nome'];
        $curso->categoria = $_POST['categoria'];

        if(empty($_POST['categoria'])){
            $_SESSION['msg-danger'] = "Selecione uma opção válida!";
            header("Location:../view/curso-editar.php?id=". $_POST['id']);

        }else{
            Cursos::editarCurso($curso);
            header("Location:../view/cursos.php");
        }
    break;

}
