<?php require_once ('conexion.php');

$menu = 'verpost';
if (!isset($_GET['seo'])) {header('location:'.$dato[0]);
}
$seopost = $_GET['seo'];
//consultar datos del user
$accion_post = sprintf("SELECT * FROM posts WHERE  seo=%s",
    formatearcadena($seopost, 'text')
);
$consulta_post = mysqli_query($conexion, $accion_post);
$datos_post    = mysqli_fetch_assoc($consulta_post);
$cantidad_post = mysqli_num_rows($consulta_post);
$imagenes      = $datos_post['image'];
$partes        = explode('####', $imagenes);
$cantidad      = count($partes);
require_once('inc/head.php');
?>
<body>
    <?php include 'inc/header.php';?>
        <div class="main-content relleno-8 borde-negro">
            <div class="ed-container">
                <div class="ed-item full">
                <h1>Acuerdo de hoy</h1>
                        <br>
                    <?php{?>
                    <div>
                        <h2>
                        <?php echo $datos_post['title'];?>
                          </h2>
                     </div>
                     <p>
                    <?php echo nl2br($datos_post['content']);?>
                      </p>
                    <?php if ($imagenes != '') {
                    ?>
                        <div class="callbacks_container">
                            <ul class="rslides" id="slider4">
                                <?php for ($i = 0;
                                           $i < $cantidad;
                                           $i++) {?>
                                    <li>
                                        <img src="<?php echo $dato[0]?>img/upload/<?php echo $partes[$i];?>">

                                    </li>
                                <?php }
                                ?>
                            </ul>
                         </div>

                    <div class="alerta">
                        <?php if (isset($_SESSION['iduser']) && rango($_SESSION['iduser']) == 10) {?>
                            <a onclick="return confirm('seguro que desea eliminar?');" href=" <?php echo $dato[0];?>/admin/borrar.php?idpost=<?php echo $datos_post['id'];?>"   class="button derecha">borrar</a>
                            <a href="" class="button button-enviar derecha">editar</a>
                        <?php }?>
                    </div>
                    autor del post <a href="<?php echo $dato[0];?>perfil/<?php echo $datos_post['autor'];?>/<?php echo nombre($datos_post['autor']);?>"><?php echo nombre($datos_post['autor']);
                        ?></a>
    <div class="etiqueta etiqueta-pequenia">
        <p>
            <strong><?php echo $datos_post['fecha'];?></strong>
        </p>
    </div>
<?php } else {?>
    <div class="">
        <?php if (rango($_SESSION['iduser']) == 10) {?>
            <a onclick="return confirm('seguro que desea eliminar?');" href="<?php echo $dato[0];?>/admin/borrar.php?idpost=<?php echo $datos_post['id'];?>"
              class="button button-enviar derecha">borrar</a>
            <a href="<?php echo $dato[0];?>/admin/editar.php?idpost=<?php echo $datos_post['id'];?>" class="button derecha">editar</a>
        <?php }?>
    </div>
    <p>autor del post</p> <a href="<?php echo $dato[0];?>perfil/<?php echo $datos_post['autor'];?>/<?php echo nombre($datos_post['autor']);?>"><?php echo nombre($datos_post['autor']);
        ?></a>
<br> <br>

    <div class="etiqueta etiqueta-pequenia">
        <p>
            <strong><?php echo $datos_post['fecha'];?></strong>
        </p>
    </div>
<?php }?>

    </div
    </div>
    </div>
        <?php include 'inc/footer.php';?>
    <script >
        // Slideshow 4
        $(document).ready(function(){
            $("#slider4").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        })  ;
</script>
</body>
</html>


<?php mysqli_free_result($consulta_post);
