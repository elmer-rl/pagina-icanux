<?php require_once ('conexion.php');
//valdidar formulario
if (!isset($_POST['user']) || $_POST['user'] == '' || $_POST['pass'] == '') {exit;
}

//comprobar cuenta user
$accion_login = sprintf("SELECT * FROM users WHERE user=%s AND rango>0 OR email=%s  AND rango>0",
	formatearcadena($_POST['user'], 'text'),
	formatearcadena($_POST['user'], 'text')
);
$consulta_login = mysqli_query($conexion, $accion_login);
$datos_login    = mysqli_fetch_assoc($consulta_login);
$cantidad_login = mysqli_num_rows($consulta_login);

if ($cantidad_login == 1) {

	// Aquí verificamos la contraseña, recién.
	if (!password_verify($_POST['pass'], $datos_login['password'])) {
		echo "error";
		exit;
	}
	$_SESSION['iduser']     = $datos_login['id'];
	$_SESSION['nombreuser'] = $datos_login['user'];
	$_SESSION['nombrename'] = $datos_login['name'];

	if (isset($_POST['recordar']) && $_POST['recordar'] == 'on') {
		setcookie('idcookie', $datos_login['id'], time()+30*24*60*60, '/');
		setcookie('usercookie', $datos_login['user'], time()+30*24*60*60, '/');
	}
	echo "correcto";

} else {
	echo 'error';
}

mysqli_free_result($consulta_login);

?>
