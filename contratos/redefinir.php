<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap5.css">


    <script src="js/bootstrap5.js"></script>
    <script src="js/jquery.js"></script>


    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background: rgb(219,226,226);
        }
        .black-white-redef
        {
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
            border-radius: 0 30px 30px 0;
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px grey;
        }
        .btn1{
            border: none;
            outline: none;
            /* height: 50px;*/
            width: 100%;
            /* background-color: black; */
            /*  color: white;*/
            border-radius: 2px;
            font-weight: bold;
        }
        .btn1:hover{
            background: white;
            border: 1px solid;
            color: #1a1e21;
        }

    </style>
</head>
<body>

<section class="Form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-lg-7 px-5 pt-5">
                <h1 class="fw-bold py-3">Redefinir senha</h1>
                <h4>Sistema de contratos</h4>
                <form action="">
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Nova senha" class="form-control my-3 p-4 " autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Confirmar senha" class="form-control my-3 p-4 " autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="submit" placeholder="***********" class="btn1 btn-dark my-3 p-4" value="Entrar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 ">
                <img src="img/contrato3.png" alt="" class="img-fluid black-white-redef ">
            </div>
        </div>
    </div>
</section>

</body>
</html>