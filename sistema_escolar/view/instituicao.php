<?php
include_once 'header.php';
include_once '../model/Instituicao.php';
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Instituições</h1>
    <a href="instituicao-novo.php">
        <button type="button" class="btn btn-primary">Novo</button>
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Todas as Instituições</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach (Instituicao::listarCursos() as $row): ?>
                        <tr>
                            <td class="js"><?php echo $row['nome']?></td>
                            <td>
                                <a href="instituicao-editar.php?id=<?php echo $row['id']?>">  <i class="fas fa-pencil-alt"></i></a>
                                &nbsp &nbsp
                                <a href="../controller/instituicaoController.php?a=excluir&id=<?php echo $row['id']?>" onclick="return confirm('Confirmar Exclusão')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include_once 'footer.php'?>

