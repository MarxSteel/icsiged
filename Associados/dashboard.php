<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cAssociados = "active";
$Submenu = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
if ($Distrito === "9999"){
 $QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento, icbr_AssDistrito FROM icbr_associado WHERE  icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
 $stmt = $PDO->prepare($QueryClubes);
 $stmt->execute();

 $QryAssI = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento, icbr_AssDistrito FROM icbr_associado WHERE  icbr_AssStatus='I' ORDER BY icbr_AssNome ASC";
 $AssI = $PDO->prepare($QryAssI);  //AQUI CHAMO ASSOCIADOS DESLIGADOS
 $AssI->execute();
}
else{
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
 $QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
  $stmt = $PDO->prepare($QueryClubes);
  $stmt->execute();

 $QryAssI = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='I' ORDER BY icbr_AssNome ASC";
  $AssI = $PDO->prepare($QryAssI);  //AQUI CHAMO ASSOCIADOS DESLIGADOS
  $AssI->execute();
}
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
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <?php
    if($PrivAssociado === '1'){
   ?> 
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#NovoSocio">
      <span class="info-box-icon btn-primary"><i class="fa fa-plus"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Cadastrar Associado</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="../Manuais/dashboard.php" target="_blank">
      <span class="info-box-icon bg-navy"><i class="fa fa-question"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Manuais</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#ImportaXLS">
      <span class="info-box-icon btn-warning"><i class="fa fa-upload"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Importar Associados (XLS)</h4></div>
    </div>
   </div>
   <div class="col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs pull-right"> 
     <li> 
      <button type="button" class="btn btn-block btn-warning" onclick="location. href= 'ModeloSocioExcel.xls' " target="_blank">
       <i class="fa fa-download"></i> Baixar Modelo de Planilha (.XLS)</button>
      <li class="active"><a href="#ativos" data-toggle="tab">Associados Ativos</a></li>
      <li><a href="#inativos" data-toggle="tab">Associados Inativos</a></li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="ativos">
       <div class="box-header">
        <h3 class="box-title">Lista de Associados <strong>ATIVOS</strong> do <strong>Distrito <?php echo $Distrito; ?></strong></h3>
       </div>
       <div class="box-body">
        <table id="AssAtivo" class="table table-bordered table-striped table-responsive">
         <thead>
          <tr>
           <?php
            if ($Distrito === "9999") { ?>
             
             <th>Nome</th>
             <th>Data de Nascimento</th>
             <th>Interact Clube de</th>
             <th>Distrito</th>
             <th></th>
            <?php
            }
            else{ ?>
           
           <th width="40%">Nome</th>
           <th width="15%">Dt. Nascimento</th>
           <th width="20%">Interact Clube de</th>
           <th width="25%"></th>
           <?php } ?>
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
            if ($Distrito === "9999") { ?>
           <td><?php echo $user['icbr_AssDistrito'] ?></td>
           <?php }
           else{

           }
?>
           <td>
            <a class="btn btn-info btn-xs" href="javascript:abrir('VerSocio.php?ID=<?php echo $LinkUser; ?>');">
             <i class="fa fa-search"></i>
            </a>
            <a class="btn btn-info btn-xs bg-navy" href="javascript:abrir('PrintUser.php?ID=<?php echo $LinkUser; ?>');">
             <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-danger btn-xs" href="javascript:abrir('DesativaAssociado.php?ID=<?php echo $LinkUser; ?>');">
             <i class="fa fa-remove"></i>
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
        <h3 class="box-title">Lista de Clubes <strong>INATIVOS</strong> do <strong>Distrito <?php echo $Distrito; ?></strong></h3>
       </div>
       <div class="box-body">
        <table id="clubesInativo" class="table table-bordered table-striped">
         <thead>
          <tr>
           <th width="40%">Nome</th>
           <th width="15%">Dt. Nascimento</th>
           <th width="20%">Interact Clube de</th>
           <th width="25%"></th>
          </tr>
         </thead>
         <tbody>
          <?php while ($Ain = $AssI->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <?php $LinkUserIn = $Ain['icbr_uid']; ?>
           <td><?php echo $Ain['icbr_AssNome'] ?></td>
           <td><?php echo $Ain['icbr_AssDtNascimento'] ?></td>
           <td><?php echo $Ain['icbr_AssClube'] ?></td>
           <td>
            <a class="btn btn-info btn-sm" href="javascript:abrir('VerSocio.php?ID=<?php echo $LinkUserIn; ?>');">
             <i class="fa fa-search"></i> Ver Perfil
            </a>                          
            <a class="btn btn-success btn-sm" href="javascript:abrir('Reintegra.php?ID=<?php echo $LinkUserIn; ?>');">
             <i class="fa fa-refresh"> Reintegrar Associado</i>
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
<script src="../plugins/select2/select2.full.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#Assinativo").DataTable();
    $('#AssAtivo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
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
    <script type="text/javascript">
    $(function(){
      $('#cod_estados').change(function(){
        if( $(this).val() ) {
          $('#cod_cidades').hide();
          $('.carregando').show();
          $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value=""></option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
            } 
            $('#cod_cidades').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
        }
      });
    });
    </script>
</body>
</html>