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
    <div class="box box-primary">
     <div class="box-header with-border">
      <h2 class="box-title"><strong>ID #<?php echo $IDProjeto; ?></strong> - <?php echo $NomeProjeto; ?></h2>
     </div>
     <div class="box-body">
      <div class="col-xs-6">
       <li class="list-group-item">
        <b>Clube:</b> 
        <a class="pull-right">Interact Club de <?php echo $ClubeProjeto . '<strong> (D. ' . $DistritoProjeto . ')</strong>'; ?></a>
       </li>
       <li class="list-group-item">
        <b>Data de Cadastro:</b> 
        <a class="pull-right"><?php echo $DataCadastro; ?></strong></i></a>
       </li>
       <li class="list-group-item">
        <b>E-Mail:</b> 
        <a class="pull-right"><?php echo $EmailClube; ?></strong></i></a>
       </li>
      </div>
      <div class="col-xs-4">
       <li class="list-group-item">
        <h4><?php echo $AvenidaProjeto; ?></h4>
       </li>
       <li class="list-group-item">
       <?php 
       if ($StatusProjeto === "1") 
       {
         echo '<button class="btn btn-warning btn-block disabled">AGUARDANDO REVISÃO</button>';
       }
       elseif ($StatusProjeto === "2") {
         echo '<button class="btn btn-danger btn-block disabled">REPROVADO</button>';
       }
       elseif ($StatusProjeto === "3") {
         echo '<button class="btn btn-success btn-block disabled">APROVADO</button>';
       }
      ?>
       </li>
      </div>
      <div class="col-xs-2">
       <li class="list-group-item">
        <a href="uploads/<?php echo $Baixar; ?>"><img src="../dist/img/pdf.jpg" alt="Baixar Imagem" width="80" /></a>
       </li>
      </div>


     </div>
    </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#fa-icons" data-toggle="tab">Linha do Tempo do Projeto</a></li>
              <li><a href="#glyphicons" data-toggle="tab">Pendências</a></li>
            </ul>
            <div class="tab-content">
             <div class="tab-pane active" id="fa-icons">
              <ul class="timeline">
              <?php
               $Equipe = "SELECT * FROM log_projeto WHERE CodProjeto='$codProjeto' ORDER BY id DESC";
                $qryEquipe = $PDO->prepare($Equipe);
                $qryEquipe->execute();
              while ($equipe = $qryEquipe->fetch(PDO::FETCH_ASSOC)): 
                $CategoriaEvento = $equipe['Codigo'];
                if ($CategoriaEvento === "12") { ?>
                 <li class="time-label"><span class="bg-red"><?php echo $equipe['DataCadastro']; ?></span></li>
                 <li>
                  <i class="fa fa-remove bg-red"></i>
                  <div class="timeline-item">
                   <h3 class="timeline-header"><a href="#"><?php echo $equipe['UserCadastro']; ?></a> Reprovou o Projeto</h3>
                   <div class="timeline-body"><?php echo $equipe['DetalheCodigo']; ?></div>
                  </div>
                 </li>
                <?php } elseif ($CategoriaEvento === "13") { ?>
               <li class="time-label"><span class="bg-yellow"><?php echo $equipe['DataCadastro']; ?></span></li>
               <li>
                <i class="fa fa-refresh bg-yellow"></i>
                <div class="timeline-item">
                 <h3 class="timeline-header"><a href="#"><?php echo $equipe['UserCadastro']; ?></a> DEVOLVIDO PARA A INTERACT BRASIL</h3>
                 <div class="timeline-body"><?php echo $equipe['DetalheCodigo']; ?></div>
                </div>
               </li>
               <?php } elseif ($CategoriaEvento === "14") { ?>
              <li class="time-label"><span class="bg-green"><?php echo $equipe['DataCadastro']; ?></span></li>
              <li>
               <i class="fa fa-check bg-green"></i>
                <div class="timeline-item">
                 <h3 class="timeline-header"><a href="#"><?php echo $equipe['UserCadastro']; ?></a> APROVOU O PROJETO PARA O ANP</h3>
                 <div class="timeline-body"><?php echo $equipe['DetalheCodigo']; ?></div>
                </div>
               </li>
               <?php } elseif ($CategoriaEvento === "11") { ?>
              <li class="time-label"><span class="bg-blue"><?php echo $equipe['DataCadastro']; ?></span></li>
              <li>
               <i class="fa fa-plus bg-blue"></i>
                <div class="timeline-item">
                 <h3 class="timeline-header"><a href="#"><?php echo $equipe['UserCadastro']; ?></a> CADASTROU O PROJETO</h3>
                 <div class="timeline-body"><?php echo $equipe['DetalheCodigo']; ?></div>
                </div>
               </li>
              <?php } else { }  endwhile; ?>
          </ul>








             </div>
             <div class="tab-pane" id="glyphicons">
teste2
             </div>
            </div>
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
