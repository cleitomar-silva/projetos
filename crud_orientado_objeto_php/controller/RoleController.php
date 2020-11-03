<?php
/**
 * Created by PhpStorm.
 * User: cleitomar
 * Date: 20/04/2019
 * Time: 10:04
 */

include_once '../model/RolesGive.php';


$role = (object)[]; 

switch ($_GET['a'])
{
    case 'incl':
        
        $role->nome = $_POST['nome'];
        $retorno = RolesGive::createData($role);
        echo json_encode($retorno);
        break;
       

    case 'edit':

        $role->id = $_POST['id'];
        $role->name = $_POST['name'];

        RolesGive::editData($role);
        header("Location: ../view");
        break;

    case 'del':
        RolesGive::deleteData($_GET['id']);
        header("Location: ../view");
        break;

    case 'pesq':
        $retorno = RolesGive::searchId($_POST['codigo']);
        echo json_encode($retorno);
        break;

    case 'autocomplete':
       // $resultPesquisa = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

        $retorno = RolesGive::autoComplete($_GET['term']);
        echo json_encode($retorno);
        break;

}

