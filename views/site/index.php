
<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'XX Congreso Colombiano de Matemáticas';

?>

<div class="site-index">

<!--     <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->

    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
    <!--imagenes-->
      <div id="reproImagen">
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item" align="center"><img src="../views/images/carousel/banner.png" alt="banner1" /></div>
            <div class="item" align="center"><img  src="../views/images/carousel/1.jpg" alt="banner2" /></div>
            <div class="item" align="center"><img  src="../views/images/carousel/3.jpg" alt="banner2" /></div>
            <div class="item" align="center"><img  src="../views/images/carousel/2.jpg" alt="banner3" /></div>
            <div class="item" align="center"><img  src="../views/images/carousel/4.jpg" alt="banner4" /></div>
            <div class="item" align="center"><img  src="../views/images/carousel/alojamiento.jpg" alt="banner5" /></div>
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
        <br><br><br>
      </div>
      <!--imagenes-->

      <!--Abre footer-->
    <div class="container marketing">
      <div class="row">
        <div class="col-lg-4">
            <div align="center"><img class="img-circle" src="../views/images/logo_scm.png" style="width: 140px; height: 140px;"></div><h4>Sociedad Colombiana de Matemáticas</h4>
            <p>El logotipo de la Sociedad Colombiana de Matemáticas fue diseñado por el maestro colombiano ANTONIO GRASS, conocido estudioso del arte pre-hispánico...</p>
            <div align="center"><p><a class="btn btn-default" href="http://www.scm.org.co/" role="button">Ver Más»</a></p></div>
        </div>
        
        <div class="col-lg-4">
          <div align="center"><img class="img-circle" src="../views/images/logo.jpg" style="width: 140px; height: 140px;"></div><h4>XX Congreso Colombiano de Matemáticas.</h4>
          <p>El evento espera contar con la presencia de conferencistas e investigadores nacionales e internacionales...</p>
          <div align="center"><p><a class="btn btn-default" href="http://www.xxcongresocolombianodematematicas.co/index.php/" role="button">Ver Más»</a></p></div>         
        </div> 
        
        <div class="col-lg-4">
          <div align="center"><img class="img-circle" src="../views/images/un.gif" style="width: 140px; height: 140px;"></div><h4>Universidad Nacional de Colombia Sede Manizales</h4>
          <p>Unversidad Nacional de Colombia una de las mejores 100 de latinoamérica...</p>
          <div align="center"><p><a class="btn btn-default" href="http://www.manizales.unal.edu.co/" role="button">Ver Más»</a></p></div>         
        </div> 

        <div class="col-lg-4">
          <div align="center"><img class="img-circle" src="../views/images/un.gif" style="width: 140px; height: 140px;"></div><h4>Facultad de Ciencias Exactas y Naturales</h4>
          <p>Universidad Nacional de Colombia Sede Manizales</p>
          <div align="center"><p><a class="btn btn-default" href="http://www.fcen.unal.edu.co/" role="button">Ver Más»</a></p></div>         
        </div> 
      </div><br><br>
    </div>
  <!--Cierra footer-->
</div>
