<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistrito = "active";
$Submenu = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title><?php echo $titulo; ?></title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
 <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">
 <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
 <aside class="main-sidebar">
  <section class="sidebar">
   <?php include_once '../menuLateral.php'; ?>
  </section>
 </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Dados do Distrito
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-4">
   <?php
    $nAtivos = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A'")->fetchColumn();
      $AtFem = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssGenero='F' AND icbr_AssStatus='A'")->fetchColumn();
      $AtMas = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssGenero='M' AND icbr_AssStatus='A'")->fetchColumn();
      ?>
    <div class="box box-primary">
     <div class="box-header with-border">
      <h3 class="box-title">Associados Ativos: <?php echo $nAtivos; ?> Associados</h3>
     </div>
     <div class="box-body">
      <div id="donutchart" style="width: 280px; height: 200px;"></div>
     </div>
    </div>
   <?php
    $nInativos = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='I'")->fetchColumn();
    $InaFem = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssGenero='F' AND icbr_AssStatus='I'")->fetchColumn();
    $InaMas = $PDO->query("SELECT count(*) from icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssGenero='M' AND icbr_AssStatus='I'")->fetchColumn();
      ?>  
    <div class="box box-danger">
     <div class="box-header with-border">
      <h3 class="box-title">Associados Inativos: <?php echo $nInativos; ?> Associados</h3>
     </div>
     <div class="box-body">
      <div id="chartInativo" style="width: 280px; height: 200px;"></div>
     </div>
    </div>
   </div>
   <div class="col-xs-4">
   <?php
    $nClubes = $PDO->query("SELECT count(*) from icbr_clube WHERE icbr_Distrito='$Distrito'")->fetchColumn();
    $nClubAtivo = $PDO->query("SELECT count(*) from icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_Status='A'")->fetchColumn();
    $nClubInativo = $PDO->query("SELECT count(*) from icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_Status='D'")->fetchColumn();
      ?>  
    <div class="box box-warning">
     <div class="box-header with-border">
      <h3 class="box-title">Clubes Cadastrados: <?php echo $nClubes; ?></h3>
     </div>
     <div class="box-body">
      <li class="list-group-item">
       Clubes Ativos: <?php echo $nClubAtivo; ?>
      </li>
      <li class="list-group-item">
       Clubes Desativados: <?php echo $nClubInativo; ?>
      </li>
     </div>
    </div>
    <!--<div class="info-box">
     <a data-toggle="modal" data-target="#ImportaXLS">
      <span class="info-box-icon btn-warning"><i class="fa fa-upload"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Importar Associados (XLS)</h4></div>
    </div>-->
   </div>
   <div class="col-xs-4">
    <div class="box box-primary">
     <div class="box-header with-border">
      <h3 class="box-title">Equipe Distrital</h3>
     </div>
     <?php
      $Equipe = "SELECT * FROM icbr_equipeDistrital WHERE Distrito='$Distrito'";
       $qryEquipe = $PDO->prepare($Equipe);
       $qryEquipe->execute();
      ?>
     <div class="box-body">
      <ul class="products-list product-list-in-box">
      <?php while ($equipe = $qryEquipe->fetch(PDO::FETCH_ASSOC)): ?>
       <li class="item">
        <a href="#" class="product-title"><?php echo $equipe['Membro']; ?></a>
         <span class="product-description"><?php echo $equipe['Cargo']; ?>
         </span>
       </li>
       <?php endwhile; ?>
      </ul>
     </div>
    </div>
   </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once '../footer.php'; 
?>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>


<!-- Bootstrap 3.3.6 -->
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Genero', 'Quantidade'],
          ['Masculino',     <?php echo $AtMas; ?>],
          ['Feminino',      <?php echo $AtFem; ?> ]
        ]);
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Genero', 'Quantidade'],
          ['Masculino',     <?php echo $InaMas; ?>],
          ['Feminino',      <?php echo $InaFem; ?> ]
        ]);
        var chart = new google.visualization.PieChart(document.getElementById('chartInativo'));
        chart.draw(data);
      }
    </script>

</body>
</html>