<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add campos</title>
    <style>
        .form-group{
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Adicionar campo</h1>
    <form>
        <div id="formulario">
            <div class="form-group">
                <label>Aula:</label>
                <input type="text" name="titulo[1]" placeholder="Nome da aula">
                <button type="button" id="add-campo"> + </button>
            </div>           
        </div>
        <div class="form-group">
            <input type="button" value="Cadastrar">
        </div>
    </form>

    <script src="js/jquery.js"></script>
    <script>
        var cont = 1

        $( "#add-campo" ).click(function() {

            cont++

            $( "#formulario" ).append( `<div class="form-group" id="campo`+ cont +`">
                                            <label>Aula: </label>
                                            <input type="text" name="titulo[`+ cont +`]" placeholder="Nome da aula"> 
                                            <button type="button" id="`+ cont +`" class="btn-apagar"> - </button>
                                        </div>`)
        });


        $("form").on("click", ".btn-apagar", function(){
            var button_id =  $(this).attr("id")
            $('#campo'+ button_id +'').remove()

        })
    </script>
</body>
</html>