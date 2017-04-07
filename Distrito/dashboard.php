<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistrito = "active";
$Submenu = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
include_once 'cargosDistrito.php';


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

$QyQtCom = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='COMUNIDADES'";
 $QryQtCom = $PDO->prepare($QyQtCom); 
 $QryQtCom->execute(); 
$QtComunidades = $QryQtCom->fetchColumn(); 

$QyQtInt = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNOS'";
 $QryQtInt = $PDO->prepare($QyQtInt);
 $QryQtInt->execute();
 $QtInternos = $QryQtInt->FetchColumn();



$QyQtItt = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNACIONAIS'";
 $QryQtIt = $PDO->prepare($QyQtItt);
 $QryQtIt->execute();
 $QtInternacionais = $QryQtIt->FetchColumn();

$QyQtFinn = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='FINANCAS'";
 $QryQtFinn = $PDO->prepare($QyQtFinn);
 $QryQtFinn->execute();
 $QtFinancas = $QryQtFinn->FetchColumn();

$QyQtPIP = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='IMAGEM PUBLICA'";
 $QryQtPIP = $PDO->prepare($QyQtPIP);
 $QryQtPIP->execute();
 $QtIP = $QryQtPIP->FetchColumn();


 $Associados = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$D'")->fetchColumn();
 $Clubes = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito = '$D'")->fetchColumn();

