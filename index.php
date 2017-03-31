<!DOCTYPE html>
<html>
<head>
<?php include "paginas/header.php" ?>

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
  $paginas = 3;
?>

<?php include "paginas/nav_top.php" ;

if(isset($_GET["search"]))
{
	print_r($_GET["search"]);
	$busqueda = $_GET["search"];
}
?>

<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
         <h1>Peliculas</h1>

        <div class="well">
 
              
                      <?php for ($i=0; $i <$paginas ; $i++) { ?> 
                        <div class="item <?php if($i == 0) { echo "active";} ?> " id=<?php echo "item".$i ?> >
                          <div class="row">
                              
                              <?php for ($p=0; $p < 4 ; $p++) { ?>
                              <div class="col-sm-3 col-md-3"><a href="paginas/pelicula.php"><img src=<?php echo $peliculas[($i*5)+$p] ?> alt="Image" class="img-responsive img-rounded" ></a>
                              </div>
                              <?php } ?>
                          </div><!--/row-->
                        </div>
                      <?php } ?>
        </div>
        <!--/well-->
    </div>
    <div class="col-md-4 col-md-offset-4">
      <nav aria-label="Page navigation">
      <ul class="pagination  pagination-lg">
        <li>
          <a href="#myCarousel" data-slide="prev" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for ($l=0; $l < $paginas ; $l++) { ?>
          <li>
	          <form action="index.php" method="GET">
	          <a href="#" name="page"><?php echo $l+1 ?></a>
	          </form>
          </li>
        <?php } ?>
        <li>
          <a href="#myCarousel" data-slide="next" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
      </nav>
    </div>
</div>

</body>
</html>