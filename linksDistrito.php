<!--   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Clubes/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/notepad.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Dados do Meu Distrito</h4></div>
    </div>
   </div>
-->
  <?php if ($PrivClubes === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Clubes/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/skyline.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Lista de Clubes</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivAssociado === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Associados/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/socio.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Lista de Associados</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivTesouraria === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Tesouraria/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/tes.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Tesouraria</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivANP === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="ANP/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/analytics.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Cadastro de Projetos</h4></div>
    </div>
   </div>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Tesouraria/dashboard.php" >
      <span class="info-box-icon3 bg-white"><img src="dist/img/icons/checklist.png" width="90"></span>
     </a>
     <div class="info-box-content"><h4>Secretaria</h4></div>
    </div>
   </div>
  <?php } else { }?>

  <!--
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="ANP/arquivo.php" >
      <span class="info-box-icon bg-navy">
       <i class="fa fa-list-alt"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Arquivo Nacional de Projetos</h4></div>
    </div>
   </div> -->