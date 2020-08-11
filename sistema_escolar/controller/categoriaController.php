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

}
