<?php   
 
 // include "../../php/paginas/getGeneros.php"; Da problemas dependiendo la ubicacion
 	include ('conexion.php');
    $sql = "SELECT * FROM `generos`";
	if(!$result = mysqli_query($conn, $sql)) die();
	/*Creamos un arreglo de generos*/
    $generos = array();
    //fetch tha data from the database
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
    {
        array_push($generos, $row); /*en cada fila del arreglo ponemos un genero*/
   	}
   	/* DATOS 
 		$generos --> contiene todos los generos que existen.
  	*/
?>
<nav class="navbar navbar-inverse" id="top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../php/index.php">Peliszone</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" action="../../php/index.php" method="GET">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nombre" name="nombre">
          <input type="number" class="form-control" placeholder="Año de estreno" name="anio">
          <select class="form-control" name="genero">
          	<option value="" >--Genero--</option>
          <?php for ($i=0; $i < count($generos) ; $i++) 
          { ?>
          	<option value="<?php echo $generos[$i]['id'] ?>"><?php echo $generos[$i]['genero'] ?></option>
          <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-bc"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><button type="button" class="btn btn-bc navbar-btn">Ingresar <span class="glyphicon glyphicon-user"></span></button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>