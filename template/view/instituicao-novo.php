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
            <?php
            if(isset($_SESSION['msg-error']))
            {
                echo "<p class = 'text-center alert alert-danger'>{$_SESSION['msg-error']}</p>";
                session_unset();
            }
            if(isset($_SESSION['msg-sucess']))
            {
                echo "<p class = 'text-center alert  alert-success'>{$_SESSION['msg-sucess']}</p>";
                session_unset();
            }
            ?>
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
