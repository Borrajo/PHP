<!DOCTYPE html>
<html>
<head>
<?php include "header.php" ?>

<link rel="stylesheet" href="../../php/Styles/estilos.css" type="text/css">
<script type="text/javascript" src="../../php/scripts/validaciones.js"></script>
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
          <div class="row justify-content-center">
            <div class="col-md-12">
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
                  <div class="col-md-12">
                    <table class="table table-striped">
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
                     <?php for ($p=0; $p < count($peliculas) ; $p++) { ?>
                      <tr>
                         <td><?php echo $peliculas[$p]['nombre'] ?></td>
                         <td><?php echo $peliculas[$p]['anio'] ?></td>
                         <td><?php echo $peliculas[$p]['genero'] ?></td>
                         <td><?php echo substr($peliculas[$p]['sinopsis'], 0, 100); ?></td>
                         <td><?php echo $peliculas[$p]['calificacion'] ?></td>
                         <td><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button></td>
                         <td><button type="button" class="btn btn-danger" onclick="eliminarPelicula(<?php print_r($peliculas[$p]) ?>)"><i class="glyphicon glyphicon-remove"></i></button></td>
                      </tr>
                      <?php } ?>
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

            <?php } ?>
            </div> <!-- div col-12 -->
            </div> <!-- row -->
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