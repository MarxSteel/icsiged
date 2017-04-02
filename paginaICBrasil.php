<?php
//ESTRUTURANDO QUERIES
 //CHAMANDO QUANTIDADE DE CLUBES NOS ESTADOS
 //AC
$CAC = "0";
 //AL
$CAL = "0";
 //AM
$CAM = "0";
 //AP
$CAP = "0";
 //BA
$CBA = "0";
 //CE
$CCE = "0";
 //DF
$CDF = "0";
 //ES
$CES = "0";
 //GO
$CGO = "0";
 //MA
$CMA = "0";
 //MG
$CMG = "0";
 //MS
$CMS = "0";
 //MT
$CMT = "0";
 //PA
$CPA = "0";
 //PB
$CPB = "0";
 //PE
$CPE = "0";
 //PI
$CPI = "0";
 //PR
 $CPR = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_UF='PR' AND icbr_Status='A'")->fetchColumn();
 $APR = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssUF='PR'")->fetchColumn();
 //RJ
 $CRJ = "0";
 //RN
 $CRN = "0";
 //RS
 $CRS = "0";
 //RO
 $CRO = "0";
 //RR
 $CRR = "0";
 //SE
 $CSE = "0";
 //SC
  $CSC = $PDO->query("SELECT COUNT(*) FROM icbr_clube WHERE icbr_UF='SC' AND icbr_Status='A'")->fetchColumn();
 //SP
 $CSP = "0";
 //TO
 $CTO = "0";

 $ClubesNorte = $CPA + $CAM + $CAC + $CAP + $CRO + $CRR + $CTO;
 //$SociosNorte = 
 $ClubesNordeste = $CBA + $CSE + $CAL + $CPE + $CPB + $CRN + $CCE + $CPI + $CMA;
 //$SociosNordeste = 
 $ClubesCentroOeste = $CGO + $CDF + $CMT + $CMS;
 //$SociosCentroOeste
 $ClubesSudeste = $CMG + $CES + $CSP;
 //$SociosSudeste = 
 $ClubesSul = $CPR + $CSC + $CRS;
 //$SociosSul = 
