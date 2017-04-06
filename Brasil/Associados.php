<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cAssociados = "active";
$Submenu = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
 $QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento, icbr_AssDistrito FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
  $stmt = $PDO->prepare($QueryClubes);
  $stmt->execute();

 $QryAssI = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento, icbr_AssDistrito FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='I' ORDER BY icbr_AssNome ASC";
  $AssI = $PDO->prepare($QryAssI);  //AQUI CHAMO ASSOCIADOS DESLIGADOS
  $AssI->execute();
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
  <h1>Cadastro de Associados
   <small><strong>MDIO</strong> Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs pull-right"> 
      <li class="active"><a href="#ativos" data-toggle="tab">Associados Ativos</a></li>
      <li><a href="#inativos" data-toggle="tab">Associados Inativos</a></li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="ativos">
       <div class="box-header">
        <h3 class="box-title">Lista de Associados <strong>ATIVOS</strong></h3>
       </div>
       <div class="box-body">
        <table id="AssAtivo" class="table table-bordered table-striped table-responsive">
         <thead>
          <tr>
           <th width="40%">Nome</th>
           <th width="15%">Dt. Nascimento</th>
           <th width="20%">Interact Clube de</th>
           <th width="10%">Distrito</th>
           <th width="15%"></th>
          </tr>
         </thead>
         <tbody>
          <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
           <td><?php echo $user['icbr_AssNome'] ?></td>
           <td><?php echo $user['icbr_AssDtNascimento'] ?></td>
           <td><?php echo $user['icbr_AssClube'] ?></td>
           <?php
           $LinkUser = $user['icbr_uid'];
           ?>
           <td><?php echo $user['icbr_AssDistrito'] ?></td>
           <td>
            <a class="btn btn-info btn-xs" href="javascript:abrir('VerSocio.php?ID=<?php echo $LinkUser; ?>');">
             <i class="fa fa-search"></i>
            </a>
            </a>
           </td>
          </tr>
          <?php endwhile; ?>
         </tbody>
        </table>
       </div>
      </div>
      <div class="tab-pane" id="inativos">
       <div class="box-header">
        <h3 class="box-title">Lista de Associados <strong>INATIVOS</strong></h3>
       </div>
       <div class="box-body">
        <table id="AssInativo" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th width="40%">Nome</th>
           <th width="15%">Dt. Nascimento</th>
           <th width="20%">Interact Clube de</th>
           <th width="10%">Distrito</th>
           <th width="15%"></th>
          </tr>
         </thead>
         <tbody>
          <?php while ($Ain = $AssI->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <?php $LinkUserIn = $Ain['icbr_uid']; ?>
           <td><?php echo $Ain['icbr_AssNome'] ?></td>
           <td><?php echo $Ain['icbr_AssDtNascimento'] ?></td>
           <td><?php echo $Ain['icbr_AssClube'] ?></td>
           <td><?php echo $Ain['icbr_AssDistrito'] ?></td>
           <td>
            <a class="btn btn-info btn-sm" href="javascript:abrir('VerSocio.php?ID=<?php echo $LinkUserIn; ?>');">
             <i class="fa fa-search"></i> Ver Perfil
            </a>                          
           </td>
          </tr>
          <?php endwhile; ?>
         </tbody>
        </table>
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
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $('#AssAtivo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
    $('#AssInativo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>
</body>
</html>