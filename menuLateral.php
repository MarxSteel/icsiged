<div class="user-panel">
 <div class="pull-left image">
  <img src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoUsuario; ?>" class="img-circle" alt="Foto do perfil de <?php echo $uNome; ?>">
 </div>
 <div class="pull-left info">
  <p>
  <?php echo substr($uNome, 0, 20); ?></p>
  <a href="#"><i class="fa fa-users text-success"></i><b>Login: </b><?php echo $login; ?></a>
 </div>
</div>
<ul class="sidebar-menu">
 <li class="header"></li>
  <li class="<?php echo $cHome; ?>">
   <a href="<?php echo $server; ?>/dashboard.php">
    <i class="fa fa-home"></i> <span>In&iacute;cio</span>
   </a>
  </li>
  <li class="treeview <?php echo $Submenu; ?>">
   <a href="#">
    <i class="fa fa-building"></i> <span>Meu Distrito</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
    <li class="<?php echo $cDistrito; ?>">
     <a href="<?php echo $server; ?>/Distrito/dashboard.php">
      <i class="fa fa-building"></i>
      Meu Distrito
     </a>
    </li>
   <?php if ($PrivClubes === "1") { ?>
    <li class="<?php echo $cClubes; ?>">
     <a href="<?php echo $server; ?>/Clubes/dashboard.php">
      <i class="fa fa-industry"></i>
      Clubes
     </a>
    </li>
    <?php } else { } if ($PrivAssociado === "1") { ?>
    <li class="<?php echo $cAssociados; ?>">
     <a href="<?php echo $server; ?>/Associados/dashboard.php">
      <i class="fa fa-users"></i>
      Associados
     </a>
    </li>
    <?php } else { } if ($PrivTesouraria === "1") { ?>
    <li class="<?php echo $cTesouraria; ?>">
     <a href="<?php echo $server; ?>/Tesouraria/dashboard.php">
      <i class="fa fa-dollar"></i>Tesouraria</a>
    </li>
   </ul>

    <?php } else { } if ($PrivANP === "1") { ?>
    <li class="<?php echo $cProj; ?>">
     <a href="<?php echo $server; ?>/ANP/dashboard.php">
      <i class="fa fa-file-text"></i>Cadastro de Projetos</a>
    </li>
   <!--
    <li class="<?php echo $cANP; ?>">
     <a href="<?php echo $server; ?>/ANP/arquivo.php">
      <i class="fa fa-list-alt"></i>Arquivo Nacional de Projetos</a>
    </li>-->
    <?php } else { } ?>
 </li>

  <li class="<?php echo $cPerfil; ?>">
   <a href="<?php echo $server; ?>/MeuPerfil/dashboard.php">
    <i class="fa fa-users"></i> <span>Meu Perfil</span>
   </a>
  </li>
 <li class="header"></li>
 <li>
  <a href="#">
  <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#Sobre">Sobre o SIGED</button>
  </a>
 </li>
 <li>
  <a href="#">
  <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#TermosUso">Termos de Uso</button>
  </a>
 </li>
</ul>