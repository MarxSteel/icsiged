<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistritos = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
$D = $_GET['RI'];
$dDistrito = $PDO->prepare("SELECT * FROM distrito WHERE distrito='$D'");
 $dDistrito->execute();
 $ddd = $dDistrito->fetch();
  $UF1 = $ddd['UF1'];
  $UF2 = $ddd['UF2'];
  $UF3 = $ddd['UF3'];
  $RDI = $ddd['RDI'];
   $DadosRDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$RDI'");
   $DadosRDI->execute();
    $RRDI = $DadosRDI->fetch();
     $NomeRDI = $RRDI['icbr_AssNome'];
     $FotoRDI = $RRDI['icbr_AssFoto'];

 $Associados = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$D'")->fetchColumn();
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
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
 <aside class="main-sidebar">
  <section class="sidebar">
   <?php include_once '../menuLateral.php'; ?>
  </section>
 </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Distrito <?php echo $D; ?>
   <small><strong>MDIO</strong> Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
 <?php if ($RDI == "") {  ?>   
  <div class="row">
   <div class="col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-orange"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
       <div class="info-box-content">
        <span class="info-box-text">Atenção</span>
         <span class="info-box-number">O Distrito não enviou informações à <i>MDIO Interact Brasil</i> </span>
       </div>
    </div>
   </div>
  </div>
 <?php } else {?>
 <div class="row">
  <div class="col-md-4 col-xs-12">
   <div class="box box-solid">  
    <div class="box-body">
    <table>
     <tbody>
      <tr>
       <td>
        <span class="info-box-mini">
         <img src="../dist/img/UF/<?php echo $UF1; ?>.png" width="50">
        </span>
       </td>
       <td class="distrito-box-estado"><?php valida_estado($UF1); ?></td>
      </tr>
      <?php if ($UF2 <> "") { ?>
      <tr>
       <td>
        <span class="info-box-mini">
         <img src="../dist/img/UF/<?php echo $UF2; ?>.png" width="50">
        </span>
       </td>
       <td class="info-box-content2"><?php valida_estado($UF2); ?></td>
      </tr>
      <?php } else {} if ($UF3 <> "") { ?>
      <tr>
       <td>
        <span class="info-box-mini">
         <img src="../dist/img/UF/<?php echo $UF3; ?>.png" width="50">
        </span>
       </td>
       <td class="info-box-content2"><?php valida_estado($UF3); ?></td>
      </tr>
     <?php } else {} ?>
    </table>
   </div>
  </div>
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
      <h5 class="widget-user-desc">RDI</h5>
    </div> 
   </div>
 </div>
 <div class="col-md-8 col-xs-12">
 <!-- TABELA POR ABAS -->
  <div class="nav-tabs-custom">
   <ul class="nav nav-tabs">
    <li class="active"><a href="#equipe" data-toggle="tab">Equipe Distrital</a></li>
    <li><a href="#clubes" data-toggle="tab">Clubes</a></li>
    <li><a href="#projetos" data-toggle="tab">Projetos</a></li>
   </ul>
   <div class="tab-content">
    <div class="tab-pane active" id="equipe">
      <b>EQUIPE DISTRITAL</b>
    </div>
    <div class="tab-pane" id="clubes">
    <!-- TABELA DE CLUBES ATIVOS DO DISTITO -->
     <table id="clubes" class="table table-bordered table-striped">
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
        <td>'. $Cl["icbr_Semana"] .', '.  $Cl["icbr_Horario"]   . '( '. $Cl["icbr_Periodo"] .' )</td>
        <td> '. $Cl["icbr_ProjetoEmail"] .' </td>';
            echo '<td>';
             echo '<a class="btn btn-default btn-xs" href="javascript:abrir(';
             echo "'../Clubes/VerClube.php?ID=" . $Cl['icbr_id'] . "');";
             echo '"><i class="fa fa-search"></i> VISUALIZAR</a>&nbsp;';
            echo "</td>";
       echo '</tr>';
      endwhile;
        ?>
       <tr>
        <td>Curitiba Norte</td>
        <td>Sábado, 14:30, Semanal</td>
        <td>meue-mail@email.com</td>
        <td> </td>
       </tr>
      </tbody>
     </table>
    <!-- FIM DA TABELA DE CLUBES -->
    </div>
    <div class="tab-pane" id="projetos">
    <!-- TABELA DE PROJETOS APROVADOS DO DISTITO -->
     <table id="projetos" class="table table-bordered table-striped">
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
 <?php } ?>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once '../footer.php'; 
?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#clubes").DataTable();
    $("#projetos").DataTable();
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
</body>
</html>