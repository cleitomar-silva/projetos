<?php
include 'header.php';
include_once 'model/TopCifras.php';
include_once 'model/Noticias.php';
include_once 'model/Videos.php';
?>
        <!-- start navbar -->
        <nav class="cl-navbar">    
            <a href="index.php" class="cl-navbar-brand"> <i class="fas fa-guitar"></i> </a>
            <ul>
                <li><a href="#listas">Top</a></li>
                <li><a href="#aprenda">Aprenda</a></li>               
                <li><a href="#enviar-cifra">Notícias</a></li>
                <li><a href="#">Mais</a></li>
                
                <li class="cl-barra-vertical"><a  href="login.php">Entrar</a></li>
            </ul>
            <button class="cl-navbar-toggler">
                <span></span>
            </button> 
        </nav>
        <!-- end navbar -->
            

        <header class="cl-intro"></header>
        
        
        <section id="listas" class="cl-container container" style="height:auto;"> 
            <div class="cl-footer-container">
                <h4 class="mb-4 mt-4">Mais acessados</h4>
                <div class="row">

                    <?php foreach (TopCifras::listData() as $key => $top ):?>
                        <div class="col col-lg-3 col-12">
                            <a href="" class="cl-a-container">
                                <div class="row cl-borda-mais-acessados">
                                    <div class="col col-lg-3 col-2">
                                        <span class="cl-number"><?php echo $key+1; ?></span>
                                    </div>
                                    <div class="col col-lg-9 col-sm-10 cl-p-12">
                                        <strong><?php echo $top['musica']?></strong>
                                        <p class="cl-desc-acessados"><?php echo $top['artista']?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;?>



                </div>
                <div class="row">
                    <div class="col col-lg-12 col-12" style="background:#cecece; height: 100px">

                    </div>
                </div>
            </div>
        </section>
        

        <section id="aprenda" class="cl-container container" style="height:auto;"> 
            <div class="cl-footer-container ">
                <h4 class="mb-4 mt-4">Vídeos</h4>
                <div class="row">
                    <?php foreach (Videos::listVideos() as $videos): ?>
                        <div class="col col-lg-4 col-12">
                            <a href="" class="cl-container-img">
                                <aside>
                                    <iframe class="video-lateral" width="371px" height="300px"  src="https://www.youtube.com/embed/<?php echo $videos['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </aside>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>

        <section id="enviar-cifra" class="cl-container container" style="height:auto;">     
            <div class="cl-footer-container">
                <h4 class="mb-4 mt-4">Notícias e Dicas</h4>

                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <?php foreach (Noticias::listNoticias() as $noticias):?>
                            <div class="swiper-slide"><img  src="upload/<?php echo $noticias['imagem']?>" style="width: auto; height: 300px;" alt=""></div>
                        <?php endforeach;?>

                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        
    <?php include 'footer.php' ?>