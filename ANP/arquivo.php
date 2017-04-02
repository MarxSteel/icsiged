<?php
require("../restritos.php"); 
require_once '../init.php';
$cANP = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
include_once '../Clubes/ValidaClube.php';
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
  <h1>Arquivo Nacional de Projetos
   <small><?php echo "<strong> MDIO Interact Brasil</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box box-danger color-palette-box">
     <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-file-text"></i> Lista Geral de Projetos</h3>
     </div>
     <div class="box-body">
      <table id="ListaProjetos" class="table table-bordered table-striped">
       <thead>
        <tr>
         <td width="10%"><strong>ID</strong></td>
          <td width="15%"><strong>Avenida</strong></td>
          <td width="20%"><strong>Nome do Projeto</strong></td>
          <td width="20%"><strong>Clube</strong></td>
          <td width="20%"><strong>Andamento do Projeto</strong></td>
          <td width="15%"></td>
        </tr>
       </thead>
       <tbody>
        <?php
         $ClubeAtivo = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito'";
          $ChamaAtivo = $PDO->prepare($ClubeAtivo);
          $ChamaAtivo->execute();
          while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
          echo '<tr>';
           echo '<td>' . $at["id"] . '</td>';
           echo '<td>' . $at["pro_avenida"] . '</td>';
           echo '<td>' . $at["pro_nome"] . '</td>';
           echo '<td>';
           $codClube = $at["pro_clube"];
            $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube'");
            $Dados->execute();
            $Qry = $Dados->fetch();
           echo $Qry['icbr_Clube'];
           echo '</td>';
            $StatusProjeto = $at["pro_and"];
            /*
            ANDAMENTO DO PROJETO:
            1 - PLANEJAMENTO
            2 - EXECUÇÃO
            3 - FINALIZADO
            */
             if ($StatusProjeto === '1') {
               echo '
               <td>
                <div class="bg-blue-active color-palette" align="middle">
                 <span>PLANEJAMENTO</span>
                </div>
               </td>';
             }
             elseif ($StatusProjeto === "2") {
               echo '
               <td>
                <div class="bg-orange-active color-palette" align="middle">
                 <span>EXECU&Ccedil;&Atilde;O</span>
                </div>
               </td>';
             }
             elseif ($StatusProjeto === "3") {
               echo '
               <td>
                <div class="bg-green-active color-palette" align="middle">
                 <span>FINALIZADO</span>
                </div>
               </td>';
             }
             else{
             }
            echo '<td>';
             echo '<a class="btn btn-info btn-xs btn-block" href="javascript:abrir(';
             echo "'vProjeto.php?ID=" . $at['id'] . "');";
             echo '"><i class="fa fa-search"></i> Visualizar</a>';
            echo "</td>"; 
          echo '</tr>';
          endwhile;
        ?>
       </tbody>
       <tfoot>
        <tr>
         <td><strong>ID</strong></td>
         <td><strong>Avenida</strong></td>
         <td><strong>Nome do Projeto</strong></td>
         <td><strong>Clube</strong></td>
         <td><strong>Andamento do Projeto</strong></td>
         <td></td>
        </tr>
       </tfoot>
      </table>
     </div>
    </div>

   </div>
  </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<?php include_once '../footer.php'; ?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#ListaProjetos").DataTable();
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
