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
    <span id="msg"></span>
    <form id="add-aula" method="POST">
        <div id="formulario">
            <div class="form-group">
                <label>Aula:</label>
                <input type="text" name="titulo[]" placeholder="Nome da aula">
                <button type="button" id="add-campo"> + </button>
            </div>           
        </div>
        <div class="form-group">
            <input type="button" value="Cadastrar" id="cad-aula">
        </div>
    </form>

    <script src="js/jquery.js"></script>
    <script>
        var cont = 1

        //Adicinar campo
        $( "#add-campo" ).click(function() {

            cont++

            $( "#formulario" ).append( `<div class="form-group" id="campo`+ cont +`">
                                            <label>Aula: </label>
                                            <input type="text" name="titulo[]" placeholder="Nome da aula"> 
                                            <button type="button" id="`+ cont +`" class="btn-apagar"> - </button>
                                        </div>`)
        });

        //Remover campo
        $("form").on("click", ".btn-apagar", function(){
            var button_id =  $(this).attr("id")
            $('#campo'+ button_id +'').remove()

        })


        /* ---------------------------------------------------------------------------------
            Cadastrar
           ---------------------------------------------------------------------------------
        */
        
        $("#cad-aula").click(function(){
            //Receber os dados do formulario
            var dados = $("#add-aula").serialize();

            //enviar e retorna
            $.post( "insert.php", dados, function( retorna ) {
                $( "#msg" ).slideDown('slow').html( retorna ); // retorna a msg
                $('#add-aula')[0].reset();                     // limpa o form
                retirarMsg();                                  // retira a msg
            });
        })

        //retirar a mensagem apos 1700 milissegundos
        function retirarMsg(){
            setTimeout(function(){
                $("#msg").slideUp('slow', function(){})
            }, 1700)
        }

        

    </script>
</body>
</html>