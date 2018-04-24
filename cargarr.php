<?php require_once ('../conexion.php');

//valdidar formulario
//
if (!isset($_POST['paginar']) || $_POST['paginar'] == '') {exit;
}

$_SESSION['paginacion'] += $porpagina;
$indice = $_SESSION['paginacion'];

$accion_cargar = "SELECT * FROM posts ORDER BY id DESC LIMIT $indice,$porpagina";

$consulta_cargar = mysqli_query($conexion, $accion_cargar);
$datos_cargar    = mysqli_fetch_assoc($consulta_cargar);
$cantidad_cargar = mysqli_num_rows($consulta_cargar);

?>


<?php if ($cantidad_cargar != 0) {
do {

$imagenes = $datos_cargar['image'];
$partes   = explode('####', $imagenes);
//    $cantidad = count($partes);
//  echo $cantidad;
?>
<div class="ed-container">
<div class="ed-item m-25 l-25">

<?php if ($imagenes != '') {?>
<img src=" <?php echo $dato[0];?>img/upload/<?php echo $partes[0];?>">
<?php } else {?>
<img src="<?php echo $dato[0];?>img/HELMI1.png">
<?php }?>

</div>
<div class="ed-item m-75 l-75">
<h2><a href=" <?php echo $dato[0];?>post/<?php echo $datos_cargar['seo'];?> " class="title-pub"><?php echo $datos_cargar['title'];
	?></a>
</h2>
	<p>
		<?php echo substr($datos_cargar['content'], 0, 1000);?> </p>
		<br> <br>

		<div class="etiqueta etiqueta-pequenia">
			<p>
				Publicado el  dia <strong><?php echo date('d/m/Y H:i', strtotime($datos_post['fecha']));?></strong>
			</p></div>
			<br> <br>

		</div>


	</div>
	<?php } while ($datos_cargar = mysqli_fetch_assoc($consulta_cargar));
}?>
<?php
mysqli_free_result($consulta_cargar);
