<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<link rel="stylesheet" href="Styles/carousel.css" type="text/css" media="screen">
<!--<link rel="stylesheet" href="Styles/slide.css" type="text/css" media="screen"> -->


<script type="text/javascript" src="carousel.js"></script>

</head>
<body>
<!-- DATOS -->
<?php
  $peliculas = array(
                "http://i422.photobucket.com/albums/pp301/siltorralba/carteles%20cine/22.jpg",
                "https://http2.mlstatic.com/afiches-poster-cine-42x30cm-todas-las-peliculas-D_NQ_NP_8870-MLA20009194697_112013-F.jpg",
                "https://http2.mlstatic.com/afiches-poster-cine-42x30cm-todas-las-peliculas-D_NQ_NP_8878-MLA20009194705_112013-F.jpg",
                "https://http2.mlstatic.com/afiches-peliculas-posters-D_NQ_NP_765611-MLC20577472976_022016-F.jpg",
                "http://www.todocuadros.com/imagenes/posters/peliculas/e-t.jpg",
                "http://mexablog.com/wp-content/uploads/2010/10/tron_legacy_final_poster_hires_01.jpg",
                "https://s-media-cache-ak0.pinimg.com/736x/2b/ab/32/2bab32dd5c2447b7028e4f67e88e2ff5.jpg",
                "https://k60.kn3.net/taringa/C/C/8/C/4/2/supermachote2/260.jpg",
                "http://cdn23.paredro.com/wp-content/uploads/2013/10/ai_artificial_intelligence.jpg",
                "https://gcdn.emol.cl/los-80/files/2016/11/Poster-poltergeist-pelicula.jpg",
                "https://http2.mlstatic.com/poster-las-peliculas-D_NQ_NP_8836-MLA20009194688_112013-F.jpg",
                "http://es.web.img3.acsta.net/r_1280_720/medias/nmedia/18/70/48/56/20079653.jpg",
                "http://img.aullidos.com/imagenes/guardianes-galaxia/imagen-10.jpg",
                "http://k43.kn3.net/26A9F5670.jpg",
                "http://www.freemovieposters.net/posters/matrix_the_1999_3131_poster.jpg"
                );
?>

<?php include "paginas/nav_top.php" ?>


<!--<div class="contain">
  <div class="row">
    <div class="row__inner">

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="https://k60.kn3.net/taringa/C/C/8/C/4/2/supermachote2/260.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="https://k60.kn3.net/taringa/4/E/9/E/0/6/supermachote2/455.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="hhttp://pics.filmaffinity.com/deadpool-834516798-large.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

      <div class="tile">
        <div class="tile__media">
          <img class="tile__img" src="http://es.web.img3.acsta.net/pictures/17/01/09/09/56/256507.jpg" alt=""  />
        </div>
        <div class="tile__details">
          <div class="tile__title">
            Nombre
          </div>
        </div>
      </div>

    </div>
  </div>-->
<div class="container">
    <div class="col-md-12">
         <h1>Peliculas</h1>

        <div class="well">
            <div id="myCarousel" class="carousel slide">
              
                <!-- Carousel items -->
                <div class="carousel-inner">

                      <?php for ($i=0; $i <3 ; $i++) { ?> 
                        <div class="item <?php if($i == 0) { echo "active";} ?> ">
                          <div class="row">
                              <div class="col-md-1"></div>
                              <?php for ($p=0; $p < 5 ; $p++) { ?>
                              <div class="col-sm-2"><a href="#x"><img src=<?php echo $peliculas[($i*5)+$p] ?> alt="Image" class="img-responsive img-rounded" ></a>
                              </div>
                              <?php } ?>
                          </div><!--/row-->
                        </div>
                      <?php } ?>
                    <!--/item-->
                </div>
                <!--/carousel-inner--> <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>

                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
            <!--/myCarousel-->
        </div>
        <!--/well-->
    </div>
</div>


<?php include "paginas/pelicula.php" ?>
</body>
</html>