<!DOCTYPE html>
<html>
    <head>
        <title>Novo</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>


        <div class="container mt-5">
            <div class="row">
                <div class="col col-lg-6">
                    <h3>Incluir</h3>
                    <hr>
                    <!--<form method="post" action="../controller/RoleController.php?a=incl">-->
                    <form id="form1">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o Nome" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/jquery.js"></script>
        <script>
            $('#form1').submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: '../controller/RoleController.php?a=incl',
                    method: 'POST',
                    data: {nome: nome},
                    dataType: 'json'
                }).done(function(result){
                    $('#nome').val('');
                    console.log(result);
                   // getComments();
                });
            });
        </script>

    </body>
</html>
