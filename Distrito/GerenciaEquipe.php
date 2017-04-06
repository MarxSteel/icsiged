<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
require_once '../QueryUser.php';
include_once 'cargosDistrito.php';
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
    <?php if ($CodigoAssociado <> $RDI) { ?>
     <div class="row">
      <div class="col-xs-12">
       <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
         <div class="info-box-content">
          <span class="info-box-text">Atenção</span>
          <span class="info-box-number">Apenas o RDI do Distrito pode fazer isso!</span>
         </div>
       </div>
      </div>
     </div>
    <?php } else { ?>
     <div class="box box-default">
      <div class="box-header with-border">
       <h2 class="box-title">Gerenciar Equipe Distrital</strong></h2>
      </div>
      <div class="box-body">
       <div class="col-xs-12">
      <ul class="users-list clearfix">
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="<?php echo $NomeRDI; ?>" width="128px" >
         <a class="users-list-name" href="#"><?php echo $NomeRDI; ?></a>
         <span class="users-list-date">RDI</span>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoSDI; ?>" alt="<?php echo $NomeSDI; ?>" width="128px" >
         <a class="users-list-name" href="#"><?php echo $NomeSDI; ?></a>
         <span class="users-list-date">Secretário(a) Distrital</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#SDI">
            <i class="fa fa-refresh"></i> Trocar SDI
           </button>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoTDI; ?>" alt="<?php echo $NomeTDI; ?>" width="128px" >
         <a class="users-list-name" href="#"><?php echo $NomeTDI; ?></a>
         <span class="users-list-date">Tesoureiro(a) Distrital</span>
           <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#TDI">
            <i class="fa fa-refresh"></i> Trocar TDI
           </button>
       </li>
       <li>
        <img src="../dist/img/perfil/<?php echo $FotoPDI; ?>" alt="<?php echo $NomePDI; ?>" width="128px" >
         <a class="users-list-name" href="#"><?php echo $NomePDI; ?></a>
         <span class="users-list-date">Protocolo Distrital</span>
           <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#PDI">
            <i class="fa fa-refresh"></i> Trocar PDI
           </button>
       </li>
       </ul>
        <div class="box box-default collapsed-box box-solid">
         <div class="box-header with-border">
          <h3 class="box-title">Comissão de Projetos</h3>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
         </div>
         <div class="box-body">
          <ul class="users-list clearfix">
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoDDP1; ?>" alt="<?php echo $NomeDDP1; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeDDP1; ?></a>
             <span class="users-list-date">DDP1</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DDP1">
            <i class="fa fa-refresh"></i> TROCAR DDP1
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoDDP2; ?>" alt="<?php echo $NomeDDP2; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeDDP2; ?></a>
             <span class="users-list-date">DDP2</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DDP2">
            <i class="fa fa-refresh"></i> TROCAR DDP2
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoDDP3; ?>" alt="<?php echo $NomeDDP3; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeDDP3; ?></a>
             <span class="users-list-date">DDP3</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DDP3">
            <i class="fa fa-refresh"></i> TROCAR DDP3
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoDDP4; ?>" alt="<?php echo $NomeDDP4; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeDDP4; ?></a>
             <span class="users-list-date">DDP4</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DDP4">
            <i class="fa fa-refresh"></i> TROCAR DDP4
           </button>
           </li>
          </ul>
         </div>
        </div>
       </div>
       <div class="col-xs-12">
        <div class="box box-default collapsed-box box-solid">
         <div class="box-header with-border">
          <h3 class="box-title">Comissão de Informação</h3>
          <div class="box-tools pull-right">
           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
         </div>
         <div class="box-body">
          <ul class="users-list clearfix">
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoIP1; ?>" alt="<?php echo $NomeIP1; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeIP1; ?></a>
             <span class="users-list-date">IP1</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#IP1">
            <i class="fa fa-refresh"></i> TROCAR IP1
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoIP2; ?>" alt="<?php echo $NomeIP2; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeIP2; ?></a>
             <span class="users-list-date">IP2</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#IP2">
            <i class="fa fa-refresh"></i> TROCAR IP2
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoIP3; ?>" alt="<?php echo $NomeIP3; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeIP3; ?></a>
             <span class="users-list-date">IP3</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#IP3">
            <i class="fa fa-refresh"></i> TROCAR IP3
           </button>
           </li>
           <li>
            <img src="../dist/img/perfil/<?php echo $FotoIP4; ?>" alt="<?php echo $NomeIP4; ?>" width="128px" >
             <a class="users-list-name" href="#"><?php echo $NomeIP4; ?></a>
             <span class="users-list-date">IP4</span>
           <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#IP4">
            <i class="fa fa-refresh"></i> TROCAR IP3
           </button>
           </li>
          </ul>
         </div>
        </div>
       </div>
      </div>
     </div>
     <?php } ?>
    </section>
  </div>
 </div>
 <?php 
 include_once 'modalDistrito.php';
 include_once '../footer.php'; ?></div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>
</body>
</html>
