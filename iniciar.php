<?php require_once ('conexion.php');

$menu = 'iniciar';

if (isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}
require_once('inc/head.php');
?>
<body class="fondo-oscuro" id="f-i" >
<?php include 'inc/header.php';?>

<div class="main-content">
      <div class="ed-container">
          <div class="ed-item m-12 l-12">
           <form onsubmit="return false" class="formulario" id="formInicio">

                        <div class="formu-iniciar">
                           <h1>Iniciar </h1>
                        </div>

                        <div class="form-team">
                              <label for="user">Usuario o Email:</label>
                              <input type="text" name="user" id="user" placeholder="Usuario , Ejemplo@icanux.com">
                        </div>


                         <div class="form-team">
                              <label for="pass">Contraseña:</label>
                              <input type="password" name="pass" id="pass" placeholder="">
                        </div>
                        <div class="form-team oculto" id="login-error">
                          <div class="alerta alerta-rojo alerta-pequenia" id="login-mensaje"> Error</div>
                        </div>

                        <div class="form-team">
                          <br>
                          <div class="recordarme">
                            <input type="checkbox" name="recordar" id="recordar"><label for="recordar">Recordar contraseña</label>

                          </div>

                        </div>
                        <br>
                        <div class="form-team main-center">
                            <input type="submit"  class="button button-enviar" value="Ingresar" onclick="login(user.value , pass.value);">
                        </div>

                    </form>
          </div>
      </div>
  </div>

  <div>
 <?php include'inc/footer.php';?>
</div>
</body>
</html>