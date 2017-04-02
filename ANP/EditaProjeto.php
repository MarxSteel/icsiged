<?php
require("../restritos.php"); 
require_once '../init.php';
$codProjeto = $_GET['ID']; 
$PDO = db_connect();
require_once '../QueryUser.php';
require_once 'dadosProjeto.php';
$DataAgora = date('d/m/Y H:i:s');
$teste = "teste";

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
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <style type="text/css">
  .texto {
    word-wrap: break-word;
  }
  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
 <div class="wrapper">
  <header class="main-header">
   <nav class="navbar navbar-static-top">
    <div class="container">
     <div class="navbar-header">
      <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="200"></span>
     </div>
     <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">Olá, <?php echo $NomeUserLogado; ?></span></a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
  </header> 
  <div class="content-wrapper">
   <div class="container">
    <section class="content">
     <div class="box box-default">
      <div class="box-header with-border">
       <h2 class="box-title"><strong>ID #<?php echo $codProjeto; ?></strong> - <?php echo $NomeProjeto; ?></h2>
      </div>
      <div class="box-body">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Clube:</b> 
         <a class="pull-right">Interact Club de <?php echo $ClubeProjeto . '<strong> (D. ' . $DistritoProjeto . ')</strong>'; ?></a>
        </li>
        <li class="list-group-item">
         <b>Data de Cadastro:</b> 
         <a class="pull-right"><?php echo $DataCadastro; ?></strong></i></a>
        </li>
        <li class="list-group-item">
         <b>E-Mail responsavel por projetos:</b> 
         <a class="pull-right"><?php echo $EmailClube; ?></strong></i></a>
        </li>
       </div>
       <div class="col-xs-4">
        <li class="list-group-item"><h4>CHAVE DE ACESSO:</h4><br />
         <h2><strong><code><?php echo $ChaveCry; ?></code></strong></h2>
        </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
          if ($StatusProjeto === '1') {
           echo '<div class="bg-green-active color-palette" align="middle"><span>REVISADO</span></div>';
          }
          elseif ($StatusProjeto === "2") {
           echo '<div class="bg-purple-active color-palette" align="middle"><span>AGUARDANDO REVIS&Atilde;O</span></div>';
          }
          elseif ($StatusProjeto === "3") {
           echo '<div class="bg-orange-active color-palette" align="middle"><span>PENDENTE</span></div>';
          }
          elseif ($StatusProjeto === "4") {
           echo '<div class="bg-navy-active color-palette" align="middle"><span>N&Atilde;O PREENCHIDO</span></div>';
          }
          else{
          }
         ?>        
         </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
          if ($AndamentoProjeto === '1') {
           echo '<div class="bg-olive-active color-palette" align="middle"><span>PLANEJAMENTO</span></div>';
          }
          elseif ($AndamentoProjeto === "2") {
           echo '<div class="bg-maroon-active color-palette" align="middle"><span>EM EXECU&Ccedil;&Atilde;O</span></div>';
          }
          elseif ($AndamentoProjeto === "3") {
           echo '<div class="bg-green-active color-palette" align="middle"><span>FINALIZADO</span></div>';
          }
          else{
          }
         ?>        
         </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <div class="bg-black-active color-palette" align="middle"><span><?php echo $AvenidaProjeto; ?></span></div>
        </li>
       </div> 
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
         if ($AbrangenciaProjeto === "1") {
          echo '<div class="bg-navy-active color-palette" align="middle">
                 <span>PROJETO DO CLUBE</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "2") {
           echo '<div class="bg-orange-active color-palette" align="middle">
                 <span>PROJETO MULTI-CLUBE</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "3") {
           echo '<div class="bg-red-active color-palette" align="middle">
                 <span>PROJETO DISTRITAL</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "4") {
           echo '<div class="bg-blue-active color-palette" align="middle">
                 <span>PROJETO MULTI-DISTRITAL</span>
                </div>';
         }
         ?>
        </li>
       </div> 
       <div class='col-xs-12'>HISTÓRICO DE ALTERA&Ccedil;&Otilde;ES</div> 
       <div class="col-xs-12 list-group-item">
      <table id="ListaLog" class="table table-bordered table-striped">
       <thead>
        <tr>
         <td width="10%"><strong>Cod.</strong></td>
          <td width="15%"><strong>Data</strong></td>
          <td width="20%"><strong>Usu&aacute;rio</strong></td>
          <td width="45%"><strong>Detalhe</strong></td>
          <td width="10%"></td>
        </tr>
       </thead>
       <tbody>
        <?php
         $ClubeAtivo = "SELECT * FROM log_projeto WHERE CodProjeto='$codProjeto'";
          $ChamaAtivo = $PDO->prepare($ClubeAtivo);
          $ChamaAtivo->execute();
          while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
          echo '<tr>';
           echo '<td>' . $at["id"] . '</td>';
           echo '<td>' . $at["DataCadastro"] . '</td>';
           echo '<td>' . $at["UserCadastro"] . '</td>';
           echo '<td>' . $at["NomeCodigo"] . '</td>';
           echo '<td>';
            echo '<a class="btn btn-default btn-xs btn-block" href="javascript:abrir(';
            echo "'vDetalhe.php?ID=" . $at['id'] . "');";
            echo '"><i class="fa fa-search"></i> Visualizar detalhe</a>&nbsp;';
          echo '</td>';
          echo '</tr>';
          endwhile;
        ?>
       </tbody>
       <tfoot>
        <tr>
         <td><strong>Cod</strong></td>
         <td><strong>Data</strong></td>
         <td><strong>Usu&aacute;rio</strong></td>
         <td><strong>Detalhe</strong></td>
         <td></td>
        </tr>
       </tfoot>
      </table>
       </div>
      </li>
      </div>
      </div>
     </div>
    </section>
  </div>
 </div><?php include_once '../footer.php'; ?></div>
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
    $("#ListaLog").DataTable();
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
