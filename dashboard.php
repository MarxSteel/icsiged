<?php
require("restritos.php"); 
require_once 'init.php';
$cHome = "active";
$PDO = db_connect();
require_once 'QueryUser.php';
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title><?php echo $titulo; ?></title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="dist/css/AdminLTE.css">
 <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
 <link rel="stylesheet" href="plugins/morris/morris.css">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
 <?php include_once 'top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once 'menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
<?php 
//include_once 'paginaDistrito.php';
if ($PrivICBR === "1") {
  include_once 'pic.php';
}
else{ ?>

 <section class="content-header">
  <h1>Página Inicial
   <small>MDIO Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
  <div class="row"> 
  <?php include_once 'linksDistrito.php'; ?>
  </div>
  </section>
  <?php
}
?>
</div><!-- CONTENT-WRAPPER -->
<?php include_once 'footer.php'; ?>

</div>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'chartSocios',
      resize: true,
      colors: ["#ff0033", "#aadd22"],
      data: [
        {label: "Pendentes/Reprovados", value: <?php echo $ProA; ?>},
        {label: "Aprovados", value: <?php echo $ProA; ?>}
      ],
      hideHover: 'auto'
    });

  });
</script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Quantidade'],
          ['Aprovados',     <?php echo $ProA; ?>],
          ['Pendentes',    <?php echo $ProP; ?>]
        ]);
        var cores = {
          pieStartAngle: 135,
          slices: {
            0: { color: '#00a65a' },
            1: { color: '#ff7700' }
          }
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, cores);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
          ['Gênero', 'Quantidade'],
          ['Feminino',     <?php echo $QtAM; ?>],
          ['Masculino',    <?php echo $QtAF; ?>]
        ]);

        var options = {
          pieStartAngle: 135,
          slices: {
            0: { color: '#cc2288' },
            1: { color: '#0ebeff' }
          }
        };
        var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart2.draw(data2, options);
      }
    </script>
</body>
</html>