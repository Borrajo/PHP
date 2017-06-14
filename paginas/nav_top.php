<script type="text/javascript" src="../../php/scripts/validaciones.js"></script>
<?php   
 
  include ('loginMensaje.php');
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
    $id_mensaje --> contiene el numero de error del login
     -1 : el mensaje no existe
      0 : el login es correcto
      1 : nombre de usuario no cumple condicion
      2 : contraseña no cumple condicion
      3 : el usuario no existe
      4 : contraseña incorrecta
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
          <input type="text" class="form-control" placeholder="Nombre" name="nombre" onload = "codeAddress;">
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
      <?php if(isset($_COOKIE['user_session'])){session_start();};
     // print_r($_COOKIE);
      //print_r($_SESSION);
      if( session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION) ) { ?> <!-- Si existe una sesion iniciada -->
        <ul class="nav navbar-nav navbar-right">
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="cuentaMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
              Mi Cuenta<span class="glyphicon glyphicon-user"></span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="cuentaMenu">
              <li><a href="#"><?php echo $_SESSION['nombre'];?></a></li>
              <li><a href="#">Modificar</a></li>
              <?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 1)
              { ?>
              <li><a href="../../php/paginas/AdministrarPeliculas.php">Administrar peliculas</a></li>
              <?php } ?>
              <li role="separator" class="divider"></li>
              <li><a href="../../php/paginas/logout.php">Cerrar Sesión</a></li>
            </ul>
          </div>
        </ul>
      <?php }else{?> <!-- Sino existe la sesion -->
        <ul class="nav navbar-nav navbar-right">
          <li><a type="button" class="btn btn-bc navbar-btn" data-toggle="modal" onclick="openModal(9)">  Ingresar <span class="glyphicon glyphicon-user"></span></a></li>
        </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Modal -->
<div class="modal fade" id="modalIngreso" tabindex="-1" role="dialog" aria-labelledby="modal">
  <div class="modal-dialog" role="document">
    <!-- contenido del modal -->
    <div class="modal-content">
      <!-- cabecera del modal botones de cerrar-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal">Ingresar / Registrarse</h4>
      </div>
      <!-- Cuerpo del modal --> 
      <div class="modal-body">
      <form action="../../php/paginas/getUsuario.php" method="post" id="login"> <!-- si la funcion devuelve true, entonces hace el submit-->
          <div class="form-group">
              <label for="username">Nombre de usuario:</label>
              <input type="text" class="form-control" name="username" id="usernameL" required placeholder="Nombre de usuario" autofocus="true">
          </div>
          
          <div class="form-group">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control" name="password" type="password" id="passwordL" required placeholder="Contraseña">
          </div>
          <input type="hidden" id='dir' value=>
          <button  type="button" onclick='validarLogin("usernameL", "passwordL","login")'  class="btn btn-ingreso navbar-btn"> Entrar</button>
      </form>
      </div>
      <!-- footer del modal -->
      <div class="modal-footer">
        <p class="texto">No tienes una cuenta?   
        <a type="button" class="btn btn-ingreso navbar-btn" href="../../php/paginas/register.php"> Regístrate!</a></p>
      </div>

    </div> <!-- fin contenido del modal -->
  </div>
</div>
<!-- FIN MODAL -->