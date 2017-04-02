<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cTesouraria = "active";
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


</head>
<body class="hold-transition skin-blue-light fixed sidebar-mini">
<div class="wrapper">
 <header class="main-header">
  <a href="../#" class="logo">
   <span class="logo-mini"><img src="../dist/img/logo/ICLogoMin.png" width="50"/></span>
   <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="180" /></span>
  </a>
  <nav class="navbar navbar-static-top">
   <a href="../#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Minizar Navegação</span>
   </a>
   <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
     <li class="dropdown user user-menu">
      <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
       <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
      </a>
      <ul class="dropdown-menu">
       <li class="user-header">
        <p><?php echo $NomeUserLogado; ?></p>
       </li>
       <li class="user-footer">
        <div class="pull-left">
         <a href="../user/perfil.php" class="btn btn-info">Dados de Perfil</a>
        </div>
        <div class="pull-right">
         <a href="../logout.php" class="btn btn-danger">Sair</a>
        </div>
       </li>
      </ul>
     </li>
     <li>
       <a href="../logout.php" class="btn btn-danger btn-flat">Sair</a>
     </li>
    </ul>
    </div>
    </nav>
  </header>
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Cadastro de Clubes
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <?php
    if($PrivClubes === '1'){
   ?> 
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#NovoClub">
      <span class="info-box-icon btn-primary"><i class="fa fa-plus"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Adicionar Club</h4></div>
    </div>
   </div>
   <div class="col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs pull-right">
      <li class="active"><a href="#ativos" data-toggle="tab">Clubes Ativos</a></li>
      <li><a href="#inativos" data-toggle="tab">Clubes Inativos</a></li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="ativos">
       <div class="box-header">
        <h3 class="box-title">Lista de Clubes <strong>ATIVOS</strong> do <strong>Distrito <?php echo $Distrito; ?></strong></h3>
       </div>
       <div class="box-body">
        <table id="clubesAtivo" class="table table-bordered table-striped">
         <thead>
          <tr>
           <td width="10%"><strong>ID</strong></td>
           <td width="35%"><strong>Interact Club de:</strong></td>
           <td width="35%"><strong>Reuni&otilde;es</strong></td>
           <td width="20%"></td>
          </tr>
         </thead>
        <tbody>
         <?php
          $ClubeAtivo = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_Status='A'";
           $ChamaAtivo = $PDO->prepare($ClubeAtivo);
           $ChamaAtivo->execute();
            while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
            echo '<tr>';
            echo '<td>' . $at["icbr_id"] . '</td>';
            echo '<td>' . $at["icbr_Clube"] . '</td>';
            echo '<td>' . $at["icbr_Semana"] . ' - ' . $at["icbr_Horario"] . ' (' . $at["icbr_Periodo"] . ')</td>';
            echo '<td>';
             echo '<a class="btn btn-info btn-xs" href="javascript:abrir(';
             echo "'vClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-search"></i> VISUALIZAR</a>&nbsp;';
             echo '<a class="btn btn-danger btn-xs" href="javascript:abrir(';
             echo "'InativaClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-thumbs-down"></i> INATIVAR</a>&nbsp;';
            echo "</td>";
            echo '</tr>';
            endwhile;
         ?>
        </tbody>
         <tfoot>
          <tr>
           <td><strong>ID</strong></td>
           <td><strong>Interact Club de:</strong></td>
           <td><strong>Reuni&otilde;es</strong></td>
           <td></td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>
      <div class="tab-pane" id="inativos">
       <div class="box-header">
        <h3 class="box-title">Lista de Clubes <strong>INATIVOS</strong> do <strong>Distrito <?php echo $Distrito; ?></strong></h3>
       </div>
       <div class="box-body">
        <table id="clubesInativo" class="table table-bordered table-striped">
         <thead>
          <tr>
           <td width="10%"><strong>ID</strong></td>
           <td width="35%"><strong>Interact Club de:</strong></td>
           <td width="35%"><strong>Reuni&otilde;es</strong></td>
           <td width="20%"></td>
          </tr>
         </thead>
        <tbody>
         <?php
          $ClubeAtivo = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_Status='D'";
           $ChamaAtivo = $PDO->prepare($ClubeAtivo);
           $ChamaAtivo->execute();
            while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
            echo '<tr>';
            echo '<td>' . $at["icbr_id"] . '</td>';
            echo '<td>' . $at["icbr_Clube"] . '</td>';
            echo '<td>' . $at["icbr_Semana"] . ' - ' . $at["icbr_Horario"] . ' (' . $at["icbr_Periodo"] . ')</td>';
            echo '<td>';
             echo '<a class="btn btn-info btn-xs" href="javascript:abrir(';
             echo "'vClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-search"></i> VISUALIZAR</a>&nbsp;';
             echo '<a class="btn btn-success btn-xs" href="javascript:abrir(';
             echo "'ReativaClube.php?ID=" . $at['icbr_id'] . "');";
             echo '"><i class="fa fa-thumbs-up"></i> REATIVAR</a>&nbsp;';
            echo "</td>";
            echo '</tr>';
            endwhile;
         ?>
        </tbody>
         <tfoot>
          <tr>
           <td><strong>ID</strong></td>
           <td><strong>Interact Club de:</strong></td>
           <td><strong>Reuni&otilde;es</strong></td>
           <td></td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>
     </div>
   </div>
   <?php
    }
    else {
     echo '<div class="col-xs-12">';
     echo '<div class="info-box">';
     echo '<div class="alert alert-danger alert-dismissible">';
     echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
     echo '<h4><i class="icon fa fa-ban"></i>Erro!</h4>';
     echo '<h3> Você não tem privilégios suficientes para abrir esta página</h3>';
     echo '</div>';
     echo '</div>';
     echo '</div>';
    }
    ?>
  </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php 
include_once 'ModalDados.php';
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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#clubesAtivo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#clubesInativo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
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
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
</body>
</html>
