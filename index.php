<!DOCTYPE html>
<html>
<head>
<base href="../PHP" />
<?php include "./paginas/header.php" ?>
<link rel="stylesheet" href="/php/Styles/estilos.css" type="text/css">
</head>
<body>

<?php

  /*  DATOS
  $peliculas --> contiene las peliculas
  $page --> contiene la pagina actual
  $order_nombre --> contiene el orden del nombre, defecto: "ASC";
  $order_anio --> contiene el orden del anio, defecto: "DESC";
  $nombre --> contiene el nombre de busqueda
  $anio --> contiene el año de busqueda
  $genero --> contiene el genero de busqueda
  $paginas --> contiene la cantidad de paginas totales para esa busqueda.
  */
  include "./paginas/getPeliculas.php" ;
  include "./paginas/nav_top.php" ;
?>
        
<div class="container-fluid fondo">

    <div class="col-md-12">
          <!-- MENU DE ORDENAMIENTO -->
          <div class="pull-right">
          <!-- DATOS PARA EL ENVIO DEL ORDENAMIENTO -->
          <form action="php/index.php" method="GET" name="order">
            <input type="hidden" name="nombre" value="<?php echo $nombre ?>" >
            <input type="hidden" name="genero" value="<?php echo $genero ?>" >
            <input type="hidden" name="anio" value="<?php echo $anio ?>" >
            <input type="hidden" name="order_anio" value="" > <!-- Se ponen en vacio para reiniciar el orden y solo se sobreescribe el que se solicita -->
            <input type="hidden" name="order_nombre" value="" >
            <input type="hidden" name="page" value="1" >
                      <h5>Ordenar por:</h5>
            <!-- BOTON DE ORDER_ANIO -->
            <div class="btn-group">
              <button type="button" class="btn btn-bc dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Año <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><button class="btn btn-link"  type="submit" name="order_anio" value="DESC">Más recientes</button></li>
                <li><button class="btn btn-link"  type="submit" name="order_anio" value="ASC">Más viejas</button></li>
              </ul>
            </div>
            <!-- BOTON DE ORDER_NOMBRE -->
            <div class="btn-group">
              <button type="button" class="btn btn-bc dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nombre <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><button href="#" class="btn btn-link" role="button" type="submit" name="order_nombre" value="ASC">Ascendente</button></li>
                <li><button href="#" class="btn btn-link" role="button" type="submit" name="order_nombre" value="DESC">Descendente</button></li>
              </ul>
            </div>
            </form>
         </div>
         <!-- FIN DE MENU DE ORDENAMIENTO -->
         <?php if ($nombre =="" && $anio == "" && $genero =="" )
         {
          echo "<h2>Últimas películas agregadas</h2><br>";
         }
         else
         {
          echo "<h2>Resultados de la búsqueda: </h2><br>";
         }?>

        <div class="well">
            <?php if(count($peliculas) > 0 )
            { ?>
                          <div class="row">
                            <div class="col-md-1 col-sm-1 col-xs-1"></div> 
                              <?php for ($p=0; $p < count($peliculas) ; $p++) { ?>
                              <div class="col-sm-12 col-md-2 col-xs-12 align-items-center poster">
                                  <a href="<?php echo 'php/paginas/pelicula.php?id='.$peliculas[$p]['id'] ?>">
                                    <img class="poster-img" src="data:<?php echo $peliculas[$p]['tipoimagen'].';base64, '.base64_encode($peliculas[$p]['contenidoimagen']); ?>" />
                                  </a>
                                  <div class="poster-info"> <!-- Clase de css creada por nosotros para representar los posters-->
                                    <div class="poster-titulo"><?php echo $peliculas[$p]['nombre'];?></div>
                                    <div class="poster-anio"><?php echo $peliculas[$p]['anio'];?></div>
                                    <div class="poster-anio"><?php echo $peliculas[$p]['genero'];?></div>
                                    <div class="poster-titulo">
                                      <?php for ($i=0; $i <ceil($peliculas[$p]['calificacion']) ; $i++) { ?>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                      <?php } ?>
                                      <?php for ($i=0; $i <5-ceil($peliculas[$p]['calificacion']) ; $i++) { ?>
                                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                      <?php } ?>
                                    </div>
                                  </div>
                              </div>
                              <?php } ?>
                          </div><!--/row-->
            <?php } else echo "<h1> No hay películas con esos parámetros de búsqueda</h1></br>" ?>
        </div>
        <!--/well-->
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="pull-right">
        <nav aria-label="Page navigation">
        <ul class="pagination  pagination-lg">
          <form action="php/index.php" method="GET">
              <input type="hidden" name="nombre" value="<?php echo $nombre ?>" >
              <input type="hidden" name="genero" value="<?php echo $genero ?>" >
              <input type="hidden" name="anio" value="<?php echo $anio ?>" >
              <input type="hidden" name="order_anio" value="<?php echo $order_anio ?>" >
              <input type="hidden" name="order_nombre" value="<?php echo $order_nombre ?>" >
              <div class="btn-group" role="group">
                    <?php if($page > 1){ ?> 
                    <button type="submit" name="page" value="<?php echo $page-1 ?>" class="btn btn-bc" ><span class="glyphicon glyphicon-chevron-left"></span></button> <?php }?>
                    <?php for ($l=0; $l < $paginas ; $l++) { ?>
                    <button type="submit" name="page" value="<?php echo $l+1 ?>" class="btn btn-bc"<?php if($page-1==$l){ echo "disabled"; } ?>><?php echo $l+1 ?></button><?php } ?>
                    <?php if($paginas > 1 && $page != $paginas){ ?>
                    <button type="submit" name="page" value="<?php echo $page+1 ?>" class="btn btn-bc" ><span class="glyphicon glyphicon-chevron-right"></span></button>
                    <?php } ?>
              </div>
          </form>
        </ul>
        </nav>
      </div>
    </div>
</div>
</body>
<footer>
  <?php include "paginas/footer.php";?>
</footer>
</html>