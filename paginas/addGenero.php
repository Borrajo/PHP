<?php 
    include ('conexion.php');
    include('funciones.php');
    print_r($_POST);
    if( isset($_POST['addGenero']) && isset($_POST['usuario_id'])) //Corroboramos que exista un parametro con el nombre 'id' enviado por metodo POST
    {
        if(is_numeric($_POST['usuario_id']) && $_POST['addGenero'] != '')
        {
                $genero = $_POST['addGenero'];
                $id_user = $_POST['usuario_id'];
        
                if(isAdmin($id_user,$conn))
                {
                    $add = "INSERT INTO generos (id, genero) VALUES (NULL, '$genero')";
                    if(!$result = mysqli_query($conn, $add)) die();
                }    
            header("Location: ../../php/paginas/AdministrarPeliculas.php");
        }
    }
?>