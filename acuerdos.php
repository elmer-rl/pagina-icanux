<?php require_once ('conexion.php');
$menu = 'acuerdos';
if (!isset($_SESSION['iduser'])) {header('location:'.$dato[0]);
}
$_SESSION['paginacion'] = 0;
$accion_post   = sprintf("SELECT * FROM posts ORDER BY id DESC LIMIT $porpagina");
$consulta_post = mysqli_query($conexion, $accion_post);
$datos_post    = mysqli_fetch_assoc($consulta_post);
$cantidad_post = mysqli_num_rows($consulta_post);
require_once('inc/head.php');
?>
<body class="fondo-oscuro">
<?php include 'inc/header.php';?>
<div class="main-content">
<div class="ed-container">
<div class="ed-item m-75 l-75">
	<div class="main-center">
		<h1>Acuerdos Internos</h1>
	</div>
	<div id="listar">
		<?php
		if ($cantidad_post != 0) {
			do {
				$imagenes = $datos_post['image'];
				$partes   = explode('####', $imagenes);
				?>
				<div class="ed-container">
					<div class="ed-item m-25 l-25">
						<?php if ($imagenes != '') {?>
						<img src=" static/img/upload/<?php echo $partes[0];?>">
						<?php } else {?>
						<img src="static/img/HELMI1.png">
						<?php }?>
					</div>
					<div class="ed-item m-75 l-75">
						<h2><a href=" <?php echo $dato[0];?>postt/<?php echo $datos_post['seo'];?>" class="title-pub"><?php echo $datos_post['title'];
							?></a> </h2>
							<p>
							<?php echo substr(strip_tags($datos_post['content']), 0, 1000);?>
							</p>
							<div class="etiqueta etiqueta-pequenia">
								<p>
									Publicado el  dia <strong><?php echo date('d/m/Y H:i', strtotime($datos_post['fecha']));?></strong>
								</p></div>
							</div>
						</div>
						<?php } while ($datos_post = mysqli_fetch_assoc($consulta_post));
					}?>
				</div>
				<div class="main-center" id="cargar">
					<a onclick="paginarr();" class="button button-enviar" id="ocultar">cargar mas</a>
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
