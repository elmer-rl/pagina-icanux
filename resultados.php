<?php require_once ('conexion.php');

$menu = 'resultados';

//$_SESSION['paginacion']=0;

if (!isset($_GET['buscar']) || $_GET['buscar'] == '') {header('Location:'.$dato[0]);
}

$cadena = trim($_GET['buscar']);

$consulta = '';

$partes   = explode(' ', $cadena);
$cantidad = count($partes);

for ($i = 0; $i < $cantidad; $i++) {
	$consulta .= 'title LIKE '.formatearcadena('%'.$partes[$i].'%', 'text').' AND ';
}

$consulta = substr($consulta, 0, -4);

//Seleccionar tabla z_posts
$accion_post   = "SELECT * FROM post WHERE $consulta ORDER BY id DESC";
$consulta_post = mysqli_query($conexion, $accion_post);
$datos_post    = mysqli_fetch_assoc($consulta_post);
$cantidad_post = mysqli_num_rows($consulta_post);
require_once('inc/head.php');
?>
<body class="fondo-oscuro">


	<?php include ('inc/header.php');?>

	<?php include ('inc/menu.php');?>




	<div class="contenedor fondo-blanco relleno-8 borde-gris" style="min-height: 600px">



		<!--Cada fila contiene 12 columnas 12 es igual a 100% -->
		<div class="fila">

			<div class="columna columna-m-9 columna-g-9" style="background-color: black; color: white;">
				<h1>Resultados de <?php echo $_GET['buscar'];?></h1>


				<div id="listar">


					<?php

					if ($cantidad_post != 0) {
						do {

							$imagenes = $datos_post['image'];
							$partes   = explode('####', $imagenes);

							?>
							<div class="fila">
								<div class="columna columna-m-3 columna-g-3">

									<?php if ($imagenes != '') {?>
									<img src=" img/upload/<?php echo $partes[0];?>">
									<?php } else {?>
									<img src="img/HELMI1.png">
									<?php }?>

								</div>
								<div class="columna columna-m-9 columna-g-9">
									<h1><a href=" post/<?php echo $datos_post['seo'];?> " style="color: aqua;"><?php echo $datos_post['title'];
										?></a> </h1>
										<?php echo substr(strip_tags($datos_post['content']), 0, 1000);?><br><br>
										<div class="etiqueta etiqueta-pequenia" style="background-color: black; border-color:orange;">
											<p style="color:orange;">
												Publicado el  dia <strong><?php echo date('d/m/Y H:i', strtotime($datos_post['fecha']));?></strong>
											</p></div>
											<br> <br>
											<?php echo $datos_post['category'];?>
										</div>

									</div>

									<?php } while ($datos_post = mysqli_fetch_assoc($consulta_post));
								} else {?>
								<div class="alerta alerta-rojo">

									No se econtro el post .....
								</div>

								<?php }?>
							</div>



						</div>

						<aside class="columna columna-m-3 columna-g-3">

							<?php include ('inc/sidebar.php');?>
						</aside>

					</div>




				</div>



				<?php include ('inc/footer.php');?>
			</body>
			</html>
			<?php mysqli_free_result($consulta_post);?>
