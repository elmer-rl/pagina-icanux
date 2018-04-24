<?php require_once ('conexion.php');

$menuadmin = 'posts';

if (!isset($_SESSION['iduser']) || rango($_SESSION['iduser']) != 10 || !isset($_GET['idpost'])) {header('location:'.$dato[0]);
}

$idpost = $_GET['idpost'];

$accion_editar = sprintf("SELECT * FROM post WHERE  id=$idpost",
	formatearcadena($seopost, 'text')
);
$consulta_editar = mysqli_query($conexion, $accion_editar);
$datos_editar    = mysqli_fetch_assoc($consulta_editar);
$cantidad_editar = mysqli_num_rows($consulta_editar);

$_SESSION['images'] = $datos_editar['image'];

$imagenes = $datos_editar['image'];
$partes   = explode('####', $imagenes);
$cantidad = count($partes);

$menformato = htmlentities($datos_editar['content'], ENT_COMPAT, 'utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>editar</title>
  <link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>static/img/HELMI1.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/base.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>static/css/style.css">
  <script type="text/javascript" src="<?php echo $dato[0];?>ckeditor/ckeditor.js" ></script>


  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body class="fondo-oscuro">
<?php include '../inc/header.php';?>

<?php include '../inc/menu.php';?>
<div class="contenedor  relleno-8 borde-gris" style="min-height: 600px;background-color: white;">
    <div class="fila">
      <div class="columna columna-m-3 columna-g-3">
<?php include ('sidebar.php');?>
      </div>
      <div class="columna columna-m-9 columna-g-9">

       <h1>Editar post </h1>


       <form onsubmit="return false" class="formulario" id="formAgregar" style="max-width: 800px;">

        <div class="formulario-grupo">
          <label for="titulo">Titulo:</label>
          <input type="text" name="titulo" id="titulo"  value="<?php echo $datos_editar['title'];
?>">
        </div>


        <div class="formulario-grupo">

<?php if ($imagenes != '') {
	?>
			           <?php for ($i = 0;
		$i < $cantidad;
		$i++) {?>
						            <div class="relativo" id="elemento<?php echo $i;?>">
						              <img style="width: 100px; height: auto" src="<?php echo $dato[0]?>img/upload/<?php echo $partes[$i];?>" alt="">
						              <span onclick="eliminar_imagen('<?php echo $i;?>','<?php echo $partes[$i];?>');">&times;
						</span>
						            </div>
		<?php }
	?>


	<?php }?>


          </div>


          <div class="formulario-grupo">
            <label for="imagen">Imagen:</label>

            <a onclick="subir_img_tiemporeal(1);" class="boton boton-verde" >Subir imagenes</a>

          </div>

          <div class="formulario-grupo">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria"  class="izquierda" style="max-width: 275px;">
              <option value="">selecionar categoria</option>
              <option value="1" <?php if ($datos_editar['category'] == 1) {
	echo "selected";
}?>
             >Noticias</option>
             <option value="2" <?php if ($datos_editar['category'] == 2) {
	echo "selected";
}?>>Acuerdos</option>
           </select>
         </div>
         <div class="formulario-grupo">
          <label for="contenido">Contenido:</label>
          <textarea name="contenido" id="contenido" cols="30" rows="10"> <?php echo $menformato;?></textarea>
          <input type="hidden" name="idpost" id="idpost" value="<?php echo $datos_editar['id'];
?>"">
        </div>




        <div class="formulario-grupo oculto" id="agregar-error">
          <div id="agregar-mensaje" class="alerta alerta-rojo alerta-pequenia" >Error</div>
        </div>

        <div class="formulario-grupo">
          <input type="submit"  class="boton boton-agregar derecha" value="agregar post" onclick="CKEDITOR.instances.contenido.updateElement();agregar(titulo.value, categoria.value,contenido.value);">
        </div>

      </form>


      <form class="oculto" onsubmit="return false" method="post" id="formTiemporeal" enctype="multipart/form-data">
        <input type="file" name="imagenupload[]" id="imagenupload" multiple onchange="subir_img_tiemporeal(2);">
      </form>
      <script>

        CKEDITOR.replace( 'contenido',
        {
          height: '300px',
        });
      </script>



    </div>
  </div>
</div>


<?php include '../inc/footer.php';?>

</body>
</html>

<?php mysqli_free_result($consulta_editar);
