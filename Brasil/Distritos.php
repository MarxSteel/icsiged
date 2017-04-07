<?php
require("../restritos.php"); 
require_once '../init.php';
$PrivClubes = "active";
$cDistritos = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
 $AsN = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF = 'AC' OR icbr_AssUF = 'AM' OR icbr_AssUF = 'RO' OR icbr_AssUF = 'RR' OR icbr_AssUF = 'PA' OR icbr_AssUF = 'AP' OR icbr_AssUF = 'TO'")->fetchColumn();
 $ClN = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_UF = 'AC' OR icbr_UF = 'AM' OR icbr_UF = 'RO' OR icbr_UF = 'RR' OR icbr_UF = 'PA' OR icbr_UF = 'AP' OR icbr_UF = 'TO'")->fetchColumn();

 $AsSul = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF = 'SC' OR icbr_AssUF = 'PR' OR icbr_AssUF = 'RS'")->fetchColumn();
 $ClSul = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_UF = 'SC' OR icbr_UF = 'PR' OR icbr_UF = 'RS'")->fetchColumn();

 $AsNE = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF = 'BA' OR icbr_AssUF = 'SE' OR icbr_AssUF = 'AL' OR icbr_AssUF = 'PE' OR icbr_AssUF = 'PB' OR icbr_AssUF = 'RN' OR icbr_AssUF = 'CE' OR icbr_AssUF = 'PI' OR icbr_AssUF = 'MA'")->fetchColumn();
 $ClNE = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_UF = 'BA' OR icbr_UF = 'SE' OR icbr_UF = 'AL' OR icbr_UF = 'PE' OR icbr_UF = 'PB' OR icbr_UF = 'RN' OR icbr_UF = 'CE' OR icbr_UF = 'PI' OR icbr_UF = 'MA'")->fetchColumn();

 $AsSW = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF = 'SP' OR icbr_AssUF = 'ES' OR icbr_AssUF = 'RJ' OR icbr_AssUF = 'MG'")->fetchColumn();
 $ClSW = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_UF = 'SP' OR icbr_UF = 'ES' OR icbr_UF = 'RJ' OR icbr_UF = 'MG'")->fetchColumn();

 $AsSudo = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF = 'MT' OR icbr_AssUF = 'MS' OR icbr_AssUF = 'GO' OR icbr_AssUF = 'DF'")->fetchColumn(); 
 $ClSudo = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_Status='A' AND icbr_UF = 'MT' OR icbr_UF = 'MS' OR icbr_UF = 'GO' OR icbr_UF = 'DF'")->fetchColumn(); 

   $QtAF = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssGenero = 'F'")->fetchColumn();


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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Região', 'Clubes'],
          ['Sul',     <?php echo $AsSul; ?>],
          ['Nordeste',      <?php echo $AsNE; ?>],
          ['Sudeste',  <?php echo $AsSW; ?>],
          ['Norte', <?php echo $AsN; ?>],
          ['Centro-Oeste',    <?php echo $AsSudo; ?>]
        ]);

        var options = {
           width: 380,
           height: 150,
          pieHole: 0.8,
        };

        var chart = new google.visualization.PieChart(document.getElementById('regiao'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Região', 'Clubes'],
          ['Sul',     <?php echo $ClSul; ?>],
          ['Nordeste',      <?php echo $ClNE; ?>],
          ['Sudeste',  <?php echo $ClSW; ?>],
          ['Norte', <?php echo $ClN; ?>],
          ['Centro-Oeste',    <?php echo $ClSudo; ?>]
        ]);

        var options = {
           width: 380,
           height: 150,
          pieHole: 0.2,
        };

        var chart = new google.visualization.PieChart(document.getElementById('clubes'));
        chart.draw(data, options);
      }
    </script>
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
 <aside class="main-sidebar">
  <section class="sidebar">
   <?php include_once '../menuLateral.php'; ?>
  </section>
 </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Cadastro de Associados
   <small><strong>MDIO</strong> Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
  <div class="row col-md-7">
   <div class="col-xs-6">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
       <h3 class="box-title">SUDESTE</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
      </div>
     <div class="box-body">
      <ul class="nav nav-pills nav-stacked">
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4310" target="_blank"><span class="info-box-icon4 bg-olive"><br />4310</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-laranja">
         <a href="Distrito.php?RI=4410" target="_blank"><span class="info-box-icon4 shazam-laranja"><br />4410</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [ES] - Espírito Santo</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4420" target="_blank"><span class="info-box-icon4 bg-olive"><br />4420</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4430" target="_blank"><span class="info-box-icon4 bg-olive"><br />4430</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4470" target="_blank"><span class="info-box-icon4 bg-olive"><br />4470</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo<br />[MS] - Mato Grosso do Sul</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4480" target="_blank"><span class="info-box-icon4 bg-olive"><br />4480</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-navy">
         <a href="Distrito.php?RI=4510" target="_blank"><span class="info-box-icon4 bg-navy"><br />4510</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [MG] - Minas Gerais</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-navy">
         <a href="Distrito.php?RI=4520" target="_blank"><span class="info-box-icon4 bg-navy"><br />4520</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [MG] - Minas Gerais</h5></span>
          </div>
         </div>
       </li>  
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4540" target="_blank"><span class="info-box-icon4 bg-olive"><br />4540</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li> 
       <li>
        <div class="info-box2 bg-navy">
         <a href="Distrito.php?RI=4560" target="_blank"><span class="info-box-icon4 bg-navy"><br />4560</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [MG] - Minas Gerais</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-blue">
         <a href="Distrito.php?RI=4570" target="_blank"><span class="info-box-icon4 bg-blue"><br />4570</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RJ] - Rio de Janeiro</h5></span>
          </div>
         </div>
       </li>  
       <li>
        <div class="info-box2 bg-navy">
         <a href="Distrito.php?RI=4580" target="_blank"><span class="info-box-icon4 bg-navy"><br />4580</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [MG] - Minas Gerais</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4590" target="_blank"><span class="info-box-icon4 bg-olive"><br />4590</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li> 
       <li>
        <div class="info-box2 bg-blue">
         <a href="Distrito.php?RI=4600" target="_blank"><span class="info-box-icon4 bg-blue"><br />4600</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RJ] - Rio de Janeiro<br />[SP] - São Paulo</h5></span>
          </div>
         </div>
       </li> 
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4610" target="_blank"><span class="info-box-icon4 bg-olive"><br />4610</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li>  
       <li>
        <div class="info-box2 bg-olive">
         <a href="Distrito.php?RI=4620" target="_blank"><span class="info-box-icon4 bg-olive"><br />4620</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SP] - São Paulo</h5></span>
          </div>
         </div>
       </li> 
       <li>
        <div class="info-box2 bg-blue">
         <a href="Distrito.php?RI=4750" target="_blank"><span class="info-box-icon4 bg-olive"><br />4750</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RJ] - Rio de Janeiro</h5></span>
          </div>
         </div>
       </li> 
       <li>
        <div class="info-box2 bg-navy">
         <a href="Distrito.php?RI=4760" target="_blank"><span class="info-box-icon4 bg-navy"><br />4760</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [MG] - Minas Gerais</h5></span>
          </div>
         </div>
       </li>
      </ul>
     </div>
    </div>
   </div>

   <div class="col-xs-6">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
       <h3 class="box-title">SUL</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
      </div>
     <div class="box-body">
      <ul class="nav nav-pills nav-stacked">
       <li>
        <div class="info-box2 shazam-laranja-claro">
         <a href="Distrito.php?RI=4630" target="_blank"><span class="info-box-icon4 shazam-laranja-claro"><br />4630</span></a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [PR] - Paraná</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-laranja-claro">
         <a href="Distrito.php?RI=4640" target="_blank"><span class="info-box-icon4 shazam-laranja-claro"><br />4640</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [PR] - Paraná</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-roxo">
         <a href="Distrito.php?RI=4650" target="_blank"><span class="info-box-icon4 shazam-roxo"><br />4650</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SC] - Santa Catarina</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-roxo">
         <a href="Distrito.php?RI=4651" target="_blank"><span class="info-box-icon4 shazam-roxo"><br />4651</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SC] - Santa Catarina</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-azul">
         <a href="Distrito.php?RI=4660" target="_blank"><span class="info-box-icon4 shazam-azul"><br />4660</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RS] - Rio Grande do Sul</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-azul">
         <a href="Distrito.php?RI=4670" target="_blank"><span class="info-box-icon4 shazam-azul"><br />4670</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RS] - Rio Grande do Sul</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-azul">
         <a href="Distrito.php?RI=4680" target="_blank"><span class="info-box-icon4 shazam-azul"><br />4680</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RS] - Rio Grande do Sul</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-azul">
         <a href="Distrito.php?RI=4700" target="_blank"><span class="info-box-icon4 shazam-azul"><br />4700</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RS] - Rio Grande do Sul</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-laranja-claro">
         <a href="Distrito.php?RI=4710" target="_blank"><span class="info-box-icon4 shazam-laranja-claro"><br />4710</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [PR] - Paraná</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-laranja-claro">
         <a href="Distrito.php?RI=4730" target="_blank"><span class="info-box-icon4 shazam-laranja-claro"><br />4730</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [PR] - Paraná</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-roxo">
         <a href="Distrito.php?RI=4740" target="_blank"><span class="info-box-icon4 shazam-roxo"><br />4740</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [SC] - Santa Catarina</h5></span>
          </div>
         </div>
       </li>
       <li>
        <div class="info-box2 shazam-azul">
         <a href="Distrito/4780.php" target="_blank"><span class="info-box-icon4 shazam-azul"><br />4780</span>
         </a>
          <div class="info-box-content2">
           <span class="info-box-text-estado"><h5> [RS] - Rio Grande do Sul</h5></span>
          </div>
         </div>
       </li>
      </ul>     
     </div>
    </div>
   </div>
   <div class="col-xs-6">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
       <h3 class="box-title">NORDESTE</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
      </div>
     <div class="box-body">
      <div class="info-box">
       <a href="Distrito.php?RI=4390" target="_blank"><span class="info-box-icon shazam-roxo">4390</span></a>
       <div class="info-box-content">
        <span class="info-box-text">AL, BA, SE</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/AL.png" width="15%">
         <img src="../dist/img/UF/BA.png" width="15%">
         <img src="../dist/img/UF/SE.png" width="15%">  
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4490" target="_blank"><span class="info-box-icon shazam-roxo">4490</span></a>
       <div class="info-box-content">
        <span class="info-box-text">CE, MA, PI</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/CE.png" width="15%">
         <img src="../dist/img/UF/MA.png" width="15%">
         <img src="../dist/img/UF/PI.png" width="15%">  
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4500" target="_blank"><span class="info-box-icon shazam-roxo">4500</span></a>
       <div class="info-box-content">
        <span class="info-box-text">PE, PB, RN</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/PE.png" width="15%">
         <img src="../dist/img/UF/PB.png" width="15%">
         <img src="../dist/img/UF/RN.png" width="15%">  
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4550" target="_blank"><span class="info-box-icon shazam-roxo">4550</span></a>
       <div class="info-box-content">
        <span class="info-box-text">[BA] - BAHIA</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/BA.png" width="15%">
        </span>
       </div>     
      </div>
     </div>
    </div>
   </div>
   <div class="col-xs-6">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
       <h3 class="box-title">CENTRO-OESTE</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
      </div>
     <div class="box-body">
     <div class="box-body">
      <div class="info-box">
       <a href="Distrito.php?RI=4440" target="_blank"><span class="info-box-icon shazam-roxo">4440</span></a>
       <div class="info-box-content">
        <span class="info-box-text">[MT] - Mato Grosso</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/MT.png" width="15%">
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4470" target="_blank"><span class="info-box-icon shazam-roxo">4470</span></a>
       <div class="info-box-content">
        <span class="info-box-text">[MS] - Mato Grosso do Sul<br />
         [SP] - São Paulo</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/MS.png" width="15%">
         <img src="../dist/img/UF/SP.png" width="15%">
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4530" target="_blank"><span class="info-box-icon shazam-roxo">4530</span></a>
       <div class="info-box-content">
        <span class="info-box-text">DF, GO, TO</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/DF.png" width="15%">
         <img src="../dist/img/UF/GO.png" width="15%">
         <img src="../dist/img/UF/TO.png" width="15%">
        </span>
       </div>     
      </div>
      <div class="info-box">
       <a href="Distrito.php?RI=4770" target="_blank"><span class="info-box-icon shazam-roxo">4770</span></a>
       <div class="info-box-content">
        <span class="info-box-text">[GO] - Goiás<br/>
         [MG] - Minas Gerais
        </span>
        <span class="info-box-number">
         <img src="../dist/img/UF/GO.png" width="15%">
         <img src="../dist/img/UF/MG.png" width="15%">
        </span>
       </div>     
      </div>
     </div>
     </div>
    </div>
   </div>
   <div class="col-xs-6">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
       <h3 class="box-title">NORTE</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
      </div>
     <div class="box-body">      
      <div class="info-box">
       <a href="#"><span class="info-box-icon shazam-roxo">4720</span></a>
       <div class="info-box-content">
        <span class="info-box-text">AC, AM, AP, PA, RO, RR, TO</span>
        <span class="info-box-number">
         <img src="../dist/img/UF/AC.png" width="15%">
         <img src="../dist/img/UF/AM.png" width="15%">
         <img src="../dist/img/UF/AP.png" width="15%">
         <img src="../dist/img/UF/PA.png" width="15%">
         <img src="../dist/img/UF/RO.png" width="15%">
         <img src="../dist/img/UF/RR.png" width="15%">
         <img src="../dist/img/UF/TO.png" width="15%">        
        </span>
       </div>     
      </div>
     </div>
    </div>
   </div>
  </div><!-- row -->
  <div class="row col-md-5">
   <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">O Brasil, em <strong>associados</strong></h3>
    </div>
    <div class="box-body">
    <div id="regiao"></div>
    </div>   
   </div>
   <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">O Brasil, em <strong>clubes</strong></h3>
    </div>
    <div class="box-body">
    <div id="clubes"></div>
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