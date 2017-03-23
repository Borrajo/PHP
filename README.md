# PHP
Trabajo Practico PHP, sitio de información de peliculas
Se solicita la creación de un sitio en el lenguaje PHP para publicar información de
películas y realizar comentarios acerca de ellas por parte de los usuarios del sitio. El
sitio está dividido en un Frontend y en un Backend.
Frontend
La página de inicio (que deberá llamarse index.php y estar en la raíz del sitio)
contendrá un listado de películas en el que se podrán visualizar los siguientes datos:
 una imagen del poster
 el nombre
 la sinopsis
 el año de estreno
 el género
 el promedio de la calificación que le dieron los usuarios del sitio en una escala
de 1 a 5 estrellas (donde 5 es lo mejor y 1 lo peor).
Dicho listado deberá estar paginado de a 5 películas por página y permitir:
a) Ordenarse alfabéticamente por nombre de la película o por año de estreno.
b) Poder realizar búsquedas por año de estreno, género o nombre (que podría
ser parcial, por ejemplo, si se busca por la palabra “ojo” aparecería la
película “El secreto de tus ojos”).
Además, haciendo clic en el poster o el nombre de la película se debe ir a otro script
que muestre información de dicha película. La información que debe mostrar es:
 la imagen del poster
 el nombre
 la sinopsis
 el año de estreno
 el género
 el promedio de la calificación que le dieron los usuarios del sitio en una escala
de 1 a 5 estrellas
 listado ordenado por fecha (desde la más reciente a la más antigua) de todos
los comentarios que recibió dicha película. De cada comentario se debe
mostrar:
o cantidad de estrellas
o el nombre y apellido del usuario autor del comentario
o el comentario
Backend
Por otro lado la página de inicio tendrá un enlace para que los usuarios que quieran
comentar sobre las películas se registren. Sólo los usuarios registrados podrán 
Pág 2/3
PHP 2017 Primer Semestre
comentar las películas. En el registro deberá haber un formulario que solicite al
usuario el apellido, el nombre, un nombre de usuario y una clave (que debe ingresarse
dos veces, para validar del lado del cliente que esté bien escrita). Del formulario se
debe validar (tanto del lado del cliente cómo del lado del servidor) que el nombre y
apellido no sean vacíos y que solo tengan caracteres alfabéticos, que el nombre de
usuario tenga por lo menos 6 caracteres y que sean alfanuméricos y que la clave
tenga por los menos 6 caracteres y que tenga letras (mayúsculas y minúsculas)
además de por lo menos un número o un símbolo (ej, $, @, etc). Del lado del servidor
se debe verificar que el nombre de usuario elegido no exista previamente en la base
de datos.
Además de los usuarios que pueden realizar comentarios en las películas, existen
usuarios administradores, los cuales pueden crear, editar y eliminar películas.
Para el acceso de los usuarios que comentan películas y para los usuarios
administradores, se debe implementar un único inicio de sesión (pidiendo el nombre
de usuario y la clave). Se debe validar del lado del cliente que ambos campos tengan
por lo menos 6 caracteres y que el nombre de usuario tenga solo caracteres
alfanuméricos. Luego del envío de los datos, se debe validar contra los datos
previamente almacenados en la base de datos, que exista un usuario con dicho
nombre de usuario y si existiese se debe validar que la clave coincida con la
ingresada. En caso de éxito redirigir a la página de inicio indicando que el usuario
está logueado y en caso de falla informar que el nombre de usuario o clave es
incorrecto.
Por último, se debe implementar un único cierre de sesión, tanto para los usuarios
que comentan películas como para los usuarios administradores.
En caso de que el usuario que inicia la sesión sea un usuario administrador entonces
debe aparecer en la página principal un enlace para poder hacer la gestión de las
películas. Se debe verificar que el usuario que edita las películas sea un usuario
administrador. También se debe verificar que haya un usuario logueado para poder
comentar y calificar películas.
El trabajo debe entregarse en dos etapas:
1. La primera comprende el frontend.
2. La segunda comprende el backend.
Metodología del curso:
El trabajo se debe realizar en grupos de DOS alumnos. La conformación de los
grupos se tiene que informar a la cátedra antes del 31/3.
La primera entrega es obligatoria, de carácter conceptual y tiene el fin de
corregir errores antes de la entrega final.
Importante: La conformación de los grupos debe ser informada a la cátedra antes del
31/3. No se aceptarán nuevos grupos pasada dicha fecha.
Pág 3/3
PHP 2017 Primer Semestre
El trabajo final se debe entregar el 16 de junio, con una única re-entrega sólo
para aquellos que al menos obtuvieron un 4 (cuatro) en la entrega final. El
trabajo final se aprueba con 6 (seis).
Los alumnos que aprueben el trabajo final accederán a un coloquio que
constará de dos partes. En la primera cada alumno deberá hacer una
modificación del trabajo presentado y luego aquellos que aprueben deberán
contestar un grupo de preguntas con el profesor para defender el trabajo y
definir la nota final.
Requisitos técnicos obligatorios:
1. El modelo de la base de datos será provisto por la cátedra y no debe ser
modificado.
2. La validación de los datos ingresados por el cliente será tanto del lado del
cliente (JavaScript), como del lado del servidor (PHP).
3. Se deberá implementar una clase que se encargue de la autenticación y de la
autorización. En el proceso de autenticación, si el usuario y/o contraseña son
incorrectos la clase deberá arrojar una excepción.
Calendario de entregas
 Primer etapa obligatoria: 5/5
 Entrega final obligatoria: 16/6
 Coloquio obligatorio: Semana del 3/7
