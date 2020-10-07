<?php
session_start();
include_once 'header.php';
include_once 'model/TopCifras.php';
include_once 'model/Noticias.php';
include_once 'model/Videos.php';

include_once'protect.php';
protect();

if(isset($_SESSION['msg-error'])): ?>

    <script> error(); // js/sweetalert.js  </script>

    <?php unset($_SESSION['msg-error']);
endif;

if(isset($_SESSION['msg-sucesso'])) : ?>

    <script> salvo();  // js/sweetalert.js </script>

    <?php unset($_SESSION['msg-sucesso']);
endif;
?>

<!-- start navbar -->
<nav class="cl-navbar">
    <a href="index.php" class="cl-navbar-brand"> <i class="fas fa-guitar"></i> </a>
    <ul>
        <li><a href="#listas">Top</a></li>
        <li><a href="#videos">Vídeos</a></li>
        <li><a href="#noticias">Notícias</a></li>
        <li><a href="sair.php">Sair</a></li>
    </ul>
    <button class="cl-navbar-toggler">
        <span></span>
    </button>
</nav>
<!-- end navbar -->

<section class="container pt-4" id="listas">
    <h3 class="mb-4">Top 15</h3>
    <form action="controller/TopController.php?a=incl" method="post">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Musica</label>
            <div class="col-sm-10">
                <input type="text" name="musica" class="form-control" id="inputEmail3" placeholder="Musica" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Artista</label>
            <div class="col-sm-10">
                <input type="text" name="artista" class="form-control" id="inputPassword3" placeholder="Artista" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Enviar</button>
            </div>
        </div>
    </form>

</section>

<section class="container mt-5 mb-5">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">Musica</th>
            <th scope="col">Artista</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (TopCifras::listData() as $key => $top ):?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $top['musica'] ?></td>
                <td><?php echo $top['artista'] ?></td>
                <td>
                    <a onclick="confirmarExclusao('controller/TopController.php?a=del&id=',<?php echo $top['id'];?>)" class="mr-3 text-danger"><i class="far fa-trash-alt"></i></a>
                    <a href="edit.php?id=<?php echo $top['id'] ?>" class="text-info"><i class="far fa-edit"></i></a>
                </td>
            </tr>
       <?php endforeach; ?>
        </tbody>
    </table>
</section>


<section class="container mb-5" id="videos">
    <h3 class="mb-4"> Vídeos </h3>
    <form action="controller/VideosController.php?a=inclu" method="post">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">ID do Vídeo</label>
            <div class="col-sm-10">
                <input type="text" name="video" class="form-control" id="inputEmail3" placeholder="insira o ID do vídeo" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Enviar</button>
            </div>
        </div>
    </form>
</section>

<section class="container">
    <div class="row">

        <?php foreach (Videos::listVideos() as $videos): ?>
            <div class="col col-lg-4 col-12">
                <a href="" class="cl-container-img">
                    <aside class="card">
                        <iframe class="video-lateral" width="371px" height="300px"  src="https://www.youtube.com/embed/<?php echo $videos['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <a onclick="confirmarExclusao('controller/VideosController.php?a=del&id=', <?php echo $videos['id']?>)" class="card-link text-danger">Excluir</a>
                        </div>
                    </aside>
                </a>
            </div>
        <?php endforeach;?>

    </div>
</section>




<section class="container mt-5 mb-5" id="noticias" >
    <h3 class="mb-4 ">Notícias</h3>
    <form method="post" action="controller/NoticiasController.php?a=inclu" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Enviar Imagem</label>
            <input type="file" class="form-control-file" name="arquivo" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Enviar</button>
            </div>
        </div>
    </form>
    <?php
    if(isset($_SESSION['msg-success'])){
        echo "<p class='text-center  alert  alert-success'>{$_SESSION['msg-success']}<p>";
        unset($_SESSION['msg-success']);
    }
    if(isset($_SESSION['msg-danger'])){
        echo "<p class='text-center  alert  alert-danger'>{$_SESSION['msg-danger']}<p>";
        unset($_SESSION['msg-danger']);
    }
    ?>
</section>

<section class="container mb-5">
    <div class="row">
        <?php foreach (Noticias::listNoticias() as $item): ?>

            <div class="col col-lg-3 col-12 mb-4">
                <div class="card">
                    <img class="card-img-top" src="upload/<?php echo $item['imagem'];?>" alt="Card image cap">

                    <div class="card-body">
                        <a onclick="confirmarExclusao('controller/NoticiasController.php?a=del&id=', <?php echo $item['id']?>)" class="card-link text-danger">Excluir</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>



<?php
include_once 'footer.php'
?>
