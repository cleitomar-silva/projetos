<?php
/**
 * Created by PhpStorm.
 * User: cleitomar
 * Date: 20/04/2019
 * Time: 10:04
 */

include_once '../model/RolesGive.php';


switch ($_GET['a'])
{
    case 'incl':

        $role->nome = $_POST['nome'];
        RolesGive::createData($role);

        break;

    case 'edit':

        $role->id = $_POST['id'];
        $role->name = $_POST['name'];

        RolesGive::editData($role);

        break;

    case 'del':
        RolesGive::deleteData($_GET['id']);
        break;

    case 'pesq':
        $mgs = RolesGive::searchId($_POST['id']);
        die(json_encode($mgs));
        break;


}

header("Location: ../view");