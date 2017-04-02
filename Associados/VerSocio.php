<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cClubes = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
$IDSocio = $_GET['ID'];
$IDClube = $IDSocio;
  //CHAMANDO OS DADOS DO ASSOCIADO
  $DadosSocio = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IDSocio'");
   $DadosSocio->execute();
    $ds = $DadosSocio->fetch();
     $NomeCompleto = $ds['icbr_AssNome'];
     $DistritoSocio = $ds['icbr_AssDistrito'];
     $ClubeSocio = $ds['icbr_AssClube'];
      $IDClubeSocio = $ds['icbr_AssClubeID'];
      $CargoSocio = $ds['icbr_AssCargo'];
      $DataPosseSocio = $ds['icbr_DtPosse'];
      $DataNascimentoSocio = $ds['icbr_AssDtNascimento'];
      $StatusSocio = $ds['icbr_AssStatus'];
      $FotoSocio = $ds['icbr_AssFoto'];
      $MailSocio = $ds['icbr_AssEmail'];

      //CHAMANDO ENDEREÇO DO ASSOCIADO
      $RuaSocio = $ds['icbr_AssEndereco']; 
      $NumSocio = $ds['icbr_AssNum']; 
      $BairroSocio = $ds['icbr_AssBairro']; 
      $CidadeSocio = $ds['icbr_AssCidade']; 
      $UFSocio = $ds['icbr_AssUF']; 
      $CEPSocio = $ds['icbr_AssCEP']; 
      $TELEFONE_1 = $ds['TELEFONE_1']; 
      $TELEFONE_2 = $ds['TELEFONE_2']; 
      $DDD1 = $ds['DDD_1']; 
      $DDD2 = $ds['DDD_2']; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGED - Sistema Integrado de Gestão Distrital | MDIO Interact Brasil</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>
