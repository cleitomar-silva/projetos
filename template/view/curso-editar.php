<?php
session_start();
include "../model/Cursos.php";
include "../model/Categorias.php";
include "header.php";
$curso = Cursos::pesquisarID($_GET['id']);
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Alterar Registro
        </div>
        <div class="card-body">
            <form method="post" action="../controller/cursoController.php?a=editar">
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" name="id" value="<?php echo $curso['id']?>">

                    <input type="text" class="form-control form-control-lg" name="nome" value="<?php echo $curso['nome']?>" placeholder="Nome do curso" required>
                </div>
                <div class="form-group">
                    <select class="form-control form-control-lg" name="categoria">
                        <option value="<?php echo $curso['categoria_id']?>"><?php echo $curso['categoria']?></option>
                        <option></option>

                        <?php foreach (Categorias::listarCategoria() as $row):?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nome']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php
                if(isset($_SESSION['msg-danger'])){
                    echo "<p class='text-center  alert  alert-danger'>{$_SESSION['msg-danger']}<p>";
                    unset($_SESSION['msg-danger']);
                }
                ?>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>



<?php
include "footer.php";
?>
