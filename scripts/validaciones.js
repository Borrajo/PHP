/*VALIDACION DEL LADO DEL CLIENTE*/

<script type='text/javascript'>

function validar(){

var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
var alfabetico=/^[a-z]+$/i;
var alfanumerico=/^[a-z0-9]+$/i;
var ExpEmail=/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
var ExpContra=/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15}))$/; //NO ESTA BIEN LA CONDICION TIENE QUE SER AL MENOS UN NUMERO O SIMBOLO

/*El primer campo que comprobamos es el del nombre. Lo traemos por id y verificamos 
la condición, en este caso, que no sea vacio y tenga sólo caracteres alfabéticos*/

var nombre=document.getElementById('nombre').value;
if(nombre == null || !alfabetico.test(nombre)){
    todo_correcto = false;
}

var apellido=document.getElementById('apellido').value;
/*Verifiamos que apellido no sea vacio y tenga sólo caracteres alfabéticos**/
if(apellido == null || !alfabetico.test(apellido)){
    todo_correcto = false;
}

/*Verificamos el valor ingresado por el usuario tiene estructura de 
e-mail.*/

var email = document.getElementById('email').value; 
if (!ExpEmail.test(email)){
    todo_correcto = false;
}

/* Nombre de usuario debe tener por lo menos 6 caracteres y que sean alfanuméricos*/

username=document.getElementById.value;
if(username.length<6 || !alfanumerico.test(username)){
    todo_correcto = false;
}

password=document.getElementById('password');
password2=document.getElementById('password2');

if(strcmp($password,$password2)==0){
	if(!ExpContra.test(password)){
		todo_correcto = false;
	}
}
else{
	todo_correcto = false;
	alert('Las contraseñas no coinciden');
}

/*TIENE QUE LANZAR UNA EXCEPCION - CORREGIR*/
if(!todo_correcto){
alert('Algunos campos no están correctos, vuelva a revisarlos');
}

return todo_correcto;
}

function validarLogin(){

	var todo_correcto = true; // Cuando las condiciones no se cumplan retorna false
	var alfanumerico=/^[a-z0-9]+$/i;
	var ExpContra=/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15}))$/; 

	username=document.getElementById.value;

	if(username.length<6 || !alfanumerico.test(username)){
    	todo_correcto = false;
	}
	if(!ExpContra.test(password)){
		todo_correcto = false;
	}
}

</script>
