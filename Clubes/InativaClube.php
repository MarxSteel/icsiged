<?php
require("../restritos.php"); 
require_once '../init.php';
$codClube = $_GET['ID']; 
$PDO = db_connect();
require_once '../QueryUser.php';
require_once 'ValidaClube.php';
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
         <a class="pull-right"><?php echo $clubeRotary; ?></i></a>
        </li>
        <li class="list-group-item">
         <b>Data de Fundação:</b> 
         <a class="pull-right"><?php echo $clubeDataFundado; ?></strong></i></a>
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
       <div class="col-xs-12">
        <h2>DESEJA REALMENTE INATIVAR CLUBE ?</h2>
       </div>
       <form name="ReativaClube" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-12">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="col-xs-12"><br />
         <input name="ReativaClube" type="submit" class="btn btn-danger btn-lg btn-block" value="SIM, DESATIVAR CLUBE"  />
        </div>
       </form>
       <?php 
        if(@$_POST["ReativaClube"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $RotaryPadrinho = $_POST['RCPadrinho'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_Status='D' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/javascript">alert("Clube Desativado com Sucesso!");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL DESATUVAR O CLUBE. TIRE UM PRINT DESTA MENSAGEM E ENTRE EM CONTATO COM O ADMINISTRADOR");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
       </div>  
      </li>
      </div>
      </div>
     </div>
    </section>
  </div>
 </div><?php include_once '../footer.php'; ?></div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
</body>
</html>
