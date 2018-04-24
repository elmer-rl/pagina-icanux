<?php if ($menu != 'iniciar'){ ?>
<footer class="main-footer">
      <div class="main-content ed-container">
        <div class="ed-item l-1-3 m-1-3">
          <h1>Icanux</h1>
          Comunidad de software libre
        </div>
        <div class="ed-item l-1-3 m-1-3">
          <h1>Redes  Sociales</h1>
          <div><a href="">
            <i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></div>
            <div><i class="fa fa-whatsapp" aria-hidden="true"></i>twiter</div>
          </div>
          <div class="ed-item l-1-3 m-1-3">
            <img src="static/img/HELMI1.png" class="logo-footer" alt="" style="width: 130px;margin-top: 0">
          </div>

          <div class="ed-item m-100 l-100">
           <p> Desarrollado por Elmer Ramos Loayza  - Icanux <?php echo date('Y');?></p>
          </div>
        </div>
</footer>
   <script type="text/javascript" src="static/js/efectos.js"></script>
  <script type="text/javascript" src="static/js/ed-grid.js"></script>
  <script type="text/javascript">
edgrid.menu('nav','menu');
</script>
<?php }
else{ ?>
   <script type="text/javascript" src="static/js/efectos.js"></script>
  <script type="text/javascript" src="static/js/ed-grid.js"></script>
  <script type="text/javascript">
edgrid.menu('nav','menu');
</script>

 <?php } ?>

