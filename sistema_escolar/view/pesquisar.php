<?php
include_once "header.php";
include "../model/Cursos.php";


?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pesquisa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <p>Resultado para a busca: <span class="m-0 font-weight-bold text-primary display-5"><?php echo $_POST['pesquisar'];?></span></p>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach (Cursos::buscarCurso($_POST['pesquisar']) as $row): ?>
                        <tr>
                            <td class="js"><?php echo $row[1]?></td>
                            <td class="js"><?php echo $row[3]?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php include_once "footer.php"?>
