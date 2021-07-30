<?php include_once '../app/Views/header.php';?>

<div class="container py-5">
    <?php  Sessao::mensagem('post')?>
    <?php  Sessao::mensagem('post_excluido')?>
    <div class="card">
        <div class="card-header">
            Postagens
            <div class="float-end">
                <a href="<?php echo URL?>/posts/cadastrar" class="btn btn-primary">Escrever</a>
            </div>
        </div>
        <div class="card-body">
            <?php  foreach($dados['posts'] as $post): ?>

                <div class="card my-5">
                    <div class="card-header">
                        <?php echo $post->titulo ?>
                    </div>
                    <div class="card-body">

                        <p class="card-text"><?php echo $post->texto ?></p>
                        <a href="<?php echo URL?>/posts/ver/<?php echo $post->idPost?>" class="btn btn-outline-primary float-end">Ler mais</a>
                        <a href="<?php echo URL?>/posts/excluir/<?php echo $post->idPost?>" class="btn btn-outline-danger float-end">Excluir</a>

                    </div>
                    <div class="card-footer text-muted">
                        Escrito por <?php echo $post->nome?> Em <?php echo date("d/m/Y H:i:s", strtotime($post->criado_em))?>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include_once '../app/Views/footer.php';?>
