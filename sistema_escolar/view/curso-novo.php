<?php
session_start();
include "../model/Categorias.php";
include "header.php";
?>

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Incluir novo Curso
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
            <form method="post" action="../controller/cursoController.php?a=novo">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nome" placeholder="Nome do curso" required>
                </div>
                <div class="form-group">
                    <select class="form-control form-control-lg" name="categoria">
                        <option >Selecione uma categoria</option>
                        <?php foreach (Categorias::listarCategoria() as $row):?>
                            <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>


</div>



<?php
include "footer.php";
?>
