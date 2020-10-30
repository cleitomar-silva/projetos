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
        </div>
            
        <?php
        print_r(RolesGive::searchId(10));


        ?>
        <br>digitar valor do codigo
        <form id="form">
            <input type="text" name='id' id="id">
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