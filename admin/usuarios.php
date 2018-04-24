<?php require_once ('conexion.php');

$menuadmin = 'usuarios';
if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}

//consultar datos del user
$accion_users   = sprintf("SELECT * FROM users ORDER BY id DESC");
$consulta_users = mysqli_query($conexion, $accion_users);
$datos_users    = mysqli_fetch_assoc($consulta_users);
$cantidad_users = mysqli_num_rows($consulta_users);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $dato_post['title'];?></title>
	<link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>static/img/HELMI1.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/my-style.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body class="fondo-oscuro">
<?php include '../inc/header.php';?>
<div class="main-content">
		<div class="ed-container">
			<div class="ed-item m-25 l-25">
<?php include ('sidebar.php');?>
</div>
			<div class="ed-item m-75 l-75">
<?php while ($datos_users = mysqli_fetch_assoc($consulta_users)) {
	?>                      <div class="ed-container">

									<div class="ed-item l-100">
									<div class="ed-container usuario-marco">
											<div class="ed-item m-25 l-25">
												<a href=" <?php echo $dato[0].'perfil/'.$datos_users['id'].'/'.$datos_users['name'];?>"> <img id="imgusuario-l" src=" <?php echo $dato[0];?>user/avatar/<?php echo $datos_users['avatar'];?>">
	<?php echo $datos_users['name'];
	?></a>
												</div>
												<div class="ed-item m-50 l-50">
													<h3>rango del usuario</h3> <?php if ($datos_users['rango'] == 10) {?>
		<h3>Administrador</h3>

		<?php } elseif ($datos_users['rango'] == 2) {?>
		<h2>secretario</h2>
		<?php } elseif ($datos_users['rango'] == 1) {?>
		<h2>Usuario normal</h2>
		<?php }?>
													<div>
														<a href="edituser.php?iduser=<?php echo $datos_users['id'];?>" class="boton boton-verde izquierda">otorgar rango</a>

														<a onclick="return confirm('seguro que desea eliminar?');" href="" class="boton boton-editar derecha">borrar</a></div>

													</div>
												</div>
												<br>
											</div>

										</div>
	<?php }?>
</div>



				</div>
			</div>
			<center>
				<div  >
<?php include '../inc/footer.php';?>
							<script type="text/javascript" src="<?php echo $dato[o];?>js/ed-grid.js"></script>
							<script type="text/javascript" src="<?php echo $dato[0];?>js/jquery-3.2.1.min.js"></script>
							<script type="text/javascript" src="<?php echo $dato[0];?>/js/efectos.js"></script>
							<script type="text/javascript">
        edgrid.menu('nav','menu');
      </script>
				</body>
				</html>

<?php mysqli_free_result($consulta_users);
