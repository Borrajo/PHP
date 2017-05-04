<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
	<link rel="stylesheet" href="../Styles/estilos.css" type="text/css">
</head>
<body>

<?php include "nav_top.php" ?>


<div class="container-fluid fondo">
<!-- PELICULA DE EJEMPLO PARA CARGAR LOS DATOS -->
<?php 
	include ('getPelicula.php');
	/* NOS DEVUELVE UN ARREGLO $data CON LA INFORMACION */
	$nombre = $data['nombre'];
	$anio = $data['anio'];
	$calif = $data['calificacion'];
	$genero = $data['genero'];
	$sinopsis = $data['sinopsis'];
	$poster = $data['contenidoimagen'];
	$comments = $comentarios; /* Proviene desde la consulta SQL */
?>

	<!-- PAGINA DE LA PELICULA -->
	<div class="col-lg-10 col-md-12 col-xs-12 col-lg-offset-1">
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
  		<h1><small><?php echo count($comments) ?> comentario<?php if(count($comments) >1){echo 's';} ?></small></h1>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-1 col-xs-1">
					<!-- FOTO -->
					<img src="../img/perfil.jpg" width="100%">
				</div>
				<div class="col-md-11 col-xs-11">
					<!-- INPUTEXT PARA COMENTARIO -->
					<h4> nombre de usuario </h4> 
					<input type="text" class="form-control" name="comment" placeholder="Escriba su comentario aqui">
				</div>
			</div>
			</div>
		</div>
		<?php for ($i=0; $i < count($comments); $i++)
		{
			$comentario = $comments[$i];
			$puntaje = $comentario['calificacion'];
			?>	
		<div class="col-md-12">
			<div class="col-md-1 col-xs-1">
				<!-- FOTO -->
				<img src="../img/perfil.jpg" width="100%">
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
				    <?php echo $comentario['comentario']; ?>
				  </div>
				</div>
			</div>
		</div>
		<?php	}	?>
	</div><!--fin del col-lg-10 -->
</div><!-- fin del container -->
<footer>
  <?php include "../paginas/footer.php";?>
</footer>
</body>
</html>