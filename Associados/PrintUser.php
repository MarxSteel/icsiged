<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cClubes = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $par = $query->fetch();
    $Distrito = $par['Distrito'];
    $LoginNome = $par['Nome'];
    $IDUSer = $par['codLogin'];

$IDClube = $_GET['ID'];


 $dadosclube = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IDClube'");
      $dadosclube->execute();

          $campo = $dadosclube->fetch();
      $NomeCompleto = $campo['icbr_AssNome'];
      $DistritoSocio = $campo['icbr_AssDistrito'];
      $ClubeSocio = $campo['icbr_AssClube'];
      $IDClubeSocio = $campo['icbr_AssClubeID'];
      $CargoSocio = $campo['icbr_AssCargo'];
      $DataPosseSocio = $campo['icbr_DtPosse'];
      $DataNascimentoSocio = $campo['icbr_AssDtNascimento'];
      $StatusSocio = $campo['icbr_AssStatus'];
      $FotoSocio = $campo['icbr_AssFoto'];

      //CHAMANDO ENDEREÇO DO ASSOCIADO
      $RuaSocio = $campo['icbr_AssEndereco']; 
      $NumSocio = $campo['icbr_AssNum']; 
      $BairroSocio = $campo['icbr_AssBairro']; 
      $CidadeSocio = $campo['icbr_AssCidade']; 
      $UFSocio = $campo['icbr_AssUF']; 
      $CEPSocio = $campo['icbr_AssCEP']; 
      $RelID = "ID " . $IDClubeSocio . "." . $IDClube . "." . $DistritoSocio;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MDIO Interact Brasil | Impressão de Credencial</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
#main-banner {
    width: 500px;
    height: 200px;
    background-size: cover;
}
#main-banner-content {
    height: 100px;
    width: 200px;
    background: #555;
    margin: auto;
}
</style>
<style type="text/css">
.imagem{
   position:relative;
}
.imagem-mascara {
   width:400px; /* largura da imagem máscara */
   height:400px; /* altura da imagem máscara */
   position:absolute;
   top:0;
   left:12;
}
#logo_icbr_frente{
position: absolute;
left: 5%;
bottom: 70%;
z-index: 2;
}
#logo_rotary_frente{
position: absolute;
left: 8%;
bottom: 60%;
z-index: 2;
}
#id_cracha{
position: absolute;
margin-top: -80px;
text-align: center;
}
#rodape_verso{
position: absolute;
margin-top: -100px;
text-align: center;
}
#foto_frente{
position: absolute;
left: 35%;
bottom: 7%;
z-index: 3;
}
#logo_gestao{
position: absolute;
left: 35%;
bottom: 7%;
z-index: 3;
}


#rodape_cracha_frente{
 background-color:#3C8DBC; 
 background: #3C8DBC;
 text-align: center;
 color: #FFFFFF;
}
#nome_clube_frente{
  color: #3C8DBC;
  text-align: center;
}



</style>
</head>

<!--<body onload="window.print();">
<body>

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
         <img class="img-responsive pull-center" src="../dist/img/logo/ICLogo_Azul_GrafEsp.png" width="200">
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <h3><?php echo $NomeCompleto; ?></h3>
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Interact Club de:<br /> <?php echo $ClubeSocio; ?></strong><br>
           Distrito <?php echo $DistritoSocio; ?><br>
           <?php echo $CargoSocio; ?><br>
           Data de Posse: <?php echo $DataPosseSocio; ?><br />
           Data de Nascimento: <?php echo $DataNascimentoSocio; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       <br>
        Endereço do Associado:
        <address>
         <strong><?php echo $RuaSocio . ", " . $NumSocio;?></strong><br>
          <?php echo $BairroSocio; ?><br>
          <?php echo $CidadeSocio . " - " . $UFSocio;?> <br>
          CEP <?php echo $CEPSocio; ?><br>
      </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       <img src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoSocio; ?>" width="140" heidth="120" alt="Foto">
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  x CORTE AQUI
  

  <div class="row">
   <div class="col-xs-6">
    <button class="btn btn-block btn-default btn-xs"> FRENTE </button><br />
     <li class="list-group-item">
     <div>
      <img  src="../dist/img/cracha_bg_frente.png">
     </div>
     <div id="logo_icbr_frente">
      <img src="../dist/img/logo/ic_br_white.png" width="150">
     </div>

     <div id="foto_frente">
      <img class="profile-user-img img-responsive img-circle" src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoSocio; ?>" >
     </div>
     </li>
     <li class="list-group-item">
      <h4 style="text-align: center; color: red;" class="widget-user-username"><?php echo $NomeCompleto; ?></h4>
      <h5 style="text-align: center;" class="widget-user-desc"><?php echo $CargoSocio; ?></h5>
      <br /><br />
      <div id="nome_clube_frente">
       <h3>Distrito <?php echo $DistritoSocio; ?></h3><br />
      </div>
     </li>
     <li class="list-group-item">
     <div>
      <img src="../dist/img/blogo.jpg" width="400" height="80">
     </div>
     <div id="rodape_verso"><br /><br />
     <font color="white" size="4"><?php echo $RelID; ?></font><br />&nbsp;
     <font color="white" size="3">Interact Club de <?php echo $ClubeSocio; ?></font>
     </div>
     </li>
    </div>
   <div class="col-xs-6">
    <button class="btn btn-block btn-default btn-xs"> VERSO </button><br />
     <li class="list-group-item">
     <div>
      <img  src="../dist/img/cracha_bg_verso.png">
     </div>
     <div id="logo_rotary_frente">
      <img src="../dist/img/logo/rotary_white.png" width="120">
     </div>
     <div id="foto_frente">
      <div class="widget-user-image">
       <img class="profile-user-img img-responsive" src="<?php echo qrcode2("http://interactbrasil.org/perfil/VerPerfil.php?ID=<?php echo $IDClube; ?>","100"); ?>" />
      </div>     </div>
     </li>
     <li class="list-group-item">
      <h4 style="text-align: center;" class="widget-user-username"><a>Interact Club de <?php echo $ClubeSocio; ?></a></h4>
      <h5 style="text-align: center;" class="widget-user-desc">Data de Posse: <?php echo $DataPosseSocio; ?></h5>
      <br /><br />
      <div align="center">
      <img src="<?php echo $server; ?>/dist/img/logo/logo_rotary.png" width="150">
      </div>
     </li>
     <li class="list-group-item">
     <div>
      <img src="../dist/img/blogo.jpg" width="400" height="80">
     </div>
     <div id="rodape_verso"><br /><br />
     <font color="white" size="4">Mariane Abacherly</font><br />&nbsp;
     <font color="white" size="3">Presidente MDIO Interact Brasil 2016-17</font>
     </div>
     </li>

      <div id="rodape_cracha_frente">
       </div>
     </li>
    </div>


    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
