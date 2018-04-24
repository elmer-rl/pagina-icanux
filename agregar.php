<?php require_once ('conexion.php');

$menu = 'agregar';

if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}
require_once('inc/head.php');
?>
<body class="fondo-oscuro">
<?php include 'inc/header.php';?>
<div class="contenedor  relleno-8 borde-gris">
    <div class="fila">
      <div class="columna columna-m-12 columna-g-12">

        <center>
         <h1>AGREGAR NOTICIAS </h1>


         <form onsubmit="return false" class="formulario" id="formAgregar" style="max-width: 600px;">

          <div class="form-team">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo">
          </div>


          <div class="form-team">
            <label for="imagen" >Imagen:</label>
            <input class="izquierda" type="file" name="imagen[]" id="imagen" multiple>
          </div>
          <br>
          <div class="form-team">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria"  class="izquierda">
              <option value="">selecionar categoria</option>
              <option value="1">Noticias</option>
              <option value="2">Acuerdos</option>
            </select>
          </div>
          <div class="form-team">
            <label for="contenido">Contenido:</label>
            <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea>
          </div>
          <div class="form-team oculto" id="agregar-error">
            <div id="agregar-mensaje" class="alerta alerta-rojo alerta-pequenia" >Error</div>
          </div>
          <br>
          <div class="form-team">
            <input type="submit"  class="button button-enviar" value="agregar post" onclick="CKEDITOR.instances.contenido.updateElement();agregar(titulo.value, categoria.value,contenido.value);">
          </div>

        </form>

        <script>

          CKEDITOR.replace( 'contenido',
          {
            height: '300px',
          });
        </script>


      </center>


    </div>
  </div>
</div>


<?php include 'inc/footer.php';?>
</body>
</html>
