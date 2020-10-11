<?php
session_start();
include_once '../model/Instituicao.php';

switch ($_GET['a'])
{
    case 'novo':
        $instituicao->nome = $_POST['nome'];
        Instituicao::incluirInstituicao($instituicao);

        header("Location:../view/instituicao-novo.php");
        break;

    case 'excluir':
        Instituicao::excluirInstituicao($_GET['id']);
        header("Location:../view/instituicao.php");
        break;

    case 'editar':
        $instituicao->id = $_POST['id'];
        $instituicao->nome = $_POST['nome'];
        Instituicao::editarInstituicao($instituicao);
        header("Location:../view/instituicao.php");
        break;

}
