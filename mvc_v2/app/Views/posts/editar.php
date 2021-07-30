<?php include_once '../app/Views/header.php';?>

<div class="col-md-8 col-md-6 mx-auto p-5">
    <?php  Sessao::mensagem('post')?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Alterar </li>
        </ol>
    </nav>
    <div class="card" >
        <div class="card-header bg-secondary text-white">Alterar posts</div>
        <div class="card-body">

            <form  method="post" action="<?php echo URL?>/posts/editar/<?php echo $dados['id']?>">
                <input type="hidden" name="id" value="<?php echo $dados['id']?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo: <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control <?php echo isset($dados['titulo_erro']) ? 'is-invalid' : ''  ?> " id="titulo" name="titulo" value="<?php echo $dados['titulo']?>" >
                    <div class="invalid-feedback">
                        <?php echo isset($dados['titulo_erro']) ? $dados['titulo_erro'] : ''; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="texto" class="form-label">Texto: <sup class="text-danger">*</sup></label>
                    <textarea type="text" class="form-control" id="texto" name="texto" required>
                        <?php echo $dados['texto']?>
                    </textarea>
                </div>

                <input type="submit" value="Atualizar" class="btn btn-info btn-block text-white">


            </form>
        </div>
    </div>
</div>
<?php include_once '../app/Views/footer.php';?>

