<?php
include_once 'header.php';
include_once 'model/TopCifras.php';
$codigo = TopCifras::searchId($_GET['id']);
?>



<!-- start navbar -->
<nav class="cl-navbar">
    <a href="index.php" class="cl-navbar-brand"> <i class="fas fa-guitar"></i> </a>
    <ul>
        <li><a href="#listas">Top</a></li>
        <li><a href="#aprenda">Aprenda</a></li>
        <li><a href="#enviar-cifra">Notícias</a></li>
        <li><a href="index.php">Principal</a></li>
    </ul>
    <button class="cl-navbar-toggler">
        <span></span>
    </button>
</nav>
<!-- end navbar -->

<section class="container pt-4"  style="height: 50vh;">
    <h3 class="mb-4">Alteração</h3>
    <form action="controller/TopController.php?a=edit" method="post">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="hidden" name="id" class="form-control" id="inputEmail3" placeholder="id" value="<?php echo $codigo['id'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Musica</label>
            <div class="col-sm-10">
                <input type="text" name="musica" class="form-control" id="inputEmail3" placeholder="Musica" value="<?php echo $codigo['musica'] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Artista</label>
            <div class="col-sm-10">
                <input type="text" name="artista" class="form-control" id="inputPassword3" value="<?php echo $codigo['artista'] ?>" placeholder="Artista" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Enviar</button>
            </div>
        </div>
    </form>
</section>

<?php
include_once 'footer.php'
?>
