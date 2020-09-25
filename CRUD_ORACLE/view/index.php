<?php
    include_once "../model/Cliente.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar</h1>
    <table style="width: 100%;">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Ações</td>
            </tr>            
        </thead>
        <tbody>
            <?php foreach(Cliente::index() as $row): ?>
                <tr>
                    <td><?php echo $row['ID']?></td>
                    <td><?php echo $row['NOME']?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['ID']?>">Editar</a>
                        <a href="../controller/ClienteController.php?a=destroy&id=<?php echo $row['ID']?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <hr>
    <a href="novo.php">Novo</a>
</body>
</html>