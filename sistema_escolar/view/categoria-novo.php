<?php
include "header.php";
?>

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Incluir nova Categoria
        </div>
        <div class="card-body">
            <form method="post" action="../controller/categoriaController.php?a=novo">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nome" placeholder="Nome da categoria" required>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>


</div>



<?php
include "footer.php";
?>
