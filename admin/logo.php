<?php require_once ('conexion.php');

$menuadmin = 'logo';

//Validación de rango y valores
if (!isset($_SESSION['iduser']) || rango($_SESSION['iduser']) != 10) {header('Location:'.$dato[0]);
}

//url,titulo,email,porpagina,descripcion

//CONSULTA A LA BASE DE DATOS
$accion_editar   = "SELECT logo FROM datos";
$consulta_editar = mysqli_query($conexion, $accion_editar);
$datos_editar    = mysqli_fetch_assoc($consulta_editar);
$cantidad_editar = mysqli_num_rows($consulta_editar);

if (isset($_FILES['logo'])) {

	//subir el logo

	if ($_FILES['logo']['type'] == 'image/gif' || $_FILES['logo']['type'] == 'image/jpg' || $_FILES['logo']['type'] == 'image/jpeg' || $_FILES['logo']['type'] == 'image/png') {

		//subir el fichero

		$nombre = time().$_FILES['logo']['name'];
		move_uploaded_file($_FILES['logo']['tmp_name'], '../img/'.$nombre);

	} else {

		$nombre = '';
	}

	//Actualizar datos web
	$accion_editar = sprintf("UPDATE datos SET  logo=%s",
		formatearcadena($nombre, 'text'));

	$consulta_editar = mysqli_query($conexion, $accion_editar) or die(mysqli_error());

	header('Location:'.$dato[0].'admin/');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Editar logo</title>
 <link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>static/img/HELMI1.ico">
 <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/base.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/my-style.css">
<script type="text/javascript" src="<?php echo $dato[0];?>js/jquery-3.2.1.min.js"></script>
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<?php include ('../inc/header.php');?>
<div class="main-content">

	<div class="ed-container">

<div class="ed-item m-25 l-25">
<?php include ('sidebar.php');?>
</div>


	<div class="ed-item m-75 l-75">
		<h1>Editar logo</h1>



		<form enctype="multipart/form-data" onsubmit="return validar_logo(logo.value);" action="" method="post" class="formulario" id="formAgregar" style="max-width: 600px">


<div class="form-team">

<div class="alerta" style="border-color: tomato;">

<?php if ($dato[4] != '') {?>
													<img  id="milogo"src="<?php echo $dato[0];?>img/<?php echo $dato[4];?>">
	<?php } else {?>
													<img  id="milogo"src="<?php echo $dato[0];?>img/banner.png">

	<?php }?></div>
<label for="logo">logo</label>
				<input type="file" name="logo" id="logo">
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