<?php
include_once '../header_top.php';
?>
  <div class="content-wrapper">
   <div class="container">
    <section class="content">
     <div class="row">
      <div class="col-md-6 col-xs-12">
       <div class="box box-widget widget-user-2">
        <div class="widget-user-header bg-blue">
         <div class="widget-user-image">
          <img class="img-circle" src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoSocio; ?>" id="imagem" alt="User Avatar">
         </div>
         <h3 class="widget-user-username">
          <?php echo $NomeCompleto; ?>
         </h3>
          <h5 class="widget-user-desc"><?php echo $ClubeSocio; ?></h5>
        </div>
        <div class="box-footer no-padding">
         <ul class="nav nav-stacked">
          <li>
           <a>Data de Posse 
            <span class="pull-right badge bg-green"><?php echo $DataPosseSocio; ?></span>
           </a>
          </li>
          <li>
           <a>Data de Nascimento 
            <span class="pull-right badge bg-aqua"><?php echo $DataNascimentoSocio; ?></span>
           </a>
          </li>
          <li>
           <a>Cargo Atual
            <span class="pull-right badge bg-red"><?php echo $CargoSocio; ?></span>
           </a>
          </li>
          <li>
           <a>E-Mail
            <span class="pull-right badge bg-orange"><?php echo $MailSocio; ?></span>
           </a>
          </li>
          <li>
          <div class="col-md-4 col-xs-12">
           <a data-toggle="modal" data-target="#NovoCargo" class="btn btn-primary btn-block">
           <i class="fa fa-briefcase"> Add Cargo</i>
           </a>
          </div>
          <div class="col-md-4 col-xs-12">
           <a data-toggle="modal" data-target="#NovaFoto" class="btn bg-orange btn-block">
            <i class="fa fa-camera"> Trocar Foto</i>
           </a>
          </div>
          <div class="col-md-4 col-xs-12">
           <a data-toggle="modal" data-target="#NovoPremio" class="btn btn-danger btn-block">
            <i class="fa fa-trophy"> Add Premiação</i>
           </a>
          </div>
         </ul>
        </div>
       </div>
       <div class="box box-solid">
        <div class="box-header with-border">
         <h3 class="box-title">Contato e Endereço</h3>
        </div>
        <div class="box-body">
        <h4><strong>Telefone 1:</strong>
        <br />(<code><?php echo $DDD1; ?></code>)
         <?php
          $VlrT1 = strlen($TELEFONE_1);
          if ($VlrT1 == "9") {
           $T1 = substr( $TELEFONE_1, 0, 1 );
           $T2 = substr( $TELEFONE_1, 1, 4 );
           $T3 = substr( $TELEFONE_1, 5, 4 );
            echo $T1 . "-" . $T2 . "-" . $T3;
          }
          elseif ($VlrT1 == "8") {
           $T1 = substr( $TELEFONE_1, 0, 4 );
           $T2 = substr( $TELEFONE_1, 4, 4 );
            echo $T1 . "-" . $T2;
          }
          else{
            echo $TELEFONE_1;
          }
         ?>
        <br /><strong>Telefone 2:</strong>
        <br />(<code><?php echo $DDD2; ?></code>)
         <?php
          $VlrT2 = strlen($TELEFONE_2);
          if ($VlrT2 == "9") {
           $TT1 = substr( $TELEFONE_2, 0, 1 );
           $TT2 = substr( $TELEFONE_2, 1, 4 );
           $TT3 = substr( $TELEFONE_2, 5, 4 );
            echo $TT1 . "-" . $TT2 . "-" . $TT3;
          }
          elseif ($VlrT2 == "8") {
           $TT1 = substr( $TELEFONE_2, 0, 4 );
           $TT2 = substr( $TELEFONE_2, 4, 4 );
            echo $TT1 . "-" . $TT2;
          }
          else{
            echo $TELEFONE_2;
          }
         ?>        
        <br /><br /><strong>Endereço:</strong>
         <?php echo $RuaSocio . ", <strong>Num.:</strong>" . $NumSocio; ?>
         <br /><strong>Bairro:</strong>
         <?php echo $BairroSocio . ", <strong>CEP.:</strong>" . $CEPSocio; ?>
         <br /><strong>Cidade:</strong>
         <?php echo $CidadeSocio . ", " . $UFSocio; ?>
        </h4>

        </div>
       </div>
      </div>
      <div class="col-md-6 col-xs-12">
       <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
         <li><a href="#HistPremio" data-toggle="tab">Prêmios</a></li>
         <li class="active"><a href="#HistCargo" data-toggle="tab">Cargos</a></li>
         <li class="pull-left header"><i class="fa fa-th"></i>Históricos</li>
        </ul>
        <div class="tab-content">
         <div class="tab-pane active" id="HistCargo">
          <?php
           $QryCargo = "SELECT * FROM icbr_historico WHERE hist_uid='$IDSocio' AND hist_Tipo!='4'";
            $QyC = $PDO->prepare($QryCargo);
            $QyC->execute();
          ?>
         <table id="Cargos" class="table table-bordered table-striped">
          <thead>
           <tr>
            <th width="10%">Gestão</th>
            <th width="15%">Nível</th>
            <th width="30%">Cargo</th>
           </tr>
          </thead>
          <tbody>
           <?php while ($ListaCargo = $QyC->fetch(PDO::FETCH_ASSOC)): ?>
           <tr>
            <td><?php echo $ListaCargo['hist_Gestao']; ?></td>
            <td>
            <?php 
              $TipoCargo = $ListaCargo['hist_Tipo'];
              if ($TipoCargo === '1') {
                echo "Clube";
              }
              elseif ($TipoCargo === '2') {
                echo "Distrito";
              } 
              elseif ($TipoCargo === '3') {
                echo "IC Brasil";
              }
              else {
                //NADA AQUI
              }
            ?>
            </td>
            <td><?php echo $ListaCargo['hist_Cargo']; ?></td>
           </tr>
           <?php endwhile; ?>
          </tbody>
          <tfoot>
           <tr>
            <th width="10%">Gestão</th>
            <th width="15%">Nível</th>
            <th width="30%">Cargo</th>
           </tr>
          </tfoot>
         </table>
         </div>
         <div class="tab-pane" id="HistPremio">
         <?php
          $Querypremio = "SELECT * FROM icbr_historico WHERE hist_uid='$IDSocio' AND hist_Tipo='4'";
           $qryPremio = $PDO->prepare($Querypremio);
           $qryPremio->execute();
         ?>
         <table id="Premios" class="table table-bordered table-striped">
          <thead>
           <tr>
           <th width="10%">Gestão</th>
           <th width="10%">Distito</th>
           <th width="80%">Premio</th>
           </tr>
          </thead>
          <tbody>
          <?php while ($pre = $qryPremio->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
           <td><?php echo $pre['hist_Gestao']; ?></td>
           <td><?php echo $pre['hist_Distrito']; ?></td>
           <td><?php echo $pre['hist_Cargo']; ?></td>
          </tr>
          <?php endwhile; ?>
         </tbody>
         <tfoot>
          <tr>
           <th width="10%">Gestão</th>
           <th width="10%">Clube:</th>
           <th width="80%">Premio</th>
          </tr>
         </tfoot>
         </table> 
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <?php include_once 'ModalSocio.php'; ?>
  </div>
 </div>
<?php 
include_once '../footer.php'; ?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/fastclick/fastclick.min.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>
</body>
<script>
  $(function () {
    $("#Cargos").DataTable();
    $("#Premios").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
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

</html>
