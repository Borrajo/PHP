<!DOCTYPE html>
<html>
<head>
<base href="../../php" />
<?php include "header.php";
?>
<link rel="stylesheet" href="php/Styles/estilos.css" type="text/css">
<script type="text/javascript" src="php/scripts/validaciones.js"></script>

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
  require_once('class_usuario.php');
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
              </ul>

              <div class="tab-content">
                <div id="tabPelis" class="tab-pane fade in active">
                  <h3>Puede agregar, editar o incluso eliminar peliculas 
                      <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" onclick="nuevaPelicula()">
                          agregar pelicula 
                          <i class="glyphicon glyphicon-plus"></i>
                        </button>
                      </div>
                  </h3>
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
                         <td><a href="php/paginas/pelicula.php?id=<?php echo $peliculas[$p]['id'] ?>" ><?php echo $peliculas[$p]['nombre'] ?></a></td>
                         <td><?php echo $peliculas[$p]['anio'] ?></td>
                         <td><?php echo $peliculas[$p]['genero'] ?></td>
                         <td><?php echo substr($peliculas[$p]['sinopsis'], 0, 100); ?></td>
                         <td><?php echo $peliculas[$p]['calificacion'] ?></td>
                         <td>
                          <?php $cadena = $peliculas[$p]['id']." , '".addslashes($peliculas[$p]['nombre'])."' , '".addslashes($peliculas[$p]['sinopsis'])."' , ".$peliculas[$p]['anio']." , ".$peliculas[$p]['generos_id']?>
                          <button type="button" class="btn btn-success" data-toggle="modal" 
                              onclick="editarPelicula(<?php echo $cadena ?>)"><i class="glyphicon glyphicon-pencil"></i></button></td>
                         <td>
                          <button type="button" class="btn btn-danger" data-toggle="modal" 
                          onclick="eliminarPelicula(<?php echo $peliculas[$p]['id'].','.$_SESSION['id'] ?>)" ><i class="glyphicon glyphicon-remove"></i></button>
                         </td>
                      </tr>
                      <?php } ?>
                     </tbody>
                    </table>
                  </div>
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
<?php } else  header("Location: /php/index.php");
  }else  header("Location: /php/index.php");
  ob_end_flush();
?>

<div class="modal fade" id="deletePeliculaModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmar
            </div>
            <form method="post" id="deletePelicula_form">
              <div class="modal-body">
                Esta seguro que desea borrar la pelicula?
                <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" class="form-control" name="peli_id" id="peli_id">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="button" onclick="eliminarPelicula('delete_Pelicula_form')" class="btn btn-danger btn-ok">Borrar</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editPelicula" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a id="title_edit">Editar Pelicula</a>
            </div>
            <form action="php/paginas/editPelicula.php" onsubmit="return validarSubmitPelicula()" method="post" id="editPelicula_form" enctype="multipart/form-data">
              <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="pelicula_nombre">Nombre</label>
                      <input type="text" class="form-control" name="pelicula_nombre" id="nombre_edit_peli" autofocus="true">
                  </div>
                  <div class="form-group">
                      <label for="pelicula_sinopsis">Sinopsis</label>
                      <textarea class="form-control" name="pelicula_sinopsis" id="sinopsis_edit_peli"  autofocus="true" style="resize: vertical;"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="pelicula_anio">Año</label>
                      <input type="number" class="form-control" name="pelicula_anio" id="anio_edit_peli"  autofocus="true" min=0>
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
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="file_pic" id="label_file">Cargue una nueva portada ( opcional ) </label>
                    <input type="file" accept="image/*" class="form-control-file" name="file_pic" id="file_pic">
                  </div>
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