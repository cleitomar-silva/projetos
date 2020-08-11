<?php
session_start();
include_once '../model/Categorias.php';

switch ($_GET['a'])
{
    case 'novo':
        $categoria->nome = $_POST['nome'];
        Categorias::novaCategoria($categoria);

        header("Location:../view/categoria-novo.php");
        break;

    case 'excluir':
        Categorias::excluirCategoria($_GET['id']);
        header("Location:../view/categoria.php");
        break;

    case 'editar':
        $categoria->id = $_POST['id'];
        $categoria->nome = $_POST['nome'];
        Categorias::editarCategoria($categoria);
        header("Location:../view/categoria.php");
        break;

}
