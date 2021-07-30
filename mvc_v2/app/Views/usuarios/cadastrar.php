<?php include_once '../app/Views/header.php';?>

<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card" >
        <div class="card-header bg-secondary text-white">Cadastre-se</div>
        <div class="card-body">

            <?php  Sessao::mensagem('usuario')?>

            <p class="card-text">Preencha o formulario abaixo para fazer seu cadastro</p>

            <form method="post" action="<?php echo URL?>/usuarios/cadastrar">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" class="form-control <?php echo isset($dados['email_erro']) ? 'is-invalid' : ''  ?> " id="email" name="email" required>
                    <div class="invalid-feedback">
                       <?php echo isset($dados['email_erro']) ? $dados['email_erro'] : ''; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control" id="enha" name="senha" required>
                </div>
                <div class="mb-3">
                    <label for="confirma_senha" class="form-label">Confirme a Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Cadastar" class="btn btn-info btn-block text-white">
                    </div>
                    <div class="col">
                        <a href="<?php echo URL?>/usuarios/login">Voce tem uma conta? Faça login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once '../app/Views/footer.php';?>

