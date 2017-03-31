<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
</head>
<body>

<?php include "nav_top.php" ?>

<div class="container-fluid">
<!-- PELICULA DE EJEMPLO PARA CARGAR LOS DATOS -->
<?php 
	$nombre = "JURASSIC PARK";
	$anio = 1993;
	$calif = 2;
	$genero = "ciencia ficcion";
	$sinopsis = "El multimillonario John Hammond consigue hacer realidad su sueño de clonar dinosaurios del Jurásico y crear con ellos un parque temático en una isla remota. Antes de abrirlo al público, invita a una pareja de eminentes científicos y a un matemático para que comprueben la viabilidad del proyecto. Pero las medidas de seguridad del parque no prevén el instinto de supervivencia de la madre naturaleza ni la codicia humana.";
	$poster = "http://i.imgur.com/Ak3if00.jpg";
	$comments = 100;
?>

	<!-- PAGINA DE LA PELICULA -->
	<div class="col-lg-10 col-md-12 col-xs-12 col-lg-offset-1">
		<div class="panel panel-default">
		  <div class="panel-body">
		<!--PARTE SUPERIOR CON INFORMACION DE LA PELICULA-->
			<div class="col-md-4 col-xs-12">
			<!-- POSTER DE LA PELICULA -->
			<img src=<?php echo $poster ?> width="100%" class="img-rounded">
			</div>
			<div class="col-md-6 col-xs-12">
				<!-- INFORMACION -->
				<h1><?php echo $nombre ?> | 
					<?php for ($i=0; $i <$calif ; $i++) { ?>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php } ?>
					<?php for ($i=0; $i <5-$calif ; $i++) { ?>
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
  		<h1><small><?php echo $comments ?> comentarios</small></h1>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-1 col-xs-1">
					<!-- FOTO -->
					<img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="100%">
				</div>
				<div class="col-md-11 col-xs-11">
					<!-- INPUTEXT PARA COMENTARIO -->
					<h4> nombre de usuario </h4> 
					<input type="text" class="form-control" name="comment" placeholder="Escriba su comentario aqui">
				</div>
			</div>
			</div>
		</div>
		<?php for ($i=0; $i < $comments; $i++){?>	
		<div class="col-md-12">
			<div class="col-md-1 col-xs-1">
				<!-- FOTO -->
				<img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="100%">
			</div>
			<div class="col-md-11 col-xs-11">
				<!-- COMENTARIO -->
				<div class="panel panel-default">
				  <div class="panel-heading">persona - apellido <?php $r= rand(0,5); for ($u=0; $u < $r ; $u++) { ?>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php } ?>
						<?php for ($u=0; $u <5-$r ; $u++) { ?>
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php } ?> 
				  </div>
				  <div class="panel-body">
				    Aca aparecerá el comentario de la persona 
				  </div>
				</div>
			</div>
		</div>
		<?php	}	?>
	</div><!--fin del col-lg-10 -->
</div><!-- fin del container -->

</body>
</html>