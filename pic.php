 <link rel="stylesheet" href="plugins/morris/morris.css">
 <section class="content">
  <div class="row"> 
  <?php if ($Distrito <> "9999") { ?>
  <div class="col-xs-12">
   <div class="box box-default collapsed-box">
    <div class="box-header with-border">
     <h3 class="box-title">Painel do meu Distrito</h3>
      <div class="box-tools pull-right">Clique para expandir
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
    </div>
    <div class="box-body">
     <?php include_once 'linksDistrito.php'; ?>
    </div>
   </div>
  </div>
  <?php 
  } else { } 
    //CHAMANDO AS QUERIES DE ASSOCIADOS E PROJETOS
   $QtAM = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssGenero = 'M'")->fetchColumn();
   $QtAF = $PDO->query("SELECT COUNT(*) FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssGenero = 'F'")->fetchColumn();
   $ProA = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_status='3'")->fetchColumn();
   $ProP = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_status='2'")->fetchColumn();
   $ProR = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_status='1'")->fetchColumn();



  ?>
  </div>
  <h4 class="page-header">Interact Brasil - Visão Geral</h4>
   <div class="row">
    <div class="col-md-4">
     <div class="box box-solid">
      <div class="box-header with-border"><h3 class="box-title">Associados</h3>
      <div class="box-tools pull-right">Clique para expandir
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      </div>
      <div class="box-body">
       <div class="row">
        <div class="col-md-12">
         <div class="chart-responsive">
          <div id="donutchart2" ></div>
         </div>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
   	    <div class="info-box2 bg-aqua">
         <span class="info-box-mini"><img src="dist/img/icons/boy.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">MASCULINO</span>
           <span class="info-box-number"><?php echo $QtAM; ?> Associados</span>
          </div>
         </div>
        </li>
        <li>
   	    <div class="info-box2 bg-maroon">
         <span class="info-box-mini"><img src="dist/img/icons/girl.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">FEMININO</span>
           <span class="info-box-number"><?php echo $QtAF; ?> Associados</span>
          </div>
         </div>
        </li>
       </ul>
      </div> 
     </div>
    </div>
    <div class="col-md-4">
     <div class="box box-solid">
      <div class="box-header with-border"><h3 class="box-title">Projetos</h3>
      <div class="box-tools pull-right">Clique para expandir
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      </div>
      </div>
      <div class="box-body">
       <div class="row">
        <div class="col-md-12">
         <div class="chart-responsive">
          <div id="donutchart" ></div>
         </div>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
   	    <div class="info-box2 bg-green">
         <span class="info-box-icon2"><i class="glyphicon glyphicon-ok"></i></span>
          <div class="info-box-content2">
           <span class="info-box-text2">APROVADOS</span>
           <span class="info-box-number"><?php echo $ProA; ?> Projetos</span>
          </div>
         </div>
        </li>
        <li>
   	    <div class="info-box2 bg-orange">
         <span class="info-box-icon2"><i class="glyphicon glyphicon-remove"></i></span>
          <div class="info-box-content2">
           <span class="info-box-text2">PENDENTES/REPROVADOS</span>
           <span class="info-box-number"><?php echo $ProP; ?> Projetos</span>
          </div>
         </div>
        </li>
       </ul>
      </div> 
     </div>
    </div>
    <div class="row">
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Brasil/Associados.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/studying.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Associados</h4></div>
      </div>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Associados/dashboard.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/law.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Clubes</h4></div>
      </div>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Associados/dashboard.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/lecture.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Distritos</h4></div>
      </div>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Brasil/Projetos.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/calculation.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Corrigir Projetos</h4></div>
      </div>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Associados/dashboard.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/usr.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Gerenciar Logins</h4></div>
      </div>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box2">
       <a href="Associados/dashboard.php" >
        <span class="info-box-icon3 bg-white"><img src="dist/img/icons/ereader.png" width="45"></span>
       </a>
       <div class="info-box-content2"><h4>Configurações</h4></div>
      </div>
     </div>
    </div>
</section>


<script src="plugins/morris/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'chartSocios',
      resize: true,
      colors: ["#ff0033", "#aadd22"],
      data: [
        {label: "Pendentes/Reprovados", value: <?php echo $ProP; ?>},
        {label: "Aprovados", value: <?php echo $ProA; ?>}
      ],
      hideHover: 'auto'
    });

  });
</script>
