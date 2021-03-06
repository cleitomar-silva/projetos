<?php

include "../model/Cursos.php";
include "header.php";
?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cursos</h1>
        <a href="curso-novo.php">
            <button type="button" class="btn btn-primary">Novo</button>
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Todos os Cursos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="d-none" >Id</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Opções</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  foreach (Cursos::listarCursos() as $row): ?>
                                <tr>
                                    <td class="d-none" ><?php echo $row['id']?></td>
                                    <td><?php echo $row['nome']?></td>
                                    <td ><?php echo $row["categoria"]?></td>
                                    <td>
                                        <a href="curso-editar.php?id=<?php echo $row['id'] ?>">  <i class="fas fa-pencil-alt"></i></a>
                                        &nbsp &nbsp
                                        <a href="../controller/cursoController.php?a=excluir&id=<?php echo $row['id']?>" onclick="return confirm('Confirmar Exclusão')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



<?php
include "footer.php";
?>