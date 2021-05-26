<?php
session_start();

include_once '../app/configuracao.php';
include_once '../app/autoload.php';



?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>/public/css/estilos.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    <title>MVC</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <?php  if(isset($_SESSION['usuario_id'])){ ?>
                <a class="navbar-brand" href="#">PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo URL ?>">Inicio</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link " href="<?php echo URL ?>/paginas/sobre">sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo URL ?>/posts">Posts</a>
                        </li>

                    </ul>

                </div>
                <span>
                    <p class="text-white">Olá, <?php echo $_SESSION['usuario_nome']?> </p>
                     <a class="btn-sm btn-danger" href="<?php echo URL ?>/usuarios/sair">Sair</a>
                </span>


            <?php  } else { ?>
                <span class="navbar-text">
                    <a href="<?php echo URL ?>/usuarios/cadastrar" class="btn btn-info text-white">
                        Cadastre-se
                    </a>
                    <a href="<?php echo URL?>/usuarios/login" class="btn btn-info ms-3 text-white">
                        Entrar
                    </a>
                </span>

            <?php  } ?>

        </div>
    </nav>


    <?php

        $rotas = new Rota();

    ?>

</body>
</html>