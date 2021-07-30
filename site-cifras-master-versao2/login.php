<?php
session_start();
include_once "header.php";
?>




<h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div  class="col-md-12">
                <!-- Login -->
                    <form id="login" class="form mb-5" action="controller/LoginController.php?a=acesso" method="post">
                        <h3 class="text-center text-info">Acesso</h3>
                        <div class="form-group">
                            <label  class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control" required >
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md"  value="Entrar">
                        </div>

                        <div class="text-right" id="btn-registrar">
                            <a href="index.php" class="text-secondary mr-5">Cancelar</a>
                            <a href="#" class="text-info">Registrar</a>
                        </div>
                    </form>


                    <!-- Cadastro Login -->
                    <form id="cad-login" class="form mb-5" action="controller/LoginController.php?a=inclu" method="post" style="display: none;">
                        <h3 class="text-center text-info">Cadastro</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Nome:</label><br>
                            <input type="text" name="nome" id="nome-form-cad" class="form-control" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email-form-cad" class="form-control" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha-form-cad" class="form-control" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Cadastrar">
                        </div>
                        <div class="text-right" id="btn-login">
                            <a href="#" class="text-info">Login</a>
                        </div>
                    </form>

                    <?php
                        if(isset($_SESSION['msg-error-cad']))
                        {
                            echo "<p class = 'text-center alert alert-danger'>{$_SESSION['msg-error-cad']}</p>";
                            session_unset();
                        }
                        if(isset($_SESSION['msg-cad-sucess']))
                        {
                            echo "<p class = 'text-center alert  alert-success'>{$_SESSION['msg-cad-sucess']}</p>";
                            session_unset();
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>




<?php include_once "footer.php";  ?>
