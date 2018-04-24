<?php require_once ('conexion.php');

$menu = 'noticias';
if (!isset($_SESSION['paginacion'])) {
$_SESSION['paginacion'] = 0;
} else if (isset($_SESSION['paginacion']) && $_SESSION['paginacion'] != 0) {
$porpagina += $_SESSION['paginacion'];
}

$accion_post   = sprintf("SELECT * FROM post ORDER BY id DESC LIMIT $porpagina ");
$consulta_post = mysqli_query($conexion, $accion_post);
$datos_post    = mysqli_fetch_assoc($consulta_post);
$cantidad_post = mysqli_num_rows($consulta_post);
require_once('inc/head.php');
?>
<body>
<?php include 'inc/header.php';?>
<div class="ed-container">
<div class="main-conent ed-container">
<div class="ed-item m-75 l-75">
<h1>POSTS</h1>
<div id="listar">


<?php

if ($cantidad_post != 0) {
	do {

		$imagenes = $datos_post['image'];
		$partes   = explode('####', $imagenes);

		?>
		<div class="ed-container">
			<div class="ed-item l-25 m-25">

				<?php if ($imagenes != '') {?>
				<img src="static/img/upload/<?php echo $partes[0];?>">
				<?php } else {?>
				<img src="static/img/HELMI1.png">
				<?php }?>

			</div>
			<div class="ed-item m-75 l-75">
				<h2><a class="title-pub" href=" <?php echo $dato[0];?>post/<?php echo $datos_post['seo'];?> "><?php echo $datos_post['title'];
					?></a> </h2>
					<p class="content-pub">
						<?php echo substr(strip_tags($datos_post['content']), 0, 1000);?></p><br><br>
						<div class="etiqueta etiqueta-pequenia fecha">
							<p>
								<time datetime="<?php echo $datos_post['fecha'];?>">
									Publicado el  dia <strong><?php echo date('d/m/Y H:i', strtotime($datos_post['fecha']));?></strong>
								</time>
							</p></div>
						</div>

					</div>

					<?php } while ($datos_post = mysqli_fetch_assoc($consulta_post));
				}?>
			</div>

			<div class="texto-centrado main-center" id="cargar">
				<a onclick="paginar();" class="button button-enviar" id="ocultar">cargar mas</a>
			</div>
			<br>
		</div>

		<aside class="ed-item m-25 l-25">


			<?php include ('inc/sidebar.php');?>
		</aside>

	</div>
</div>
	<?php include 'inc/footer.php';?>
</body>
</html>


<?php mysqli_free_result($consulta_post);
