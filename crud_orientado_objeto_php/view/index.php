<?php include_once '../model/RolesGive.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD POO</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../open-iconic-master/font/css/open-iconic-bootstrap.css">

        <link rel="stylesheet" href="../css/jquery-ui.css"> <!-- pesquisar autocomplete -->

        <script src="../js/jquery.js"></script> <!-- pesquisar autocomplete -->
        <script src="../js/jquery-ui.js"></script><!-- pesquisar autocomplete -->

        <script src="../js/bootstrap.js"></script>

        <style>
            .lds-dual-ring {
                display: inline-block;
                width: 80px;
                height: 80px;
            }
            .lds-dual-ring:after {
                content: " ";
                display: block;
                width: 64px;
                height: 64px;
                margin: 8px;
                border-radius: 50%;
                border: 6px solid red;
                border-color: red transparent red transparent;
                animation: lds-dual-ring 1.2s linear infinite;
            }
            @keyframes lds-dual-ring {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }


        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col col-lg-6">
                    <h3>Papéis AutoComplete</h3>
                    <hr>

                   <form id="form1" method="POST">
                        <div class="form-group">
                            <label for="nomePes">Nome</label>
                            <input type="text" class="form-control" name="nomePes" id="nomePes" placeholder="Digite o Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="nomePes">Codigo</label>
                            <input type="text" class="form-control" require name="codigoN" id="codigoN" placeholder="Digite o Nome" required>
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

            <br>


            <!-- load -->
            <div id="load" class="lds-dual-ring"></div>


        </div>

        <?php
      //  print_r(RolesGive::searchId(10));

      /*  for ($i = 0; $i < 5000; $i++){
            echo "INSERT INTO cliente (`nome`,`codigo`) VALUES ('cleiton{$i}', {$i});";
        }*/


        ?>


        <br>digitar valor do codigo
        <form id="form">
            <input type="text" name='codigo' id="codigo">
            <input type="submit">
        </form>
      <!--  <input type="text" name='nome' id="nomeajax">-->
        <select name="selectajax" id="selectajax">
            <option value="">select</option>
        </select>



        <script>



                //pesquisa
                $(function(){
                    $("#nomePes").autocomplete({

                        source: '../controller/RoleController.php?a=autocomplete',
                        minLength: 4,
                        select: function( event, ui ) {

                            setTimeout(function(){
                                $("#codigoN").val(ui.item.value);
                                $("#nomePes").val(ui.item.label);
                            }, 0);
                        }
                    })
                });





            $(document).ready(function(){

                $("#form").submit(function(e){
                    e.preventDefault();

                    var codigo = $("#codigo").val();
                    console.log(codigo)
                    if(codigo == ""){

                    }else{
                        $.ajax({
                            url: '../controller/RoleController.php?a=pesq',
                            data: {codigo: codigo},
                            type: 'POST',
                            dataType: 'json',

                            beforeSend: function (){
                                //inicial modal
                                //$('#load').show();
                            },
                            complete: function (){
                                //finaliza modal
                               // $('#load').hide();
                            },

                            success: function(retorno){
                                if(retorno == ''){
                                    alert('codigo nao cadastrado');
                                }else{
                                    console.log(retorno);
                                   // $("#nomeajax").val(retorno.nome); //indivual
                                    $("#selectajax option").remove();

                                    $.each(retorno, function (i, item) {
                                        $('#selectajax').append($('<option>', {
                                            value: item.id,
                                            text : item.nome
                                        }));
                                    });
                                }

                            },
                            error: function(){
                                alert("codigo nao cadastrado")
                            }
                        })
                    }

                })
            })
        </script>

    </body>
</html>