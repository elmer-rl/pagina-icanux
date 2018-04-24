<?php require_once ('conexion.php');

$menu = 'usuario';
$iduser = $_GET['iduser'];
//consultar datos del user
$accion_usuario = sprintf("SELECT * FROM users WHERE id=$iduser AND name=%s",
	formatearcadena($_GET['nombre'], 'text'));
$consulta_usuario = mysqli_query($conexion, $accion_usuario);
$datos_usuario    = mysqli_fetch_assoc($consulta_usuario);
$cantidad_usuario = mysqli_num_rows($consulta_usuario);

if ($cantidad_usuario == 0) {header('location:'.$dato[0]);
}

if ($datos_usuario['id'] == $_SESSION['iduser']) {header('location:'.$dato[0].'user/perfil');}

require_once('../inc/head.php')	
?>
<body>
<?php include '../inc/header.php';?>
  <div class="main-content relleno-8 borde-negro" style="min-height: 600px;">
    <div class="ed-container">
      <div class="ed-item m-100 l-100">
        <h1>perfil de <?php echo $datos_usuario['user'];?></h1>
        <img id="imagenusuario" src="<?php echo $dato[0];?>user/avatar/<?php echo $datos_usuario['avatar'];?>" alt="<?php echo $datos_perfil['user'];?>">
        <br>
        <strong>Nombre:</strong><?php echo $datos_usuario['user'];?>
        <br>
        <strong>Apellidos: </strong> <?php echo $datos_usuario['l_name'];?>
        <br>
        <strong>Username: </strong><?php echo $datos_usuario['user'];?>
        <br>
        <strong>Correo: </strong><?php echo $datos_usuario['email'];?>
        <br>
        <strong>telefono : </strong><?php echo $datos_usuario['num'];?>
</div>
    </div>
  </div>
</div>


<?php include '../inc/footer.php';?>

</body>
<script type="text/javascript" src="<?php echo $dato[0];?>js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="<?php echo $dato[0];?>js/base.js"></script>
</body>
</html>


<?php mysqli_free_result($consulta_usuario);