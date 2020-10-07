    <footer id="footer"   style="height: auto" >
        <div class="container">
            <div class="cl-footer-container">
                <div class="cl-footer-conteudo">
                    <p>Todo os artistas</p>
                    <ul>
                        <li><a href="">A</a></li>
                        <li><a href="">B</a></li>
                        <li><a href="">C</a></li>
                        <li><a href="">D</a></li>
                        <li><a href="">E</a></li>
                        <li><a href="">F</a></li>
                        <li><a href="">G</a></li>
                        <li><a href="">H</a></li>
                        <li><a href="">I</a></li>
                        <li><a href="">J</a></li>
                        <li><a href="">K</a></li>
                        <li><a href="">L</a></li>
                        <li><a href="">M</a></li>
                        <li><a href="">N</a></li>
                        <li><a href="">O</a></li>
                        <li><a href="">P</a></li>
                        <li><a href="">Q</a></li>
                        <li><a href="">R</a></li>
                        <li><a href="">S</a></li>
                        <li><a href="">T</a></li>
                        <li><a href="">U</a></li>
                        <li><a href="">V</a></li>
                        <li><a href="">W</a></li>
                        <li><a href="">X</a></li>
                        <li><a href="">Y</a></li>
                        <li><a href="">Z</a></li>
                        <li><a href="">0/9</a></li>    
                    </ul>
                </div>
                <hr>            
                <div class="row mt-4">
                    <div class="col-lg-2 col-6">
                        <h3>Músicas</h3>
                        <ul>
                            <li><a href="">Top músicas e artistas</a></li>
                            <li><a href="">Novidades</a></li>
                            <li><a href="">Vídeos</a></li>
                        </ul>
                                                                    
                    </div>
                    <div class="col-lg-2 col-6">
                        <h3>Aprenda</h3>
                        <ul>
                            <li><a href="">Como tocar violão</a></li>
                            <li><a href="">Afinador</a></li>
                            <li><a href="">Dicionário de acordes</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-6">
                        <h3>Participe</h3>
                        <ul>
                            <li><a href="">Crie sua conta grátis</a></li>
                            <li><a href="">Envie cifras</a></li>
                            <li><a href="">Peça cifras</a></li>
                        </ul> 
                    </div>
                    <div class="col-lg-2 col-6">
                        <h3>Assine</h3>
                        <ul>
                            <li><a href="">Cifra Club Pro</a></li>
                            <li><a href="">Youtube Membros</a></li>                        
                        </ul> 
                    </div>
                    <div class="col-lg-2 col-6">
                        <h3>Sobre o site</h3>
                        <ul>
                            <li><a href="">Aviso Legal</a></li>
                            <li><a href="">Contato</a></li>
                            <li><a href="">Anuncie no Cifra Club</a></li>
                        </ul> 
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <h3>Aplicativos</h3>

                        <button class="cl-btn">
                            <i class="fab fa-apple cl-f-25 cl-pr-5"></i> 
                            App Store
                        </button>
                        <button class="cl-btn">
                            <i class="fab fa-google-play cl-f-25 cl-pr-5"></i>
                            Google Play
                        </button>
                        <button class="cl-btn">
                            <i class="fab fa-microsoft cl-f-25 cl-pr-5"></i> 
                            Microsoft
                        </button>

                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>Siga-nos</h3>
                        <button class="cl-btn cl-vermelho">
                            <i class="fab fa-youtube cl-f-25 cl-pr-5"></i> 
                            Youtube
                        </button>
                        <button class="cl-btn cl-azul">
                            <i class="fab fa-facebook-square cl-f-25 cl-pr-5"></i>
                            Facebook
                        </button>                    
                        <button class="cl-btn cl-gray">
                            <i class="fab fa-instagram cl-f-25 cl-pr-5"></i> 
                            Instagram
                        </button>
                        <button class="cl-btn cl-ceu">
                            <i class="fab fa-twitter cl-f-25 cl-pr-5"></i>
                            Twitter
                        </button>
                        
                    </div>
                </div>



            </div>
        
            <h2></h2>
        </div>       
    </footer>

    
    <!-- menu -->
    <script src="js/main.js"></script>
    <!-- rolagem de página -->
    <script src="js/scroll.js"></script>
    <!-- Login/Cadastro de Login -->
    <script src="js/login.js"></script>

    <!-- Swiper JS -->
    <script src="js/swiper.js"></script>  

    <script>
    var swiper = new Swiper('.swiper-container', {
      //slidesPerView: 3,
      //spaceBetween: 30,
      slidesPerGroup: 1,
      // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            0: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            // when window width is >= 600px
            768: {
            slidesPerView: 2,
            spaceBetween: 30
            },
            // when window width is >= 640px
            1200: {
            slidesPerView: 3,
            spaceBetween: 40
            }
        },
      
        autoplay: {
        delay: 3000,
      },     
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },    

    });
  </script>





    </body>
</html>
