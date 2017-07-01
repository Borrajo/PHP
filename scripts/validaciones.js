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


function openModal()
{
		$('#modalIngreso').modal('show') ;
		$('#modalIngreso').on('shown.bs.modal', function () {
	  	$('#usernameL').focus()
		});
}

function eliminarPelicula(pelicula)
{
	document.getElementById('peli_id').value = pelicula;
	console.log(document.getElementById('peli_id').value);
	$('#deletePeliculaModal').modal('show') ;
}


function nuevaPelicula()
{
	var formulario = document.getElementById('editPelicula_form');
	var id = formulario.elements.namedItem('id_edit_peli');
	var nombre = formulario.elements.namedItem('nombre_edit_peli');
	var sinopsis = formulario.elements.namedItem('sinopsis_edit_peli');
	var anio = formulario.elements.namedItem('anio_edit_peli');
	var genero = formulario.elements.namedItem('genero_edit_peli');
	var imagen = formulario.elements.namedItem('file_pic');
	var clase = ' errorInput';

	document.getElementById('label_file').text = "Cargue una portada" 
	document.getElementById('title_edit').text = "Nueva Película" 
	id.value = -1; 
	nombre.value = "";
	sinopsis.value = "";
	anio.value = "";
	genero.value = "";

	quitarClase(nombre, clase);
	quitarClase(sinopsis, clase);
	quitarClase(anio, clase);
	quitarClase(genero, clase);
	quitarClase(imagen, clase);

	$('#editPelicula').modal('show') ;
	$('#editPelicula').on('shown.bs.modal', function () {
	$('#nombre_edit_peli').focus()
		});
}


function editarPelicula(_id,_nombre,_sinopsis,_anio,_genero)
{
	var formulario = document.getElementById('editPelicula_form');
	var id = formulario.elements.namedItem('id_edit_peli');
	var nombre = formulario.elements.namedItem('nombre_edit_peli');
	var sinopsis = formulario.elements.namedItem('sinopsis_edit_peli');
	var anio = formulario.elements.namedItem('anio_edit_peli');
	var genero = formulario.elements.namedItem('genero_edit_peli');
	var imagen = formulario.elements.namedItem('file_pic');
	var clase = ' errorInput';

	document.getElementById('title_edit').text = "Editar Película" 
	id.value = _id; 
	nombre.value = _nombre;
	sinopsis.value = _sinopsis;
	anio.value = _anio;
	genero.value = _genero;

	quitarClase(nombre, clase);
	quitarClase(sinopsis, clase);
	quitarClase(anio, clase);
	quitarClase(genero, clase);
	quitarClase(imagen, clase);

	$('#editPelicula').modal('show') ;
	$('#editPelicula').on('shown.bs.modal', function () {
	$('#nombre_edit_peli').focus()
		});
}

function validarSubmitPelicula()
{
	var todo_correcto = true;
	var clase = ' errorInput';
	var formulario = document.getElementById('editPelicula_form');
	var id = formulario.elements.namedItem('id_edit_peli').value;
	var nombre = formulario.elements.namedItem('nombre_edit_peli');
	var sinopsis = formulario.elements.namedItem('sinopsis_edit_peli');
	var anio = formulario.elements.namedItem('anio_edit_peli');
	var genero = formulario.elements.namedItem('genero_edit_peli');
	var imagen = formulario.elements.namedItem('file_pic');

	//NOMBRE
	if(nombre.value == '')
	{
		nombre.className += clase;
		todo_correcto = false;
		$(nombre).popover({animation: "true", title: "Error", content: "El campo no puede estar vacío", placement: "right"});
		$(nombre).popover('show');
	}
	else
	{
		quitarClase(nombre, clase);
	}
	//AÑO
	if(anio.value == '')
	{
		anio.className += clase;
		todo_correcto = false;
		$(anio).popover({animation: "true", title: "Error", content: "El campo no puede estar vacío", placement: "left"});
		$(anio).popover('show');
	}
	else
	{
		quitarClase(anio, clase)
	}
	//SINOPSIS
	if(sinopsis.value == '')
	{
		sinopsis.className += clase;
		todo_correcto = false;
		$(sinopsis).popover({animation: "true", title: "Error", content: "El campo no puede estar vacío", placement: "left"});
		$(sinopsis).popover('show');
	}
	else
	{
		quitarClase(sinopsis, clase);
	}
	//GENERO
	if(genero.value == '')
	{
		genero.className += clase;
		todo_correcto = false;
		$(genero).popover({animation: "true", title: "Error", content: "Debe seleccionar un género", placement: "right"});
		$(genero).popover('show');
	}
	else
	{
		quitarClase(genero, clase);
	}
	//IMAGEN
	if(id == -1) //Pelicula Nueva
	{
		if(imagen.value == '')
		{
			todo_correcto = false;
			$(imagen).popover({animation: "true", title: "Error", content: "Para crear una nueva película deberá agregar una portada", placement: "right"});
			$(imagen).popover('show');
		}
		else
		{
			quitarClase(imagen,clase);
		}
	}
	return todo_correcto;
}

function quitarClase(elemento, clase)
{
	elemento.className = elemento.className.replace(clase,''); //Borramos la clase del error.
	$(elemento).popover('hide');
}

function validarLogin(campo1, campo2, formulario)
{
	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpPass=/^((?=.*\d)|(?=.*[A-Z])|(?=.*\W)).{6,15}$/;
	var mensaje='';
	_username=document.getElementById(campo1).value;
	_password=document.getElementById(campo2).value;
try
{
	if(_username.length<6 || !alfanumerico.test(_username)){
    	todo_correcto = false;
    	mensaje += "El nombre de usuario debe tener mas de 6 caracteres \n\r";
    	//Estos alert despues deberian ser cambiados por unos tooltip, y que haga tooltip.show 
	}
	if(!ExpPass.test(_password)){
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
	$.ajax({
        type: 'POST',
        url: 'php/paginas/getUsuario.php',
        //async: false,
        dataType: 'json',
        data: {username:_username,password:_password},
        success: function(data)
        { 
        	if(typeof data['OK'] !== 'undefined')
        	{
        		window.location.replace("php/index.php");
        	}
        	else
        	{
        		if(data['ERROR'] == 1 || data['ERROR'] == 3)
				{
					$('#usernameL').popover({animation: "true", title: "error", content: data['DESCRIP'], placement: "right"});
					$('#usernameL').popover('show');
				}
				if(data['ERROR'] == 2 || data['ERROR'] == 4)
				{
					$('#passwordL').popover({animation: "true", title: "error", content: data['DESCRIP'], placement: "right"});
					$('#passwordL').popover('show');
				}
        	}
        }
      });
}
	else
	{
		alert(mensaje);
	}
}


