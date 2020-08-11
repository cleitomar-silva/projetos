<?php
//include '../model/Connection.php';
include "../model/Categorias.php";
include "header.php";
?>

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Incluir novo Curso
        </div>
        <div class="card-body">
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
