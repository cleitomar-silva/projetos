<?php
include_once "../model/Categorias.php";
include "header.php";
$categoria = Categorias::pesquisarID($_GET['id']);
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Alterar Categoria
        </div>
        <div class="card-body">
            <form method="post" action="../controller/categoriaController.php?a=editar">
                <div class="form-group">

                    <input type="hidden" class="form-control form-control-lg" name="id" value="<?php echo $categoria[0]?>">

                    <input type="text" class="form-control form-control-lg" name="nome" value="<?php echo $categoria[1]?>" placeholder="Nome da categoria" required>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>