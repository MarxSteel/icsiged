<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistrito = "active";
$Submenu = "active";
$PDO = db_connect();
require_once '../QueryUser.php';


$D = $Distrito;
$dDistrito = $PDO->prepare("SELECT * FROM distrito WHERE distrito='$D'");
 $dDistrito->execute();
 $ddd = $dDistrito->fetch();
  $RDI = $ddd['RDI'];
  $SDI = $ddd['SDI'];

  //CHAMANDO DADOS DO RDI
   $DadosRDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$RDI'");
   $DadosRDI->execute();
    $RRDI = $DadosRDI->fetch();
     $NomeRDI = $RRDI['icbr_AssNome'];
     $FotoRDI = $RRDI['icbr_AssFoto'];
  //CHAMANDO DADOS DO RDI
   $DadosSDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$SDI'");
   $DadosSDI->execute();
    $RSDI = $DadosSDI->fetch();
     $NomeSDI = $RSDI['icbr_AssNome'];
     $FotoSDI = $RSDI['icbr_AssFoto'];



$AM = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$Distrito' AND icbr_AssGenero='M'")->fetchColumn();
$AF = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$Distrito' AND icbr_AssGenero='F'")->fetchColumn();
$QtComunidades = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='COMUNIDADES'")->fetchColumn();
$QtInternos = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNOS'")->fetchColumn();
$QtInternacionais = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNACIONAIS'")->fetchColumn();
$QtFinancas = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='FINANCAS'")->fetchColumn();
$QtIP = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='IMAGEM PUBLICA'")->fetchColumn();



 $Associados = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$D'")->fetchColumn();
 $AsI = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='I' AND icbr_AssDistrito = '$D'")->fetchColumn();
 $Clubes = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito = '$D'")->fetchColumn();
 $Projetos = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_Distrito = '$D'")->fetchColumn();




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
 <link rel="stylesheet" href="../dist/css/AdminLTE.css">
 <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Avenida', 'Quantidade'],
          ['Comunidades',     <?php echo $QtComunidades; ?>],
          ['Imagem Pública',     <?php echo $QtIP; ?>],
          ['Finanças',     <?php echo $QtFinancas; ?>],
          ['Internos',     <?php echo $QtInternos; ?>],
          ['Internacionais',    <?php echo $QtInternacionais; ?>]
        ]);

        var options = {
        legend: 'none',
        pieSliceText: 'label',
          pieHole: 0.2,
          slices: {
            0: { color: '#0088ff' },
            1: { color: '#ff0033' },
            2: { color: '#aadd22' },
            3: { color: '#ff7700' },
            4: { color: '#9911aa' }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('listaProjetos'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gênero', 'Quantidade'],
          ['Feminino',   <?php echo $AF; ?>],
          ['Masculino',     <?php echo $AM; ?>]
        ]);

        var options = {
        legend: 'true',
        pieSliceText: 'label',
          pieHole: 0.4,
          slices: {
            0: { color: '#cc2288' },
            1: { color: '#0ebeff' }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('associados'));
        chart.draw(data, options);
      }
    </script>

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
   <div class="col-md-4 col-xs-12">
    <div class="box box-widget widget-user">
     <div class="box-body">
      <div class="col-sm-4 border-right">
       <div class="description-block">
        <h5 class="description-header"><?php echo $Clubes; ?></h5>
        <span class="description-text">CLUBES</span>
       </div>
      </div>
      <div class="col-sm-4 border-right">
       <div class="description-block">
        <h5 class="description-header"><?php echo $Associados; ?></h5>
        <span class="description-text">ASSOCIADOS</span>
       </div>
      </div>
      <div class="col-sm-4">
       <div class="description-block">
        <h5 class="description-header"><?php echo $Projetos; ?></h5>
        <span class="description-text">PROJETOS</span>
       </div>
      </div>
     </div>
    </div>
    <div class="box box-widget widget-user-2">
     <div class="widget-user-header shazam-azul">
      <div class="widget-user-image">
        <img class="img-circle" src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="<?php echo $NomeRDI; ?>">
      </div>
      <h5><?php echo $NomeRDI; ?></h5>
      <h5 class="widget-user-desc">Representante Distrital</h5>
     </div> 
    </div>
   </div>
   <div class="col-md-4 col-xs-12">
    <div class="box box-solid">
      <div class="box-body">
       <div class="row">
        <div class="col-md-12">
         <div class="chart-responsive">
          <div id="associados"></div>
         </div>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
        <div class="info-box2 bg-aqua">
         <span class="info-box-mini"><img src="../dist/img/icons/boy.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">MASCULINO</span>
           <span class="info-box-number"><?php echo $AM; ?> Associados</span>
          </div>
         </div>
        </li>
        <li>
        <div class="info-box2 bg-maroon">
         <span class="info-box-mini"><img src="../dist/img/icons/girl.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">FEMININO</span>
           <span class="info-box-number"><?php echo $AF; ?> Associados</span>
          </div>
         </div>
        </li>
       </ul>
      </div> 
     </div>
   </div>
   <div class="col-md-4 col-xs-12">
    <div class="box box-solid">
      <div class="box-body">
       <div class="row">
        <div class="col-md-12">
         <div class="chart-responsive">
          <div id="listaProjetos"></div>
         </div>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
         <div class="info-box2 shazam-verde">
          <span class="info-box-icon5"><i class="fa fa-money"></i></span>
           <div class="info-box-content3"><strong>FINANÇAS</strong>
           <i class="pull-right"><?php echo $QtFinancas; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-vermelho">
          <span class="info-box-icon5"><i class="fa fa-laptop"></i></span>
           <div class="info-box-content3"><strong>IMAGEM PÚBLICA</strong>
           <i class="pull-right"><?php echo $QtIP; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-azul">
          <span class="info-box-icon5"><i class="fa fa-child"></i></i></span>
           <div class="info-box-content3"><strong>COMUNIDADES</strong>
           <i class="pull-right"><?php echo $QtComunidades; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-roxo">
          <span class="info-box-icon5"><i class="glyphicon glyphicon-globe"></i></span>
           <div class="info-box-content3"><strong>INTERNACIONAIS</strong>
           <i class="pull-right"><?php echo $QtInternacionais; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-laranja">
          <span class="info-box-icon5"><i class="fa fa-heartbeat"></i></span>
           <div class="info-box-content3"><strong>INTERNOS</strong>
           <i class="pull-right"><?php echo $QtInternos; ?> PROJETOS</i>
           </div>
          </div>
        </li>
       </ul>
      </div> 
     </div>
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
<script src="../plugins/morris/morris.min.js"></script>

<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'chartAvenida',
      resize: true,
      colors: ["#0088ff", "#ff0033", "#aadd22", "#ff7700", "#9911aa"],
      data: [
        {label: "Comunidades", value: <?php echo $QtComunidades; ?>},
        {label: "Imagem Pública", value: <?php echo $QtIP; ?>},
        {label: "Finanças", value: <?php echo $QtFinancas; ?>},
        {label: "Internos", value: <?php echo $QtInternos; ?>},
        {label: "Internacionais", value: <?php echo $QtInternacionais; ?>}
      ],
      hideHover: 'auto'
    });

  });
</script>



</body>
</html>