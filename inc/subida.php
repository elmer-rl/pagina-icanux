
<?php require_once ('../conexion.php');

if (!isset($_FILES['imagenavatar']['name']) || $_FILES['imagenavatar']['name'] == '') {exit;
}

//Validación tipo imagen
if ($_FILES['imagenavatar']['type'] == 'image/gif' || $_FILES['imagenavatar']['type'] == 'image/jpg' || $_FILES['imagenavatar']['type'] == 'image/jpeg' || $_FILES['imagenavatar']['type'] == 'image/png') {

	//subir el fichero
	$extension = explode('/', $_FILES['imagenavatar']['type']);

	$nombre = $_SESSION['iduser'].'.'.$extension[1];	
	move_uploaded_file($_FILES['imagenavatar']['tmp_name'], '../static/avatar/'.$nombre);

	//Actualizar el avatar
	$accion_subiravatar = sprintf("UPDATE users SET avatar=%s WHERE id=%s",
		formatearcadena($nombre, 'text'),
		formatearcadena($_SESSION['iduser'], 'int'));

	$consulta_subiravatar = mysqli_query($conexion, $accion_subiravatar) or die(mysqli_error());

	echo $dato[0].'static/avatar/'.$nombre;

} else {
	exit;
}