?>
 <section class="content-header">
  <h1>Painel Interact Brasil
   <small>MDIO Interact Brasil</small>
  </h1>
 </section>
 <section class="content">
  <div class="col-md-4 col-xs-12">
   <div class="box box-warning">
    <div class="box-header with-border">
     <h3 class="box-title">Cadastros de Clubes (Região Geográfica)</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
     </div>
    </div>
    <div class="box-body">
     <div class="row">
      <div class="col-md-8">
       <div class="chart-responsive">
       	<center>
          <img src="https://www.brewersassociation.org/wp-content/uploads/2009/08/donut-chart.png" width="200">
        </center>
       </div>
      </div>
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
         <li><i class="fa fa-circle-o text-red"></i> Norte</li>
         <li><i class="fa fa-circle-o text-aqua"></i> Nordeste</li>
         <li><i class="fa fa-circle-o text-green"></i> Centro-Oeste</li>
         <li><i class="fa fa-circle-o text-orange"></i> Sudeste</li>
         <li><i class="fa fa-circle-o text-navy"></i> Sul</li>
        </ul>
      </div>
     </div>
    </div>
    <div class="box-footer no-padding">
     <ul class="nav nav-pills nav-stacked">
	 <li><strong>REGIÃO NORTE</strong>
	  <span class="pull-right text-red"><?php echo $ClubesNorte; ?> Clubes</span>
	 </li>
	 <li><strong>REGIÃO NORDESTE</strong>
	  <span class="pull-right text-blue"><?php echo $ClubesNordeste; ?> Clubes</span>
	 </li>
	 <li><strong>REGIÃO CENTRO-OESTE</strong>
	  <span class="pull-right text-green"><?php echo $ClubesCentroOeste; ?> Clubes</span>
	 </li>
	 <li><strong>REGIÃO SUDESTE</strong>
	  <span class="pull-right text-orange"><?php echo $ClubesSudeste; ?> Clubes</span>
	 </li>
	 <li><strong>REGIÃO SUL</strong>
	  <span class="pull-right text-navy"><?php echo $ClubesSul; ?> Clubes</span>
	 </li>
     </ul>
    </div> 
   </div><!-- ACABA BOX DEMOGRAFIA GERAL -->
   <div class="box box-default collapsed-box box-solid">
    <div class="box-header with-border">
     <h3 class="box-title">Clubes por Distrito</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
     </div>
    </div>
    <div class="box-body">
              TESTE
    </div>
   </div>
   <div class="box box-default box-solid">
    <div class="box-header with-border">
     <h3 class="box-title">Clubes por Estado</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
     </div>
    </div>
    <div class="box-body">
     <ul class="nav nav-pills nav-stacked">
     <?php
     if ($CAC >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/AC.png" width="45" height="30"> <strong>[AC]</strong> - Acre
       <span class="pull-right text-red"></i> ' . $CAC . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CAL >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/AL.png" width="45" height="30"> <strong>[AL]</strong> - Alagoas
       <span class="pull-right text-blue"></i> ' . $CAL . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CAM >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/AM.png" width="45" height="30"> <strong>[AM]</strong> - Amazonas
       <span class="pull-right text-red"></i> ' . $CAM . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CAP >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/AP.png" width="45" height="30"> <strong>[AP]</strong> - Amapá
       <span class="pull-right text-red"></i> ' . $CAP . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CBA >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/BA.png" width="45" height="30"> <strong>[BA]</strong> - Bahia
       <span class="pull-right text-blue"></i> ' . $CBA . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CCE >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/CE.png" width="45" height="30"> <strong>[CE]</strong> - Ceará
       <span class="pull-right text-blue"></i> ' . $CCE . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CDF >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/DF.png" width="45" height="30"> <strong>[DF]</strong> - Distrito Federal
       <span class="pull-right text-orange"></i> ' . $CDF . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CGO >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/ES.png" width="45" height="30"> <strong>[ES]</strong> - Espírito Santo
       <span class="pull-right text-orange"></i> ' . $CGO . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CGO >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/GO.png" width="45" height="30"> <strong>[GO]</strong> - Goiás
       <span class="pull-right text-orange"></i> ' . $CAC . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CMA >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/MA.png" width="45" height="30"> <strong>[MA]</strong> - Maranhão
       <span class="pull-right text-blue"></i> ' . $CMA . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CMG >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/MG.png" width="45" height="30"> <strong>[MG]</strong> - Minas Gerais
       <span class="pull-right text-orange"></i> ' . $CMG . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CMS >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/MS.png" width="45" height="30"> <strong>[MS]</strong> - Mato Grosso do Sul
       <span class="pull-right text-green"></i> ' . $CMS . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CMT >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/MT.png" width="45" height="30"> <strong>[MT]</strong> - Mato Grosso
       <span class="pull-right text-green"></i> ' . $CMT . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CPA >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/PA.png" width="45" height="30"> <strong>[PA]</strong> - Pará
       <span class="pull-right text-red"></i> ' . $CPA . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CPB >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/PB.png" width="45" height="30"> <strong>[PB]</strong> - Paraíba
       <span class="pull-right text-blue"></i> ' . $CPB . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CPI >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/PI.png" width="45" height="30"> <strong>[PI]</strong> - Piauí
       <span class="pull-right text-blue"></i> ' . $CPI . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CPR >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/PR.png" width="45" height="30"> <strong>[PR]</strong> - Paraná
       <span class="pull-right text-navy"></i> ' . $CPR . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CRJ >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/RJ.png" width="45" height="30"> <strong>[RJ]</strong> - Rio de Janeiro
       <span class="pull-right text-red"></i> ' . $CRJ . ' Clubes</span></a>
      </li>';
     }else{ }
     if ($CRN >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/RN.png" width="45" height="30"> <strong>[RN]</strong> - Rio Grande do Norte
       <span class="pull-right text-blue"></i> ' . $CRN . ' Clubes</span></a>
      </li>';
     }else{ }    
     if ($CRS >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/RS.png" width="45" height="30"> <strong>[RS]</strong> - Rio Grande do Sul
       <span class="pull-right text-navy"></i> ' . $CRS . ' Clubes</span></a>
      </li>';
     }else{ }  
     if ($CRO >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/RO.png" width="45" height="30"> <strong>[RO]</strong> - Rondônia
       <span class="pull-right text-red"></i> ' . $CRO . ' Clubes</span></a>
      </li>';
     }else{ } 
     if ($CRR >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/RR.png" width="45" height="30"> <strong>[RR]</strong> - Roraima
       <span class="pull-right text-red"></i> ' . $CRR . ' Clubes</span></a>
      </li>';
     }else{ } 
     if ($CSC >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/SC.png" width="45" height="30"> <strong>[SC]</strong> - Santa Catarina
       <span class="pull-right text-navy"></i> ' . $CSC . ' Clubes</span></a>
      </li>';
     }else{ } 
     if ($CSE >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/SE.png" width="45" height="30"> <strong>[SE]</strong> - Sergipe
       <span class="pull-right text-blue"></i> ' . $CSE . ' Clubes</span></a>
      </li>';
     }else{ } 
     if ($CSP >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/SP.png" width="45" height="30"> <strong>[SP]</strong> - São Paulo
       <span class="pull-right text-orange"></i> ' . $CSP . ' Clubes</span></a>
      </li>';
     }else{ } 
     if ($CTO >= "1") {
     echo '
	  <li>
	   <a><img src="dist/img/icons/TO.png" width="45" height="30"> <strong>[TO]</strong> - Tocantins
       <span class="pull-right text-red"></i> ' . $CTO . ' Clubes</span></a>
      </li>';
     }else{ } 
     ?>
     </ul>
    </div>
   </div>
  </div>
  <div class="col-md-4 col-xs-12">
   <div class="box box-warning">
    <div class="box-header with-border">
     <h3 class="box-title">Cadastros de Associados (Geral)</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
     </div>
    </div>
    <div class="box-body">
     <div class="row">
      <div class="col-md-8">
       <div class="chart-responsive">
       	<center>
          <img src="https://www.brewersassociation.org/wp-content/uploads/2009/08/donut-chart.png" width="200">
        </center>
       </div>
      </div>
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
         <li><i class="fa fa-circle-o text-red"></i> Feminino</li>
         <li><i class="fa fa-circle-o text-aqua"></i> Masculino</li>
        </ul>
      </div>
     </div>
    </div>
    <div class="box-footer no-padding">
     <ul class="nav nav-pills nav-stacked">
      <li>
   	  <div class="info-box-small bg-aqua">
       <span class="info-box-mini"><img src="dist/img/icons/boy.png" width="50"></span>
        <div class="info-box-content">
         <span class="info-box-text">MASCULINO</span>
         <span class="info-box-number">12345 Associados</span>
        </div>
       </div>
      </li>
      <li>
   	  <div class="info-box-small bg-maroon">
       <span class="info-box-mini"><img src="dist/img/icons/girl.png" width="50"></span>
        <div class="info-box-content">
         <span class="info-box-text">FEMININO</span>
         <span class="info-box-number">12345 Associados</span>
        </div>
       </div>
      </li>
     </ul>
    </div> 

   </div><!-- ACABA BOX DEMOGRAFIA GERAL -->
   <div class="box box-default collapsed-box box-solid">
    <div class="box-header with-border">
     <h3 class="box-title">Associados por Região</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
     </div>
    </div>
    <div class="box-body">
              TESTE
    </div>
   </div>
  </div>
 </section>

