
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Listar sob demanda</title>

</head>
<body>

    <header>
        <div class="center">
            <h1>Carregando comentários sob demanda:</h1>
        </div>
    </header>
    <div class="center">

        <table width="100%">
            <thead>
                <tr>
                    <td>id</td>
                    <td>nome</td>
                    <td>Comentário</td>
                </tr>
            </thead>
            <tbody id="tbody_table">

            </tbody>
        </table>

        <div class="spinner" id="spinner">
            <img src="assets/imgs/spinner.gif"/>
        </div>
        <div class="btn">
            <button id="loadComments">Carregar Mais</button>
        </div>
    </div>


    <script src="assets/js/jQuery/jquery-3.5.1.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>
