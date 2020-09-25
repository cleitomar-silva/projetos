<?php
    include_once '../model/Cliente.php';
    $all = Cliente::show($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method="POST" action="../controller/ClienteController.php?a=update">
            <input type="hidden" name="id" value="<?php  echo $all['ID']?>">
            <input type="text" name="nome" value="<?php  echo $all['NOME']?>">
            <input type="submit">
        </form>
</body>
</html>