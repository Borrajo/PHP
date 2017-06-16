/*VALIDACION DEL LADO DEL CLIENTE*/

function validarRegistro(nombreR, apellidoR,emailR,usernameR,passwordR,password2R,registerForm)
{

	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfabetico=/^[a-z]+$/i;
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpEmail=/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i; // /^[a-z][\w.-]+@\w[\w.-]?+(\.[\w.-])*[a-z][a-z]$/ puede que esté mal
	var ExpPass1=/([0-9]|[!#$%&()=?¡¿@-_*+])+/; //la condicion verifica que tenga al menos un numero o un simbolo
	var ExpPass2=/[A-Z]+/; //la condicion verifica que exista al menos una mayuscula
	var ExpPass3=/[a-z]+/; //la condicion verifica que exista al menos una minuscula
	var mensaje='';

	nombre=document.getElementById('nombreR').value;
	apellido=document.getElementById('apellidoR').value;
	username=document.getElementById('usernameR').value;
	email = document.getElementById('emailR').value; 
	password=document.getElementById('passwordR');
	password2=document.getElementById('password2R');


try{
	
	/*El primer campo que comprobamos es el del nombre. Lo traemos por id y verificamos 
	la condición, en este caso, que no sea vacio y tenga sólo caracteres alfabéticos*/

	if(nombre == null || !alfabetico.test(nombre))
	{
	    todo_correcto = false;
	    mensaje += "El nombre no debe ser vacío y debe tener sólo caracteres alfabéticos \n\r";
	}

	
	/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
	if(apellido == null || !alfabetico.test(apellido))
	{
	    todo_correcto = false;
	    mensaje += "El apellido no debe estar vacío y debe tener sólo caracteres alfabéticos\n\r";
	}

	/*Verificamos el valor ingresado por el usuario tiene estructura de 
	e-mail.*/

	if (!ExpEmail.test(email))
	{
	    todo_correcto = false;
	    mensaje += "Los datos ingresados no corresponden al formato de un e-mail\n\r";
	}

	/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

	if(username.length<6 || !alfanumerico.test(username))
	{
	    todo_correcto = false;
	    mensaje += "La nombre de usuario debe tener mas de 6 caracteres y sólo caracteres alfanuméricos\n\r";
	}

	if(password.toString().localeCompare(password2)==0)
	{
		if(!ExpPass1.test(password) || !ExpPass2.test(password) || !ExpPass3.test(password) )
		{
			todo_correcto = false;
			mensaje += "La contraseña debe tener al menos un número o signo, al menos una mayuscula y una minúscula\n\r";
		}
	}
	else
	{
		todo_correcto = false;
		alert('Las contraseñas no coinciden');
	}

	if(!todo_correcto)
	{
		alert('Algunos campos no están correctos, vuelva a revisarlos');
	}
}
catch (e)
{
	alert(e);
}
	if(todo_correcto)
	{
		document.getElementById(registerForm).submit();
	}
	else
	{
		alert(mensaje);
	}
	return todo_correcto;
}


var errores = { 		0 : "Login Correcto", 
						1 : "El nombre de usuario es demasiado corto", 
						2:"La contraseña es demasiado corta", 
						3:"El usuario ingresado no existe", 
						4:"La contraseña es incorrecta"
				};

function openModal(error)
{
	/*
	 -1 : el mensaje no existe
      0 : el login es correcto
      1 : nombre de usuario no cumple condicion
      2 : contraseña no cumple condicion
      3 : el usuario no existe
      4 : contraseña incorrecta
    */
	if( error >= 1 )
	{
		
		$('#modalIngreso').modal('show') ;
		$('#modalIngreso').on('shown.bs.modal', function () {
	  	$('#usernameL').focus()
		});
		if(error == 1 || error == 3)
		{
			$('#usernameL').popover({animation: "true", title: "error", content: errores[error], placement: "right"});
			$('#usernameL').popover('show');
		}
		if(error == 2 || error == 4)
		{
			$('#passwordL').popover({animation: "true", title: "error", content: errores[error], placement: "right"});
			$('#passwordL').popover('show');
		}
	}
}

function eliminarPelicula(pelicula)
{
	document.getElementById('peli_id').value = pelicula;
	console.log(document.getElementById('peli_id').value);
	$('#deletePeliculaModal').modal('show') ;
}

function editarGenero(id_genero,nombre_genero)
{
	document.getElementById('nombre_edit_gen').value = nombre_genero;
	document.getElementById('genero_id').value = id_genero;
	$('#editGenero').modal('show') ;
	$('#editGenero').on('shown.bs.modal', function () {
	$('#nombre_edit_gen').focus()
		});
}

function nuevaPelicula()
{
	console.log(document.getElementById('title_edit').value);
	document.getElementById('id_edit_peli').value = -1;
	document.getElementById('label_file').value = "Cargue una portada" 
	document.getElementById('title_edit').value = "Nueva Película" 
	document.getElementById('nombre_edit_peli').value = "";
	document.getElementById('sinopsis_edit_peli').value = "";
	document.getElementById('anio_edit_peli').value = "";
	document.getElementById('genero_edit_peli').value = "";

	$('#editPelicula').modal('show') ;
	$('#editPelicula').on('shown.bs.modal', function () {
	$('#nombre_edit_peli').focus()
		});
}


function editarPelicula(id,nombre,sinopsis,anio,genero)
{
	document.getElementById('id_edit_peli').value = id;
	document.getElementById('nombre_edit_peli').value = nombre;
	document.getElementById('sinopsis_edit_peli').value = sinopsis;
	document.getElementById('anio_edit_peli').value = anio;
	document.getElementById('genero_edit_peli').value = genero;
	document.getElementById('title_edit').value = "Editar Película" 

	$('#editPelicula').modal('show') ;
	$('#editPelicula').on('shown.bs.modal', function () {
	$('#nombre_edit_peli').focus()
		});
}

function validarLogin(campo1, campo2, formulario)
{
	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpPass=/^((?=.*\d)|(?=.*[A-Z])|(?=.*\W)).{6,15}$/;
	var mensaje='';
	username=document.getElementById(campo1).value;
	password=document.getElementById(campo2).value;
try
{
	if(username.length<6 || !alfanumerico.test(username)){
    	todo_correcto = false;
    	mensaje += "El nombre de usuario debe tener mas de 6 caracteres \n\r";
    	//Estos alert despues deberian ser cambiados por unos tooltip, y que haga tooltip.show 
	}
	if(!ExpPass.test(password)){
		todo_correcto = false;
		mensaje += "La contraseña debe tener mas de 6 caracteres \n\r";
	}
}
catch (e)
{
	alert(e);
}
	if(todo_correcto)
	{
		document.getElementById(formulario).submit();
	}
	else
	{
		alert(mensaje);
	}
}


