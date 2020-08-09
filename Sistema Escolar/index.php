<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Escolar</title>
    <link rel="shortcut icon" href="img/Student.png">
    <link rel="stylesheet" href="css/estilo.css">
    <?php include "conexao.php"?>
</head>
<body>

    <div id="logo">
        <img src="img/logo.png">
    </div>
    <div id="caixa-login">
        <?php
            if(isset($_POST['button'])){
                $code = $_POST['code'];
                $password = $_POST['password'];

                if($code == ''){
                    echo "<h2>Por favor, digite o numero do cartao ou código</h2>";
                }
                else if($password == ''){
                    echo "<h2>Por favor, digite sua senha</h2>";
                }
                else{
                    $sql = mysqli_query($conexao,"select * from login where code ='$code' and senha = '$password'");
                    if(mysqli_num_rows($sql) > 0 ){

                        while($res_1 = mysqli_fetch_assoc($sql) ){
                           $status = $res_1['status'];
                           $code = $res_1['code'];
                           $senha = $res_1['senha'];
                           $nome = $res_1['nome'];
                           $painel = $res_1['painel'];

                           if($status == 'Inativo'){
                               echo "<h2> Voce esta Inativo, procure a administracao </h2>";
                           }else{
                               session_start();
                               $_SESSION['code'] = $code;
                               $_SESSION['nome'] = $nome;
                               $_SESSION['senha'] = $senha;
                               $_SESSION['painel'] = $painel;

                               if($painel == 'Admin'){
                                   header("Location: admin/admin");
                               }
                               else if($painel == 'Aluno'){
                                   header("Location: aluno/aluno.php");
                               }
                           }

                        }

                    }else{
                        echo "<h2>Dados Incorretos!</h2>";
                    }
                }
            }
        ?>

        <form action="" name="form" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><h1>Nº Cartão ou Código de acesso:</h1></td>
                </tr>
                <tr>
                    <td><input type="text" name="code"></td>
                </tr>
                <tr>
                    <td><h1>Senha:</h1></td>
                </tr>
                <tr>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input class="input" type="submit" name="button" value="Entrar"></td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>