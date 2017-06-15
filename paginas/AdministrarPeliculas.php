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
                <li class="active"><a data-toggle="tab" href="#tabPelis">Administrar Películas</a></li>
                <li><a data-toggle="tab" href="#tabGeneros">Administrar Géneros</a></li>
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
                         <td>
                          <?php $cadena = $peliculas[$p]['id']." , '".$peliculas[$p]['nombre']."' , '".$peliculas[$p]['sinopsis']."' , ".$peliculas[$p]['anio']." , ".$peliculas[$p]['generos_id']?>
                          <button type="button" class="btn btn-success" data-toggle="modal" 
                              onclick="editarPelicula(<?php echo $cadena ?>)"><i class="glyphicon glyphicon-pencil"></i></button></td>
                         <td>
                          <button type="button" class="btn btn-danger" data-toggle="modal" 
                          onclick="eliminarPelicula(<?php echo $peliculas[$p]['id'] ?>)" ><i class="glyphicon glyphicon-remove"></i></button>
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
                  <div class="col-md-4 col-md-offset-4">
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
                         <td><?php echo $generos[$g]['genero'] ?></td>
                         <td>
                              <button type="button" class="btn btn-success" data-toggle="modal" 
                              onclick="editarGenero(<?php echo $generos[$g]['id'] .",'" . $generos[$g]['genero'] ."'" ?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                         </td>
                      </tr>
                      <?php } ?>
                      
                     </tbody>
                     <thead>
                      <tr>
                         <th>Agregar un nuevo género</th>
                         <th></th>
                      </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <form action="../../php/paginas/addGenero.php" method="post" id="addGenero_form">
                          <td><input class="form-control" type="text" name="addGenero" placeholder="Ingrese el nombre del genero" required></td>
                          <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                          <td><button type="submit" class="btn btn-bc">Agregar</button></td>
                        </form>
                      </tr>
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

<div class="modal fade" id="deletePeliculaModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmar
            </div>
            <form action="../../php/paginas/deletePelicula.php" method="post" id="deletePelicula_form">
              <div class="modal-body">
                Esta seguro que desea borrar la pelicula?
                <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" class="form-control" name="peli_id" id="peli_id">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger btn-ok">Borrar</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editGenero" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Editar nombre
            </div>
            <form action="../../php/paginas/editGenero.php" method="post" id="editGenero_form">
              <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Ingrese el nuevo nombre</label>
                    <input type="text" class="form-control" name="nombre_gen" id="nombre_edit_gen" required autofocus="true">
                </div>
                <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" class="form-control" name="genero_id" id="genero_id">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success btn-ok">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editPelicula" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Editar Pelicula
            </div>
            <form action="../../php/paginas/editPelicula.php" method="post" id="editPelicula_form">
              <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="pelicula_nombre">Nombre</label>
                      <input type="text" class="form-control" name="pelicula_nombre" id="nombre_edit_peli" required autofocus="true">
                  </div>
                  <div class="form-group">
                      <label for="pelicula_sinopsis">Sinopsis</label>
                      <textarea class="form-control" name="pelicula_sinopsis" id="sinopsis_edit_peli" required autofocus="true" style="resize: vertical;"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="pelicula_anio">Año</label>
                      <input type="number" class="form-control" name="pelicula_anio" id="anio_edit_peli" required autofocus="true">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pelicula_genero">Género</label>
                        <select class="form-control" name="pelicula_gen" id="genero_edit_peli">
                          <option value="" >--Genero--</option>
                          <?php for ($i=0; $i < count($generos) ; $i++) 
                          { ?>
                          <option value="<?php echo $generos[$i]['id'] ?>"><?php echo $generos[$i]['genero'] ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                    <input type="hidden" class="form-control" name="pelicula_id" id="id_edit_peli">
                </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success btn-ok">Guardar</button>
              </div>
            </form>
        </div>
    </div>
</div>