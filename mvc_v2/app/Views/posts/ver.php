<?php include_once '../app/Views/header.php';?>

<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver</li>
        </ol>
    </nav>
    <div class="card my-5">
        <div class="card-header">
            <?php echo $dados['post']->titulo ?>
        </div>
        <div class="card-body">

            <p class="card-text"><?php echo $dados['post']->texto ?></p>

        </div>
        <div class="card-footer text-muted">
            <a href="<?php echo URL?>/posts/editar/<?php echo $dados['post']->id?>" class="btn btn-outline-success float-start">Editar</a>
        </div>
    </div>
</div>

<?php include_once '../app/Views/footer.php';?>
