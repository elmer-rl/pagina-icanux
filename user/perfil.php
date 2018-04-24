<?php require_once ('conexion.php');

$menu = 'perfil';
if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}

$iduser = $_SESSION['iduser'];
//consultar datos del user
$accion_perfil   = "SELECT * FROM users WHERE id=$iduser";
$consulta_perfil = mysqli_query($conexion, $accion_perfil);
$datos_perfil    = mysqli_fetch_assoc($consulta_perfil);
$cantidad_perfil = mysqli_num_rows($consulta_perfil);
require_once ('inc/head.php');
?>
<body class="fondo-oscuro">
<?php include 'inc/header.php';?>
  <div class="main-content content relleno-8 borde-gris"¿>
    <div class="ed-container">
      <div class="ed-item m-100 l-100">
        <h1>mi perfil</h1>


        <img id="imgenavatar" src="<?php echo$dato[0];?>static/avatar/<?php echo $datos_perfil['avatar'];?>" alt="<?php echo $datos_perfil['user'];?>">
        <br>
        <a onclick="$('#imagenavatar').click();" class="boton button button-enviar">cambiar imagen</a>

        <form onsubmit="return false" id="formAvatar" class="oculto" method="POST">
          <input type="file" name="imagenavatar" id="imagenavatar" onchange="subir();">
        </form>
        <br>
        <strong>Nombre: </strong><?php echo $datos_perfil['name'];?>
        <br>
        <strong>Apellidos: </strong><?php echo $datos_perfil['l_name'];?>
        <br>
        <strong>Username: </strong> <?php echo $datos_perfil['user'];?>
        <br>
        <strong>Correo: </strong><?php echo $datos_perfil['email'];?>
        <br>
        <strong>telefono: </strong><?php echo $datos_perfil['num'];?>
        <br>
        <a href="editar" class=" button button-enviar">editar perfil</a>

      </div>
    </div>
  </div>
</div>


<?php include 'inc/footer.php';?>
</body>
</html>


<?php mysqli_free_result($consulta_perfil);