/*VALIDACION DEL LADO DEL CLIENTE*/

function validar()
{

	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfabetico=/^[a-z]+$/i;
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpEmail=/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i; // /^[a-z][\w.-]+@\w[\w.-]?+(\.[\w.-])*[a-z][a-z]$/ puede que esté mal
	var ExpPass1=/([0-9]|[!#$%&()=?¡¿@-_*+])+/; //la condicion verifica que tenga al menos un numero o un simbolo
	var ExpPass2=/[A-Z]+/; //la condicion verifica que exista al menos una mayuscula
	var ExpPass3=/[a-z]+/; //la condicion verifica que exista al menos una minuscula

	/*El primer campo que comprobamos es el del nombre. Lo traemos por id y verificamos 
	la condición, en este caso, que no sea vacio y tenga sólo caracteres alfabéticos*/

	var nombre=document.getElementById('nombre').value;
	if(nombre == null || !alfabetico.test(nombre))
	{
	    todo_correcto = false;
	}

	var apellido=document.getElementById('apellido').value;
	/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
	if(apellido == null || !alfabetico.test(apellido))
	{
	    todo_correcto = false;
	}

	/*Verificamos el valor ingresado por el usuario tiene estructura de 
	e-mail.*/

	var email = document.getElementById('email').value; 
	if (!ExpEmail.test(email))
	{
	    todo_correcto = false;
	}

	/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

	username=document.getElementById.value;
	if(username.length<6 || !alfanumerico.test(username))
	{
	    todo_correcto = false;
	}

	password=document.getElementById('password');
	password2=document.getElementById('password2');

	if(strcmp($password,$password2)==0)
	{
		if(!ExpPass1.test(password) || !ExpPass2.test(password) || !ExpPass3.test(password) )
		{
			todo_correcto = false;
		}
	}
	else
	{
		todo_correcto = false;
		alert('Las contraseñas no coinciden');
	}

	/*TIENE QUE LANZAR UNA EXCEPCION - CORREGIR*/
	if(!todo_correcto)
	{
		alert('Algunos campos no están correctos, vuelva a revisarlos');
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
window.onload = openModal();

function validarLogin(campo1, campo2, formulario)
{
	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpPass=/^((?=.*\d)|(?=.*[A-Z])|(?=.*\W)).{6,15}$/;
	var mensaje='';
	username=document.getElementById(campo1).value;
	password=document.getElementById(campo2).value;

	if(username.length<6 || !alfanumerico.test(username)){
    	todo_correcto = false;
    	mensaje += "El nombre de usuario debe tener mas de 6 caracteres \n\r";
    	//Estos alert despues deberian ser cambiados por unos tooltip, y que haga tooltip.show 
	}
	if(!ExpPass.test(password)){
		todo_correcto = false;
		mensaje += "La contraseña debe tener mas de 6 caracteres \n\r";
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


