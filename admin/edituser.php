<?php require_once ('conexion.php');

$menuadmin = 'edituser';

//Validación de rango y valores
if (!isset($_SESSION['iduser']) || rango($_SESSION['iduser']) != 10 || !isset($_GET['iduser'])) {header('Location:'.$dato[0]);
}

$iduser = $_GET['iduser'];

//CONSULTA A LA BASE DE DATOS
$accion_editar = sprintf("SELECT * FROM users WHERE id=%s",
	formatearcadena($iduser, 'int'));

$consulta_editar = mysqli_query($conexion, $accion_editar);
$datos_editar    = mysqli_fetch_assoc($consulta_editar);
$cantidad_editar = mysqli_num_rows($consulta_editar);

if (isset($_POST['rangos'])) {

	//Actualizar datos web
	$accion_editar = sprintf("UPDATE users SET rango=%s WHERE id=%s",
		formatearcadena($_POST['rangos'], 'int'),
		formatearcadena($iduser, 'int'));

	$consulta_editar = mysqli_query($conexion, $accion_editar) or die(mysqli_error());

	header('Location:'.$dato[0].'admin/usuarios.php');
}
require_once('inc/head.php');
?>
<body>
<?php include ('../inc/header.php');?>
<div class="main-content">
  <div class="ed-container">
<div class="ed-item m-25 l-25">
<?php include ('sidebar.php');?>
  </div>
  <div class="ed-item m-75 l-75">
    <h1>Editar  rango de <?php echo $datos_editar['user'];?></h1>
    <form action="" method="post" onsubmit="return validar_editaruser(rangos.value);" class="formulario" id="formAgregar">
      <div class="form-team">
        <label for="rangos">Rango user:</label>
        <select name="rangos" id="rangos">
          <option value="">Seleccionar rango</option>
          <option value="0"  <?php if ($datos_editar['rango'] == 0) {echo 'selected';
}
?>  >Baneado</option>
          <option value="1"  <?php if ($datos_editar['rango'] == 1) {echo 'selected';
}
?>  >usuario normal</option>
          <option value="10"  <?php if ($datos_editar['rango'] == 10) {echo 'selected';
}
?>>Administrador</option>
        </select>
      </div>
      <div class="form-team oculto" id="editaruser-error">
        <div class="alerta alerta-rojo alerta-pequenia" id="editaruser-mensaje">Error</div>
      </div>
      <div class="form-team">
        <input type="submit" value="Editar" class="button button-enviar">
      </div>
    </form>
  </div>
  </div>
  </div>
<?php include ('../inc/footer.php');?>
</body>
</html>
<?php mysqli_free_result($consulta_editar);?>
