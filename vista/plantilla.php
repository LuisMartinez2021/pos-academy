<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema POS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="icon" href="assets/dist/img/Logo_POS.png">
</head>

<?php
if(isset($_SESSION["ingreso"]) && $_SESSION["ingreso"]=="ok"){
    if(isset($_GET["ruta"])){
        if(isset($_GET["ruta"])=="inicio" ||
            isset($_GET["ruta"])=="VUsuario"||
            isset($_GET["ruta"])=="VCliente"||
            isset($_GET["ruta"])=="VProducto"||
            isset($_GET["ruta"])=="VSinCatalogos"||
            isset($_GET["ruta"])=="salir"){
            include "menu.php";
            include $_GET["ruta"].".php";
            include "footer.php";
        }
    }else{
        include "vista/login.php";
    }
}else{
    include "vista/login.php";
}

    
?>

</html>
