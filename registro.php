<?php require_once ('conexion.php');

$menu = 'registro';

if (isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}
require_once('inc/head.php');
?>
<body class="fondo-oscuro">
<?php include 'inc/header.php';?>
<div ed-container>
      <div class="e-content">
          <div class="ed-item m-100 l-100">

    <center>
           <h1>FORMULARIO DE REGISTRO </h1>


           <form onsubmit="return false" class="formulario form-registro" id="formRegistro" style="max-width: 400px;">

                        <div class="form-team-grupo">
                              <label for="nam">Nombre:</label>
                              <input  type="text" name="nam" id="nam" placeholder="Nombre...">
                        </div>
                        <div class="form-team">
                              <label for="ap">Apellidos:</label>
                              <input type="text" name="ap" id="ap" placeholder="Apellidos...">
                        </div>

                        <div class="form-team">
                              <label for="user">Usuario:</label>
                              <input type="text" name="user" id="user" class="nombre" placeholder="Nombre de usuario...">
                        </div>

                         <div class="form-team">
                              <label for="correo">Email:</label>
                              <input type="email" name="correo" id="correo" placeholder="Ejemplo@icanux.com">
                        </div>

                         <div class="form-team">
                              <label for="pass1">Contraseña:</label>
                              <input type="password" name="pass1" id="pass1" placeholder="">
                        </div>

                         <div class="form-team">
                              <label for="pass2">Repetir contraseña:</label>
                              <input type="password" name="pass2" id="pass2" placeholder="">
                        </div>
                         <div class="form-team">
                              <label for="num">telefono:</label>
                              <input type="text" name="num" id="num" placeholder="056+.....">
                        </div>



                        <div class="form-team oculto" id="registro-error">
                          <div id="registro-mensaje" class="alerta alerta-rojo alerta-pequenia" >Error</div>
                        </div>
               <br>
                        <div class="form-team">
                            <input type="submit"  class="button button-enviar" value="registrar" onclick="registro(nam.value, ap.value,user.value,correo.value,pass1.value,pass2.value,num.value);">
                        </div>

                    </form>
        <br>




</center>


          </div>
      </div>
  </div>


<?php include 'inc/footer.php';?>
</body>
</html>