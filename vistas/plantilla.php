<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
  <title>Opticas | Blank Page</title>

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Jquery CSS -->
    <link rel="stylesheet" href="vistas/plugins/jquery-ui/jquery-ui.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JSTREE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
    <!-- Estilos personzalidos -->
    <link rel="stylesheet" href="vistas/dist/css/plantilla.css">

    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- REQUIRED SCRIPTS -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->

     <!-- jQuery -->
     <script src="vistas/plugins/jquery/jquery.min.js"></script>

      <!-- Bootstrap 4 -->
      <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- ChartJS -->
      <script src="vistas/plugins/chart.js/Chart.min.js"></script>

      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

      <!-- InputMask -->
      <script src="vistas/plugins/moment/moment.min.js"></script>
      <script src="vistas/plugins/inputmask/jquery.inputmask.min.js"></script>

      <!-- SweetAlert2 -->
      <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

      <!-- jquery UI -->
      <script src="vistas/plugins/jquery-ui/js/jquery-ui.js"></script>

      <!-- JS Bootstrap 5 -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


      <!-- JSTREE JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>


     <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <script src="vistas/dist/js/plantilla.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
  <div class="wrapper">
    

    <?php 

      include "modulos/cabezote.php";
      include "modulos/menu.php"; 
    ?>
     
      <div class="content-wrapper">
      <?php 
        if(isset($_GET["ruta"])){

          if($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "terceros" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "ventas" ||
            $_GET["ruta"] == "crear-venta" ||
            $_GET["ruta"] == "reporte-HClinica" ||
            $_GET["ruta"] == "salir"){

            include "".$_GET["ruta"].".php";

          }else{

            include "/404.php";

          }

        }else{

          include "/inicio.php";

        }

 

      
      
      ?>
      </div>


      <?php include "modulos/footer.php"; ?>
        
  </div>

  

</body>
</html>
