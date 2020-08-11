<?php
    include_once '../model/RolesGive.php';
    $rol = RolesGive::searchId($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col col-lg-6">
            <h3>Editar</h3>
            <hr>
            <form method="post" action="../controller/RoleController.php?a=edit">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $rol[0] ?>" >
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $rol[1]?>" placeholder="Digite o Nome" required>
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
