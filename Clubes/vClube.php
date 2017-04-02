<?php
require("../restritos.php"); 
require_once '../init.php';
$codClube = $_GET['ID']; 
$PDO = db_connect();
require_once '../QueryUser.php';
require_once 'ValidaClube.php';

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
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
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
       <h2 class="box-title"><strong>#<?php echo $codClube; ?></strong>
        - Interact Club de <?php echo $clubeNome; ?></h2>
      </div>
      <div class="box-body">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Rotary Club Patrocinador:</b> 
         <a class="pull-right"><?php echo $clubeRotary; ?> </i>
          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TrocaRotary"><i class="fa fa-refresh"></i></button>
         </a>
        </li>
        <li class="list-group-item">
         <b>Data de Fundação:</b> 
         <a class="pull-right"><?php echo $clubeDataFundado; ?></strong></i>
          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DataFundacao"><i class="fa fa-refresh"></i></button>
         </a>
        </li>
        <li class="list-group-item">
         <b>Status:</b>
         <a class="pull-right">
         <?php 
          if($StatusClub === 'A')
          {
            echo '<span class="btn btn-success btn-xs btn-block">ATIVO</span>';  
          }
          elseif($StatusClub === 'D')
          {
            echo '<span class="btn bg-orange btn-xs btn-block">INATIVO</span>';  
          }
          else{
              
          }
         ?> </a>
        </li>
       </div>
       <div class="col-xs-4">
        <li class="list-group-item">
        </li>
       </div>
       <div class="col-xs-7">
       <h5>
        <button type="button" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#AlteraReuniao"><i class="fa fa-refresh"></i></button>
        INFORMAÇÕES DE REUNIÃO 
       </h5>
       <li class="list-group-item">
       <strong> LOCAL: </strong> <?php echo $LocalClube; ?><br />
        <strong>PERÍODO DE REUNIÕES: </strong> <?php echo $PeriodoClube; ?><br />
        <strong>DIA DA SEMANA: </strong> <?php echo $DiaClube; ?><br />
        <strong>HORÁRIO: </strong> <?php echo $HorarioClube; ?>
       </li>
       <h5>
        <button type="button" class="btn bg-orange btn-xs" data-toggle="modal" data-target="#AlteraEndereco"><i class="fa fa-refresh"></i></button>
        INFORMAÇÕES DE ENDERECO 
       </h5>
       <li class="list-group-item">
        <strong>ENDEREÇO: </strong> 
         <?php echo $EndClube; ?> 
        <strong>, NUM.: </strong> <?php echo $EndNClube; ?><br />
        <strong>COMPLEMENTO: </strong> <?php echo $EndComplemento; ?><br />
        <strong>BAIRRO/SETOR: </strong> <?php echo $BairroClube; ?><strong>, CEP: </strong><?php echo $CEPClube; ?><br />
        <strong>CIDADE: </strong> <?php echo $CidadeClube; ?><strong>, UF: </strong><?php echo $UFClube; ?>
       </li>
       </div>
      <div class="col-xs-5"><br >
       <li class="list-group-item">
        <b>E-Mail para Contato:</b> 
        <span class="pull-right"><?php echo $clubeMail; ?> </i>
         <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#NovoEmail"><i class="fa fa-refresh"></i></button>
        </span>
       </li>
      </div>
       <div class="col-xs-5">
        <h5>CONSELHO DIRETOR</h5>
       </div>  
      <div class="col-xs-5">
       <li class="list-group-item">
        <b>PRESIDENTE: </b>
        <span class="pull-right"><?php echo $clubePresidente; ?> </i>
         <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#NovoPres"><i class="fa fa-refresh"></i></button>
        </span>
       </li>
      </div>
      <div class="col-xs-5"><br />
       <li class="list-group-item">
        <b>SECRETÁRIO: </b> 
        <span class="pull-right"><?php echo $clubeSecretario; ?> </i>
         <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#NovoSec"><i class="fa fa-refresh"></i></button>
        </span>
       </li>
      </div>
      <div class="col-xs-5"><br />
       <li class="list-group-item">
        <b>TESOUREIRO: </b> 
        <span class="pull-right"><?php echo $clubeTesoureiro; ?> </i>
         <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#NovoTes"><i class="fa fa-refresh"></i></button>
        </span>
       </li>
      </div>
      </div>
     </div>
    </section>
  </div>
 </div>
 <?php 
 include_once 'ModalDados.php';
 include_once '../footer.php'; ?></div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>
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
</body>
</html>
