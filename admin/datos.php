<?php require_once ('conexion.php');

$menuadmin = 'datos';

//Validación de rango y valores
if (!isset($_SESSION['iduser']) || rango($_SESSION['iduser']) != 10) {header('Location:'.$dato[0]);
}

//url,titulo,email,porpagina,descripcion

//CONSULTA A LA BASE DE DATOS
$accion_editar   = "SELECT * FROM datos";
$consulta_editar = mysqli_query($conexion, $accion_editar);
$datos_editar    = mysqli_fetch_assoc($consulta_editar);
$cantidad_editar = mysqli_num_rows($consulta_editar);

if (isset($_POST['enlace'])) {

	//Actualizar datos web
	$accion_editar = sprintf("UPDATE datos SET url=%s,titulo=%s,email=%s,descripcion=%s,porpagina=%s,fanpage=%s",
		formatearcadena($_POST['enlace'], 'text'),
		formatearcadena($_POST['titulo'], 'text'),
		formatearcadena($_POST['email'], 'text'),
		formatearcadena($_POST['descripcion'], 'text'),
		formatearcadena($_POST['porpagina'], 'text'),
		formatearcadena($_POST['fanpage'], 'text'));

	$consulta_editar = mysqli_query($conexion, $accion_editar) or die(mysqli_error());

	header('Location:'.$dato[0].'admin/datos.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Admin</title>
 <link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>static/img/HELMI1.ico">
 <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/base.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/my-style.css">
<script type="text/javascript" src="<?php echo $dato[0];?>static/js/jquery-3.2.1.min.js"></script>
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>


<?php include ('../inc/header.php');?>
<div class="main-content" style="min-height: 600px">
	<!--Cada fila contiene 12 columnas 12 es igual a 100% -->
	<div class="ed-container">
<div class="ed-item m-25 l-25">
<?php include ('sidebar.php');?>

	</div>
	<div class="columna columna-m-9 columna-g-9">
		<h1>Editar datos</h1>
		<form onsubmit="return validar_form(enlace.value,titulo.value,email.value,descripcion.value,porpagina.value);" action="" method="post" class="formulario" id="formAgregar" style="max-width: 500px;">
<div class="form-team">
				<label for="enlace">Enalce:</label>
				<input type="text" name="enlace" id="enlace" placeholder="Enlace..." value="<?php echo $datos_editar['url'];?>">
			</div>
			<div class="form-team">
				<label for="titulo">Titulo:</label>
				<input type="text" name="titulo" id="titulo" placeholder="Titulo..." value="<?php echo $datos_editar['titulo'];?>" style="background-color: white;">
			</div>
			<div class="form-team">
				<label for="porpagina">Posts por pagina:</label>
				<input type="text" name="porpagina" id="porpagina" placeholder="Por pagina..." value="<?php echo $datos_editar['porpagina'];?>">
			</div>
<div class="form-team">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" placeholder="Email..." value="<?php echo $datos_editar['email'];?>">
			</div>
<div class="form-team">
				<label for="fanpage">Fanpage:</label>
				<input type="text" name="fanpage" id="fanpage" placeholder="Fanpage..." value="<?php echo $datos_editar['fanpage'];?>">
			</div>
			<div class="form-team">
				<label for="descripcion">Descripción:</label>
				<textarea name="descripcion" id="descripcion"><?php echo $datos_editar['descripcion'];?></textarea>

			</div>


			<div class="form-team oculto" id="datosweb-error">
				<div class="alerta alerta-rojo alerta-pequenia" id="datosweb-mensaje">Error</div>
			</div>


			<div class="form-team">
				<input type="submit" value="Editar" class="button button-enviar derecha">
			</div>
		</form>
	</div>
	</div>
	</div>



<?php include ('../inc/footer.php');?>





	<script src="<?php echo $dato[0];?>js/base.js"></script>
	<script src="<?php echo $dato[0];?>js/efectos.js"></script>
</body>
</html>
<?php mysqli_free_result($consulta_editar);?>
