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
  $SDI = $ddd['SDI'];
  $TDI = $ddd['TDI'];
  $PDI = $ddd['PDI'];
  $DDP1 = $ddd['DDP1'];
  $DDP2 = $ddd['DDP2'];
  $DDP3 = $ddd['DDP3'];
  $DDP4 = $ddd['DDP4'];
  $IP1 = $ddd['IP1'];
  $IP2 = $ddd['IP2'];
  $IP3 = $ddd['IP3'];
  $IP4 = $ddd['IP4'];
include_once 'cargosDistrito.php';

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
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">

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
    <li class="active"><a href="#clubes" data-toggle="tab">Clubes</a></li>
    <li><a href="#equipe" data-toggle="tab">Equipe Distrital</a></li>
    <li><a href="#projetos" data-toggle="tab">Projetos</a></li>
   </ul>
   <div class="tab-content">
    <div class="tab-pane" id="equipe">
     <b>EQUIPE DISTRITAL</b>
      <ul class="users-list clearfix">
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="<?php echo $NomeRDI; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeRDI; ?></a>
         <span class="users-list-date">RDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoSDI; ?>" alt="<?php echo $NomeSDI; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeSDI; ?></a>
         <span class="users-list-date">SDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoTDI; ?>" alt="<?php echo $NomeTDI; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeTDI; ?></a>
         <span class="users-list-date">TDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoPDI; ?>" alt="<?php echo $NomePDI; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomePDI; ?></a>
         <span class="users-list-date">PDI</span>
       </li>
       <?php if ($DDP1 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP1; ?>" alt="<?php echo $NomeDDP1; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP1; ?></a>
         <span class="users-list-date">DDP1</span>
       </li>
       <?php } else { } if ($DDP2 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP2; ?>" alt="<?php echo $NomeDDP2; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP2; ?></a>
         <span class="users-list-date">DDP2</span>
       </li>
       <?php } else { } if ($DDP3 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP3; ?>" alt="<?php echo $NomeDDP3; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP3; ?></a>
         <span class="users-list-date">DDP3</span>
       </li>
       <?php } else { } if ($DDP4 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoDDP4; ?>" alt="<?php echo $NomeDDP4; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeDDP4; ?></a>
         <span class="users-list-date">DDP4</span>
       </li>
       <?php } else { } if ($IP1 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP1; ?>" alt="<?php echo $NomeIP1; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP1; ?></a>
         <span class="users-list-date">IP1</span>
       </li>
       <?php } else { } if ($IP2 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP2; ?>" alt="<?php echo $NomeIP2; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP2; ?></a>
         <span class="users-list-date">IP2</span>
       </li>
       <?php } else { } if ($IP3 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP3; ?>" alt="<?php echo $NomeIP3; ?>" width="115px" >
         <a class="users-list-name" href="#"><?php echo $NomeIP3; ?></a>
         <span class="users-list-date">IP3</span>
       </li>
       <?php } else { } if ($IP4 <> "") { ?>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoIP4; ?>" alt="<?php echo $NomeIP4; ?>" width="115px" >
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
 <?php } ?>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once 'modalDistritos.php';
include_once '../footer.php'; 
?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script>
  $(function () {
    $("#tabelaClubes").DataTable();
    $("#tabelaProjetos").DataTable();
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
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select3").select2();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select4").select2();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select5").select2();
  });
</script>
</body>
</html>