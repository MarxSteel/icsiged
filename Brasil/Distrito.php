<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistritos = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
$D = $_GET['RI'];
$dDistrito = $PDO->prepare("SELECT * FROM distrito WHERE distrito='$D'");
 $dDistrito->execute();
 $ddd = $dDistrito->fetch();
  $UF1 = $ddd['UF1'];
  $UF2 = $ddd['UF2'];
  $UF3 = $ddd['UF3'];
  $RDI = $ddd['RDI'];
   $DadosRDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$RDI'");
   $DadosRDI->execute();
    $RRDI = $DadosRDI->fetch();
     $NomeRDI = $RRDI['icbr_AssNome'];
     $FotoRDI = $RRDI['icbr_AssFoto'];

 $Associados = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito = '$D'")->fetchColumn();
 $Clubes = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito = '$D'")->fetchColumn();
 $Projetos = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_Distrito = '$D'")->fetchColumn();



function valida_estado ($X){
  if ($X == "AC") {
    echo "Acre";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }
  elseif ($X === "") {
    echo "";
  }

  elseif ($X === "PR") {
    echo " Paraná";
  }
  
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
 <link rel="stylesheet" href="../dist/css/AdminLTE.css">
 <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
 <aside class="main-sidebar">
  <section class="sidebar">
   <?php include_once '../menuLateral.php'; ?>
  </section>
 </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Distrito <?php echo $D; ?>
   <small><strong>MDIO</strong> Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
 <div class="row">
  <div class="col-xs-4">
   <div class="box box-solid">
    <div class="box-header with-border">
     <h3 class="box-title">Região</h3>
     <div class="box-body">
      <div class="info-box2">
       <span class="info-box-mini"><img src="../dist/img/UF/<?php echo $UF1; ?>.png" width="50"></span>
        <div class="info-box-content2">
          <span class="info-box-number"><?php valida_estado($UF1); ?></span>
          </div>
         </div>
     </div>
    </div>
   </div>
   <div class="box box-widget widget-user">
    <div class="widget-user-header bg-aqua-active">
     <h3 class="widget-user-username"><?php echo $NomeRDI; ?></h3>
     <h5 class="widget-user-desc">Representante Distrital de Interact</h5>
    </div>
    <div class="widget-user-image">
     <img class="img-circle" src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="User Avatar">
    </div>
    <div class="box-footer">
     <div class="row">
      <div class="col-sm-4 border-right">
       <div class="description-block">
         <h5 class="description-header"><?php echo $Clubes; ?></h5>
          <span class="description-text">CLUBES</span>
       </div>
      </div>
      <div class="col-sm-4 border-right">
       <div class="description-block">
         <h5 class="description-header"><?php echo $Associados; ?></h5>
         <span class="description-text">ASSOCIADOS</span>
      </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
         <h5 class="description-header"><?php echo $Projetos; ?></h5>
                    <span class="description-text">PROJETOS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>



   <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-yellow">
      <div class="widget-user-image">
        <img class="img-circle" src="../dist/img/perfil/<?php echo $FotoRDI; ?>" alt="<?php echo $NomeRDI; ?>">
      </div>
      <h5><?php echo $NomeRDI; ?></h5>
      <h5 class="widget-user-desc">RDI</h5>
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
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>

</body>
</html>