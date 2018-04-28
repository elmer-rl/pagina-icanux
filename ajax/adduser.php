<?php require_once ('conexion.php');

//valdidar formulario
//
if (!isset($_POST['user']) || $_POST['nam'] == '' || $_POST['ap'] == '' || $_POST['user'] == '' || $_POST['correo'] == '' || $_POST['pass1'] == '' || $_POST['num'] == '') {exit;
}

//comprobar correo
$accion_email = sprintf("SELECT * FROM users WHERE email=%s",
	formatearcadena($_POST['correo'], 'text'));

$consulta_email = mysqli_query($conexion, $accion_email);
$datos_email    = mysqli_fetch_assoc($consulta_email);
$cantidad_email = mysqli_num_rows($consulta_email);

if ($cantidad_email == 0) {
	//INSERTAR usuario

	$accion_adduser = sprintf("INSERT INTO users (name, l_name, user, email, password,num,rango) VALUES (%s,%s,%s,%s,%s,%s,%s)",
		formatearcadena($_POST['nam'], 'text'),
		formatearcadena($_POST['ap'], 'text'),
		formatearcadena($_POST['user'], 'text'),
		formatearcadena($_POST['correo'], 'text'),
		formatearcadena(password_hash($_POST['pass1'], PASSWORD_DEFAULT), 'text'),
		formatearcadena($_POST['num'], 'text'),
		formatearcadena(1, 'int'));

	$consulta_adduser = mysqli_query($conexion, $accion_adduser) or die(mysqli_error());

	echo "correcto";

} else {
	echo 'existe';
}

mysqli_free_result($consulta_email);
