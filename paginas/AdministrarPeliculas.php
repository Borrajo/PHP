<!DOCTYPE html>
<html>
<head>
<?php include "header.php" ?>

<link rel="stylesheet" href="../../php/Styles/estilos.css" type="text/css">
<!--<link rel="stylesheet" href="Styles/slide.css" type="text/css" media="screen"> -->
<!--<script type="text/javascript" src="carousel.js"></script>-->

</head>
<body>


<?php
//Se requiere que el usuario sea administrador */
  /*  DATOS
  $peliculas --> contiene las peliculas
  */
  include "listarPeliculas.php" ;
  include "nav_top.php" ;
?>
        
<div class="container-fluid fondo">

    <div class="col-md-10 col-md-offset-1">
        <div class="well">
            <?php if(count($peliculas) > 0 )
            { ?>

              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tabPelis">Administrar Peliculas</a></li>
                <li><a data-toggle="tab" href="#tabGeneros">Administrar generos</a></li>
                <li><a data-toggle="tab" href="#tabUsuarios">Administrar Usuarios</a></li>
              </ul>

              <div class="tab-content">
                <div id="tabPelis" class="tab-pane fade in active">
                  <h3>Puede agregar, editar o incluso eliminar peliculas</h3>
                  <div class="col-md-10 col-md-offset-1">
                    <table>
                      <thead>
                      <tr>
                         <th>Nombre</th>
                         <th>Año de estreno</th>
                         <th>Genero</th>
                         <th>Sinopsis</th>
                         <th>Calificacion</th>
                         <th>Editar</th>
                         <th>Eliminar</th>
                      </tr>
                     </thead>
                     <tbody>
  <tr>
     <td>January</td>
     <td>$100</td>
     <td>January</td>
     <td>$100</td>
     <td>January</td>
     <td>$100</td>
     <td>January</td>
     <td>$100</td>
  </tr>
  <tr>
     <td>February</td>
     <td>$80</td>
     <td>January</td>
     <td>$100</td>
     <td>January</td>
     <td>$100</td>
     <td>January</td>
     <td>$100</td>
     
  </tr>
 </tbody>
                    </table>
                  </div>
                </div>
                <div id="tabGeneros" class="tab-pane fade">
                  <h3>Puede agregar, editar o incluso eliminar generos</h3>

                </div>
                <div id="tabUsuarios" class="tab-pane fade">
                  <h3>Puede agregar, editar o incluso eliminar usuarios</h3>

                </div>
              </div>
                          <div class="row justify-content-center">
                              <?php for ($p=0; $p < count($peliculas) ; $p++) { ?>
                              <div class="col-sm-10 col-md-3 align-items-center poster">
                                  
                                 
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
            <?php } ?>
        </div>
        <!--/well-->
    </div>
    <div class="col-md-10 col-md-offset-1">
    </div>
</div>
</body>
<footer>
  <?php include "footer.php";?>
</footer>
</html>