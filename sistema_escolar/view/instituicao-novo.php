<?php
session_start();
include "header.php";
?>

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Incluir nova Instituição
        </div>
        <div class="card-body">

            <form method="post" action="../controller/instituicaoController.php?a=novo">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nome" placeholder="Nome da instituição" required>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>


</div>



<?php
include "footer.php";
?>
