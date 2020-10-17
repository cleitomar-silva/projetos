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
                    <form id="form1">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o Nome" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
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
                                    <td><?php echo $row['nome'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id'] ?>"><span class="oi oi-pencil"></span></a>
                                        <a href="../controller/RoleController.php?a=del&id=<?php echo $row['id'] ?>" onclick="return confirm('Confirmar Exclusão?')"><span class="oi oi-trash"></span></a>
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


        ?>
        <form id="form">
            <input type="text" name='id' id="id">
        </form>
        <input type="text" name='nome' id="nomeajax">

        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script>
            $(document).ready(function(){
                $("#form").submit(function(){
                    var id = $("#id").val();
                    console.log(id)
                    if(id == ""){

                    }else{
                        $.ajax({
                            url: '../controller/RoleController.php?a=pesq',
                            data: {id: id},
                            type: 'POST',
                            dataType: 'json',
                            success: function(retorno){
                               console.log(retorno);
                                $("#nomeajax").val(retorno.nome);
                            },
                            error: function(){
                                alert("erro houve")
                            }
                        })
                    }
                    return false;
                })
            })
        </script>

    </body>
</html>