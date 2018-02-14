<?php require_once ('../conexion.php');

$menu = 'editar';
if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}

$iduser = $_SESSION['iduser'];
//consultar datos del user
$accion_perfil   = "SELECT * FROM users WHERE id=$iduser";
$consulta_perfil = mysqli_query($conexion, $accion_perfil);
$datos_perfil    = mysqli_fetch_assoc($consulta_perfil);
$cantidad_perfil = mysqli_num_rows($consulta_perfil);

if (isset($_POST['nam'])) {

	//Actualizar datos web
	$accion_editar = sprintf("UPDATE users SET name=%s,l_name=%,user=%s,password=%s,num=%s WHERE id=$iduser ",
		formatearcadena($_POST['nam'], 'text'),
		formatearcadena($_POST['ap'], 'text'),
		formatearcadena($_POST['user'], 'text'),
		formatearcadena(md5($_POST['pass']), 'text'),
		formatearcadena($_POST['num'], 'text'));

	$consulta_editar = mysqli_query($conexion, $accion_editar) or die(mysqli_error());

	header('Location:'.$dato[0].'user/editar.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>perfil  </title>
  <link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>img/HELMI1.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>css/base.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>css/style.css">

  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body class="fondo-oscuro">
<?php include '../inc/header.php';?>

<?php include '../inc/menu.php';?>
<div class="contenedor fondo-blanco relleno-8 borde-negro" style="min-height: 600px;">
      <div class="fila">
          <div class="columna columna-m-12 columna-g-12">

    <center>
           <h1>EDITAR PERFIL</h1>
    </center>
            <div class="columna columna-m-6 columna-g-6">

            <img id="imgenavatar" src="<?php echo $dato[0];?>user/avatar/<?php echo $datos_perfil['avatar'];?>" alt="<?php echo $datos_perfil['user'];?>">



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
          <br>
            </div>
            <div class="columna columna-m-6 columna-g-6">

    <form onsubmit="return editar_user(nam.value,ap.value,user.value,pass.value,num.value);" action="" method="post" class="formulario" id="formEditar" style="max-width: 500px;">


                        <div class="formulario-grupo">
                              <label for="nam">Nombre:</label>
                              <input type="text" name="nam" id="nam" value="<?php echo $datos_perfil['name'];?>">
                        </div>
                        <div class="formulario-grupo">
                              <label for="ap">Apellidos:</label>
                              <input type="text" name="ap" id="ap" value="<?php echo $datos_perfil['l_name'];?>">
                        </div>

                        <div class="formulario-grupo">
                              <label for="user">Usuario:</label>
                              <input type="text" name="user" id="user" value="<?php echo $datos_perfil['user'];?>">
                        </div>

                         <div class="formulario-grupo">
                              <label for="pass">Contraseña:</label>
                              <input type="password" name="pass" id="pass" value="">
                        </div>


                         <div class="formulario-grupo">
                              <label for="num">telefono:</label>
                              <input type="text" name="num" id="num" value="<?php echo $datos_perfil['num'];?>">
                        </div>



                        <div class="formulario-grupo oculto" id="registro-error">
                          <div id="registro-mensaje" class="alerta alerta-rojo alerta-pequenia" >Error</div>
                        </div>

                        <div class="formulario-grupo">
                            <input type="submit"  class="boton boton-verde derecha" value="guardar">
                        </div>

                    </form>





              </div>

          </div>
      </div>
  </div>


<?php include '../inc/footer.php';?>

</body>
   <script type="text/javascript" src="<?php echo $dato[0];?>js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $dato[0];?>js/base.js"></script>
  <script type="text/javascript" src="<?php echo $dato[0];?>/js/efectos.js"></script>
</body>
</html>


<?php mysqli_free_result($consulta_perfil);