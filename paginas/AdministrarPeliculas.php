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
ob_start();
//Se requiere que el usuario sea administrador */
  /*  DATOS
  $peliculas --> contiene las peliculas
  */
  include "listarPeliculas.php" ;
  include "nav_top.php" ;
  if( session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION) ) 
  {
    if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 1)
    { 
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
                         <td>
                         <form action="../../php/paginas/deletePelicula.php" method="post" id="deletePelicula">
                          <input type="hidden" id='idPelicula' name='id' value="<?php echo $peliculas[$p]['id'] ?>">
                          <input type="hidden" id='idUser' name='user' value="<?php echo $_SESSION['id'] ?>">
                          <button type="submit" class="btn btn-danger" data-toggle="modal" data-id="<?php echo $peliculas[$p]['id'] ?>" data-target="#confirmar"><i class="glyphicon glyphicon-remove"></i></button>
                         </form>
                         </td>
                      </tr>
                      <?php } ?>
                     </tbody>
                    </table>
                  </div>
                </div>
                <!-- TAB DE GENEROS -->
                <div id="tabGeneros" class="tab-pane fade">
                  <h3>Puede agregar, editar o incluso eliminar generos</h3>
                  <div class="col-md-12">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                         <th>Nombre</th>
                         <th>Editar</th>
                      </tr>
                     </thead>
                     <tbody>
                     <?php for ($g=0; $g < count($generos) ; $g++) { ?>
                      <tr>
                         <td><?php echo $generos[$g]['nombre'] ?></td>
                         <td>
                            <form action="../../php/paginas/editGenero.php" method="post" id="editarGenero">
                              <input type="hidden" id='idGenero' name='id' value="<?php echo $generos[$g]['id'] ?>">
                              <input type="hidden" id='idUser' name='user' value="<?php echo $_SESSION['id'] ?>">
                              <button type="submit" class="btn btn-success" data-toggle="modal" data-id="<?php echo $generos[$g]['id'] ?>" data-target="#confirmar"><i class="glyphicon glyphicon-pencil"></i></button>
                            </form>
                         </td>
                      </tr>
                      <?php } ?>
                     </tbody>
                    </table>
                  </div>
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
<?php } else  header("Location: ../index.php");
  }else  header("Location: ../index.php");
  ob_end_flush();
?>
<div class="modal fade" id="confirmar" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmar
            </div>
            <div class="modal-body">
                Esta seguro que desea borrar la pelicula?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok" onclick="eliminarPelicula(this)">Borrar</a>
            </div>
        </div>
    </div>
</div>

