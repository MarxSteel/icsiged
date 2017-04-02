<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cClubes = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
$QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssCargo, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
$stmt = $PDO->prepare($QueryClubes);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta http-equiv="Content-Language" content="pt-br">
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
  <h1>Cadastro de Associados - Importar arquivo de Associados
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <?php
    if($PrivAssociado === '1'){
   ?> 
    <div class="col-md-6 col-xs-12">
     <div class="box box-danger">
      <div class="box-header with-border">
       <h3 class="box-title">Video-Tutoriais</h3>
      </div>
      <div class="box-body no-padding">
       <ul class="users-list clearfix">
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">TITULO</a>
         <span class="users-list-date">VIDEO 1</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">TITULO</a>
         <span class="users-list-date">VIDEO 2</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">TITULO</a>
         <span class="users-list-date">VIDEO 3</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">TITULO</a>
         <span class="users-list-date">VIDEO 4</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">NOME</a>
         <span class="users-list-date">PDF 1</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">NOME</a>
         <span class="users-list-date">PDF 2</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">NOME</a>
         <span class="users-list-date">PDF 3</span>
        </li>
        <li>
         <img src="../dist/img/boxed-bg.jpg" width="50%" alt="Vídeo 1">
          <a class="users-list-name" href="#">NOME</a>
         <span class="users-list-date">PDF 4</span>
        </li>
       </ul>
      </div>
     </div>
    </div>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#ListaClube">
      <span class="info-box-icon bg-purple"><i class="fa fa-search"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Listar Clubes e Códigos do Seu Distrito</h4></div>
    </div>
   </div>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#Importar">
      <span class="info-box-icon btn-info"><i class="fa fa-plus"></i></span>
     </a>
     <div class="info-box-content"><br /><h4>Importar Lista Agora</h4></div>
    </div>
   </div>
   <div class="col-xs-12">
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
    $("#ListaClubes").DataTable();
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
</body>
</html>
