<?php include_once '../model/RolesGive.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD POO</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../open-iconic-master/font/css/open-iconic-bootstrap.css">

    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col col-lg-6">
                    <h3>Papéis</h3>
                    <hr>
                    <a href="include.php">
                        <button type="button" class="btn btn-primary">Novo</button>
                    </a>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(RolesGive::listData() as $row): ?>

                                <tr>
                                    <td><?php echo $row[1] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row[0] ?>"><span class="oi oi-pencil"></span></a>
                                        <a href="../controller/RoleController.php?a=del&id=<?php echo $row[0] ?>" onclick="return confirm('Confirmar Exclusão?')"><span class="oi oi-trash"></span></a>
                                    </td>
                                </tr>

                            <?php

                            endforeach;?>
                        </tbody>
                    </table>
                    <hr>

                    <button type="button" class="btn btn-danger" onclick="numero();">Click</button>
                </div>
            </div>
        </div>

        <?php
        //$array = [12,20,100,200];

        ?>


        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script>

        </script>

    </body>
</html>