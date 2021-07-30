<?php
session_start();
include_once '../model/Login.php';

switch ($_GET['a']){

    case 'inclu':
        $dado->nome     = trim($_POST['nome']);
        $dado->email    = trim($_POST['email']);
        $dado->senha    = trim($_POST['senha']);
        $arrayEmails=[];


        foreach (Login::listarEmails() as $item)
        {
            array_push($arrayEmails, $item[2]); 
        }


        if(in_array($dado->email, $arrayEmails ))
        {
            $_SESSION['msg-error-cad'] = "Já existe um usuário cadastrado com esse email";
            header("Location:../login.php");

        }elseif(!filter_var($dado->email, FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['msg-error-cad'] = "Campo email obrigatório!";
            header("Location:../login.php");

        }
        elseif(empty( $dado->nome ))
        {
            $_SESSION['msg-error-cad'] = "Campo nome obrigatório!";
            header("Location:../login.php");
        }
        else
        {
            $dado->senha = password_hash( $dado->senha, PASSWORD_DEFAULT);
            Login::createLogin($dado);
            header("Location:../login.php");
        }
        break;

    case 'acesso':

        $dado->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $dado->senha = trim($_POST['senha']);

        $link = Login::acesso($dado);
        $db_email = $link['email'];
        $db_senha = $link['senha'];
        $db_nome  = $link['nome'];

        if($db_email != $dado->email)
        {
            $_SESSION['msg-error-cad'] = "Email não cadastrado!";
            header("Location:../login.php");

        }elseif (!password_verify($dado->senha, $db_senha))
        {
            $_SESSION['msg-error-cad'] = "Senha Incorreta!";
            header("Location:../login.php");

        }else
        {
            $_SESSION['usuario'] = $db_nome;
            header("Location:../create.php");
        }
        break;

}


