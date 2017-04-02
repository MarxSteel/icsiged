 <section class="content-header">
  <h1>Página Inicial
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
  <section class="content">
  <div class="row">
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Distrito/dashboard.php" >
      <span class="info-box-icon bg-navy"><i class="fa fa-building"></i></span>
     </a>
     <div class="info-box-content"><h4>Distrito <?php echo $Distrito; ?></h4>Dados do meu Distrito</div>
    </div>
   </div>
  <?php if ($PrivClubes === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Clubes/dashboard.php" >
      <span class="info-box-icon btn-primary"><i class="fa fa-industry"></i></span>
     </a>
     <div class="info-box-content"><h4>Lista de Clubes</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivAssociado === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Associados/dashboard.php" >
      <span class="info-box-icon btn-danger"><i class="fa fa-user"></i></span>
     </a>
     <div class="info-box-content"><h4>Lista de Associados</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivTesouraria === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="Tesouraria/dashboard.php" >
      <span class="info-box-icon bg-black disabled">
       <i class="fa fa-dollar"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Tesouraria</h4></div>
    </div>
   </div>
  <?php } else { } if ($PrivANP === "1") { ?>
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a href="ANP/dashboard.php" >
      <span class="info-box-icon bg-orange">
       <i class="fa fa-file-text"></i>
      </span>
     </a>
     <div class="info-box-content"><h4>Cadastro de Projetos</h4></div>
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
 </section>