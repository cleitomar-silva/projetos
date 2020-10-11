<?php
include_once "../model/Instituicao.php";
include "header.php";
$instituicao = Instituicao::pesquisarID($_GET['id']);
?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Alterar Categoria
            </div>
            <div class="card-body">
                <form method="post" action="../controller/instituicaoController.php?a=editar">
                    <div class="form-group">

                        <input type="hidden" class="form-control form-control-lg" name="id" value="<?php echo $instituicao['id']?>">

                        <input type="text" class="form-control form-control-lg" name="nome" value="<?php echo $instituicao['nome']?>" placeholder="Nome da categoria" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

<?php
include "footer.php";
?>