$QyQtPjto = "SELECT COUNT(*) FROM icbr_projeto WHERE pro_Distrito = '$D'";
 $QryQtPjto = $PDO->prepare($QyQtPjto);
 $QryQtPjto->execute();
 $Projetos = $QryQtPjto->FetchColumn();
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
        legend: 'true',
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
    <div class="info-box">
      <a href="javascript:abrir('GerenciaEquipe.php');">
      <span class="info-box-icon bg-white"><img src="../dist/img/icons/lecture.png" ></span>
     </a>
     <div class="info-box-content"><br /><h4>Gerenciar Equipe Distrital</h4></div>
    </div>
    <div class="info-box">
     <a data-toggle="modal" data-target="#EstSocios">
      <span class="info-box-icon bg-white"><img src="../dist/img/icons/studying.png" ></span>
     </a>
     <div class="info-box-content"><br /><h4>Estatísticas de Associados</h4></div>
    </div>
    <div class="info-box">
     <a data-toggle="modal" data-target="#PROJETOS">
      <span class="info-box-icon bg-white"><img src="../dist/img/icons/calculation.png" ></span>
     </a>
     <div class="info-box-content"><br /><h4>Estatísticas de Projetos</h4></div>
    </div>
   </div>


 <div class="col-md-8 col-xs-12">
 <!-- TABELA POR ABAS -->
  <div class="nav-tabs-custom">
   <ul class="nav nav-tabs">
    <li class="active"><a href="#clubes" data-toggle="tab">Clubes</a></li>
    <li><a href="#equipe" data-toggle="tab">Equipe Distrital</a></li>
    <li><a href="#projetos" data-toggle="tab">Projetos</a></li>
   </ul>
   <div class="tab-content">
    <div class="tab-pane" id="equipe">
     <b>EQUIPE DISTRITAL</b>
      <ul class="users-list clearfix">
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="<?php echo $NomeRDI; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeRDI; ?></a>
         <span class="users-list-date">RDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoSDI; ?>" alt="<?php echo $NomeSDI; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeSDI; ?></a>
         <span class="users-list-date">SDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoTDI; ?>" alt="<?php echo $NomeTDI; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeTDI; ?></a>
         <span class="users-list-date">TDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoPDI; ?>" alt="<?php echo $NomePDI; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomePDI; ?></a>
         <span class="users-list-date">PDI</span>
       </li>
       <?php if ($DDP1 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP1; ?>" alt="<?php echo $NomeDDP1; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP1; ?></a>
         <span class="users-list-date">DDP1</span>
       </li>
       <?php } else { } if ($DDP2 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP2; ?>" alt="<?php echo $NomeDDP2; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP2; ?></a>
         <span class="users-list-date">DDP2</span>
       </li>
       <?php } else { } if ($DDP3 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP3; ?>" alt="<?php echo $NomeDDP3; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP3; ?></a>
         <span class="users-list-date">DDP3</span>
       </li>
       <?php } else { } if ($DDP4 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP4; ?>" alt="<?php echo $NomeDDP4; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP4; ?></a>
         <span class="users-list-date">DDP4</span>
       </li>
       <?php } else { } if ($IP1 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP1; ?>" alt="<?php echo $NomeIP1; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP1; ?></a>
         <span class="users-list-date">IP1</span>
       </li>
       <?php } else { } if ($IP2 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP2; ?>" alt="<?php echo $NomeIP2; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP2; ?></a>
         <span class="users-list-date">IP2</span>
       </li>
       <?php } else { } if ($IP3 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP3; ?>" alt="<?php echo $NomeIP3; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP3; ?></a>
         <span class="users-list-date">IP3</span>
       </li>
       <?php } else { } if ($IP4 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP4; ?>" alt="<?php echo $NomeIP4; ?>" width="120px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP4; ?></a>
         <span class="users-list-date">IP4</span>
       </li>
       <?php } else { } ?>
      </ul>
    </div>
    <div class="tab-pane active" id="clubes">
    <!-- TABELA DE CLUBES ATIVOS DO DISTITO -->
     <table id="tabelaClubes" class="table table-bordered table-striped">
      <thead>
       <tr>
        <th>Clube</th>
        <th>Reunião</th>
        <th>E-Mail</th>
        <th></th>
       </tr>
      </thead>
      <tbody>
       <?php
        $ClubesDistrito = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$D' and icbr_Status='A'";
         $ChamaClube = $PDO->prepare($ClubesDistrito);
         $ChamaClube->execute();
          while ($Cl = $ChamaClube->fetch(PDO::FETCH_ASSOC)):
          echo '
       <tr>
        <td>'. $Cl["icbr_Clube"] .'</td>
        <td>'. $Cl["icbr_Semana"] .', '.  $Cl["icbr_Horario"]   . '('. $Cl["icbr_Periodo"] .')</td>
        <td> '. $Cl["icbr_ProjetoEmail"] .' </td>';
            echo '<td>';
             echo '<a class="btn btn-default btn-xs" href="javascript:abrir(';
             echo "'../Clubes/VerClube.php?ID=" . $Cl['icbr_id'] . "');";
             echo '"><i class="fa fa-search"></i> VISUALIZAR</a>&nbsp;';
            echo "</td>";
       echo '</tr>';
      endwhile;
        ?>
      </tbody>
     </table>
    <!-- FIM DA TABELA DE CLUBES -->
    </div>
    <div class="tab-pane" id="projetos">
    <!-- TABELA DE PROJETOS APROVADOS DO DISTITO -->
     <table id="tabelaProjetos" class="table table-bordered table-striped">
      <thead>
       <tr>
        <th>PROJETO</th>
        <th>AVENIDA</th>
        <th></th>
       </tr>
      </thead>
      <tbody>
       <?php
        $ProjetosDistrito = "SELECT * FROM icbr_projeto WHERE pro_distrito='$D' and pro_status='3'";
         $ChamaProjeto = $PDO->prepare($ProjetosDistrito);
         $ChamaProjeto->execute();
          while ($Pj = $ChamaProjeto->fetch(PDO::FETCH_ASSOC)):
          echo '
       <tr>
        <td>'. $Pj["pro_nome"] .'</td>
        <td>'. $Pj["pro_avenida"] .'</td>';
            echo '<td>';
             echo '<a class="btn btn-default btn-xs" href="javascript:abrir(';
             echo "'../ANP/vANP.php?ID=" . $Pj['id'] . "');";
             echo '"><i class="fa fa-search"></i> VISUALIZAR</a>&nbsp;';
            echo "</td>";
       echo '</tr>';
      endwhile;
        ?>
      </tbody>
     </table>
    <!-- FIM DA PROJETOS DE CLUBES -->
    </div>
   </div>
  </div>
 <!-- FIM DA TABELA POR ABAS -->
 </div>



  </div><!-- row -->
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once 'modalDistrito.php';
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
<script>
  $(function () {
    $("#tabelaClubes").DataTable();
    $("#tabelaProjetos").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script language="JavaScript">
function abrir(URL) {
 
  var width = 1000;
  var height = 650;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
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