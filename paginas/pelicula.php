<!DOCTYPE html>
<html>
<head>
	<base href="../../php" />
	<?php include "header.php" ?>
	<link rel="stylesheet" href="php/Styles/estilos.css" type="text/css">
</head>
<body>

<?php include "nav_top.php" ?>


<div class="container-fluid fondo">
<!-- PELICULA DE EJEMPLO PARA CARGAR LOS DATOS -->
<?php 
	include ('getPelicula.php');
	include ('funciones.php');
	/* NOS DEVUELVE UN ARREGLO $data CON LA INFORMACION */
	$nombre = $data['nombre'];
	$anio = $data['anio'];
	$calif = $data['calificacion'];
	$genero = $data['genero'];
	$sinopsis = $data['sinopsis'];
	$poster = $data['contenidoimagen'];
	$comments = $comentarios; /* Proviene desde la consulta SQL */
	$usuarios = array_column($comments, 'nombreusuario'); /* lista de los usuarios que hicieron comentarios */
	//sendMensaje("nombre: $nombre\naño: $anio\ncalificacion: $calif\nsinopsis: $sinopsis\ngenero: $genero");
?>

	<!-- PAGINA DE LA PELICULA -->
	<div class="col-lg-10 col-md-12 col-xs-12 col-lg-offset-1">
	<h1></h1>
		<div class="panel panel-default">
		  <div class="panel-body">
		<!--PARTE SUPERIOR CON INFORMACION DE LA PELICULA-->
			<div class="col-md-4 col-xs-12">
			<!-- POSTER DE LA PELICULA -->
			<img src="data:image/jpeg;base64,<?php echo base64_encode($poster); ?>" width="100%" class="img-rounded"/>
			</div>
			<div class="col-md-6 col-xs-12">
				<!-- INFORMACION -->
				<h1><?php echo $nombre ?> | 
					<?php for ($i=0; $i <ceil($calif) ; $i++) { ?>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php } ?>
					<?php for ($i=0; $i <5-ceil($calif) ; $i++) { ?>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
					<?php } ?>
				</h1>
				<h3>Año de estreno: <?php echo $anio ?></h3>
				<h3>Género: <?php echo $genero ?></h3>
				<h3><p>Sinopsis: </p><?php echo $sinopsis ?></h3>
			</div>
		  </div>
		</div>
	</div>
	<!-- COMENTARIOS -->
	<div class="col-lg-10 col-md-12 col-xs-12 col-lg-offset-1">
		<div class="page-header">
  		<h1><small><?php echo count($comments) ?> comentario<?php if(count($comments) != 1){echo 's';} ?></small></h1>
		</div>
		<?php 
		 if (session_status() == 2 && (isset($_SESSION['nombreusuario']) && !in_array($_SESSION['nombreusuario'], $usuarios))) { ?>
		<!-- 'si la persona ya comentó lo siguiente no aparece'  -->
		<!-- tiene que: estar conectado Y existir el username Y no tiene que estar en los usuarios que comentaron -->
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-1 col-xs-1">
					<!-- FOTO -->
					<img src="php/img/perfil.jpg" width="100%">
				</div>
				<div class="col-md-11 col-xs-11">
					<!-- INPUTEXT PARA COMENTARIO -->
					<h4> <strong><?php echo $_SESSION['nombreusuario'] ?> </strong></h4> 
					<form name="formComentario" action="NuevoComentario.php" method="post">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<select class="form-control" name="calificacion">
			          					<option value="" >--Calificación--</option>
					          			<?php for ($i=1; $i <= 5 ; $i++) 
					          			{ ?>
					          				<option value="<?php echo $i ?>"><?php echo $i ?></option>
					          			<?php } ?>
					         		</select>
					         	</div>
				         	</div>
				         	<div class="col-md-10">
				         		<input type="hidden" class="form-control" name="usuario_id" value="<?php echo $_SESSION['id'] ?>">
				         		<input type="hidden" class="form-control" name="pelicula_id" value="<?php echo $data['id'] ?>">
					         	<div class="form-group">
									<textarea type="text" class="form-control" name="comentario" placeholder="Escriba su comentario aquí" style="resize: vertical;min-height: 100px"></textarea>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<button type="submit" class="form-control" style="height: 100px">Enviar Comentario</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
		<?php } ?>
		<?php for ($i=0; $i < count($comments); $i++)
		{
			$comentario = $comments[$i];
			$puntaje = $comentario['calificacion'];
			?>	
		<div class="col-md-12">
			<div class="col-md-1 col-xs-1">
				<!-- FOTO -->
				<img src="php/img/perfil.jpg" width="100%">
			</div>
			<div class="col-md-11 col-xs-11">
				<!-- COMENTARIO -->
				<div class="panel panel-default">
				  <div class="panel-heading"><?php echo $comentario['nombreusuario']." | " ; for ($u=0; $u < $puntaje ; $u++) { ?>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php } ?>
						<?php for ($u=0; $u <5-$puntaje ; $u++) { ?>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php } echo $comentario['fecha']; ?> 
				  </div>
				  <div class="panel-body">
				    <?php echo $comentario['comentario'];?>
				  </div>
				</div>
			</div>
		</div>
		<?php	}	?>
	</div><!--fin del col-lg-10 -->
</div><!-- fin del container -->
<footer>
  <?php include "footer.php";?>
</footer>
</body>
</html>