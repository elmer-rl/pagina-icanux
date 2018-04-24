<?php require_once ('conexion.php');

$menuadmin = 'admin';

if (!isset($_SESSION['iduser']) || rango($_SESSION['iduser']) != 10) {header('location:'.$dato[0]);
}
require_once('../inc/head.php');
?>
<body class="fondo-oscuro">
<?php include '../inc/header.php';?>
<div class="main-content">
    <div class="ed-container">
    <div class="ed-item m-25 l-25">
<?php include ('sidebar.php');?>
</div>
      <div class="ed-item m-75 l-75">
        <h1>Admin</h1>
        </div>
    </div>
  </div>
</div>


<?php include '../inc/footer.php';?>
</body>
</html>
