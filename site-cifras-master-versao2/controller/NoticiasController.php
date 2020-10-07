<?php
session_start();
include_once '../model/Noticias.php';

switch ($_GET['a']) {

    case 'inclu':

        $arquivo->imagem    = $_FILES['arquivo'];

        if (isset($_FILES['arquivo']))
        {
            $nome               =   $arquivo->imagem['name'];
            $tiposPermitidos    =   ['pdf','docx','doc','jpg','jpeg','png'];
            $tamanho            =   $arquivo->imagem['size'];

            $extensao           =   explode('.',$nome);
            $extensao           =   end($extensao);
            $arquivo->novoNome  =   rand() ."-$nome". '.' . $extensao;

            if(in_array($extensao, $tiposPermitidos))
            {
                if($tamanho > 2000000)
                {
                    $_SESSION['msg-danger'] = "O tamanho do arquivo excede o limite permitido!";
                    header("Location:../create.php");

                }else{

                    move_uploaded_file($_FILES['arquivo']['tmp_name'],'../upload/'.$arquivo->novoNome );

                    Noticias::createNoticias($arquivo);

                   // $_SESSION['msg-success'] = "Cadastro efetuado com sucesso!";
                }
            }else{

                $_SESSION['msg-danger'] = "Tipo de arquivo não permitido!";
                header("Location:../create.php");
            }
        }
        break;

    case 'del':

        Noticias::deleteNoticias($_GET['id']);
        break;
}

header("Location: ../create.php");