<?php require_once ('conexion.php');

$menu = 'usuarios';
if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}

//consultar datos del user
$accion_users   = sprintf("SELECT * FROM users ORDER BY id DESC");
$consulta_users = mysqli_query($conexion, $accion_users);
$datos_users    = mysqli_fetch_assoc($consulta_users);
$cantidad_users = mysqli_num_rows($consulta_users);
require_once('inc/head.php');
?>
<body style="background: #171717">
<?php include 'inc/header.php';?>
<div class="main-content">
    <div class="ed-container">
      <h1 class="user-title">Usuarios de la comunidad icanux</h1>
     <div class="ed-item">



       <div class="ed-container">
<?php while ($datos_users = mysqli_fetch_assoc($consulta_users)) {
	?>
	         <div class="ed-item  s-50 m-20 l-20">
	          <a href=" <?php echo $dato[0].'perfil/'.$datos_users['id'].'/'.$datos_users['name'];?> ">
	            <img class="imgusuario" id="imgusuario" src="static/avatar/<?php echo $datos_users['avatar'];?>"> <br>
	<?php echo $datos_users['name'];
	?></a>
	          </div> 	<?php }?>
</div>

      </div>

    </div>
  </div>
<?php include 'inc/footer.php';?>
</body>
</html>

<?php mysqli_free_result($consulta_users);
