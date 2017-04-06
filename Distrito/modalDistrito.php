<!-- TROCAR SDI -->
<div id="SDI" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR SDI</h4>
   </div>
   <div class="modal-body">
   <h3>Selecione o(a) novo(a) Secretário(a) Distrital</h3>
    <form name="SDI" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $SDI = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $SDI = $PDO->prepare($SDI);
        $SDI->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioSDI" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SSDI = $SDI->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SSDI['icbr_uid'] ?>"><?php echo $SSDI['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="SDI" type="submit" class="btn btn-primary" id="SDI" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>
    <?php
    if(@$_POST["SDI"])
    {
     $NovoSDI = $_POST["socioSDI"];
     $executaSDI = $PDO->query("UPDATE distrito SET SDI='$NovoSDI' WHERE distrito='$Distrito' ");
     if($executaSDI)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR SDI -->
<!-- TROCAR TDI -->
<div id="TDI" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR TDI</h4>
   </div>
   <div class="modal-body">
    <form name="TDI" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $TDI = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $TDI = $PDO->prepare($TDI);
        $TDI->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioTDI" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($STDI = $TDI->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $STDI['icbr_uid'] ?>"><?php echo $STDI['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="TDI" type="submit" class="btn btn-primary" id="TDI" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["TDI"])
    {
     $NovoTDI = $_POST["socioTDI"];
     $executaTDI = $PDO->query("UPDATE distrito SET TDI='$NovoTDI' WHERE distrito='$Distrito' ");
     if($executaTDI)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR TDI -->
<!-- TROCAR PDI -->
<div id="PDI" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR PDI</h4>
   </div>
   <div class="modal-body">
    <form name="PDI" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $PDI = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $PDI = $PDO->prepare($PDI);
        $PDI->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioPDI" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SPDI = $PDI->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SPDI['icbr_uid'] ?>"><?php echo $SPDI['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="PDI" type="submit" class="btn btn-primary" id="PDI" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["PDI"])
    {
     $NovoPDI = $_POST["socioPDI"];
     $executaPDI = $PDO->query("UPDATE distrito SET PDI='$NovoPDI' WHERE distrito='$Distrito' ");
     if($executaPDI)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR PDI -->
<!-- TROCAR DDP1 -->
<div id="DDP1" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR DDP1</h4>
   </div>
   <div class="modal-body">
    <form name="DDP1" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $DDP1 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $DDP1 = $PDO->prepare($DDP1);
        $DDP1->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioDDP1" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SDDP1 = $DDP1->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SDDP1['icbr_uid'] ?>"><?php echo $SDDP1['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="DDP1" type="submit" class="btn btn-primary" id="DDP1" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["DDP1"])
    {
     $NovoDDP1 = $_POST["socioDDP1"];
     $executaDDP1 = $PDO->query("UPDATE distrito SET DDP1='$NovoDDP1' WHERE distrito='$Distrito' ");
     if($executaDDP1)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR DDP1 -->
<!-- TROCAR DDP2 -->
<div id="DDP2" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR DDP2</h4>
   </div>
   <div class="modal-body">
    <form name="DDP2" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $DDP2 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $DDP2 = $PDO->prepare($DDP2);
        $DDP2->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioDDP2" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SDDP2 = $DDP2->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SDDP2['icbr_uid'] ?>"><?php echo $SDDP2['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="DDP2" type="submit" class="btn btn-primary" id="DDP2" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["DDP2"])
    {
     $NovoDDP2 = $_POST["socioDDP2"];
     $executaDDP2 = $PDO->query("UPDATE distrito SET DDP2='$NovoDDP2' WHERE distrito='$Distrito' ");
     if($executaDDP2)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR DDP2 -->
<!-- TROCAR DDP3 -->
<div id="DDP3" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR DDP3</h4>
   </div>
   <div class="modal-body">
    <form name="DDP3" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $DDP3 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $DDP3 = $PDO->prepare($DDP3);
        $DDP3->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioDDP3" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SDDP3 = $DDP3->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SDDP3['icbr_uid'] ?>"><?php echo $SDDP3['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="DDP3" type="submit" class="btn btn-primary" id="DDP3" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["DDP3"])
    {
     $NovoDDP3 = $_POST["socioDDP3"];
     $executaDDP3 = $PDO->query("UPDATE distrito SET DDP3='$NovoDDP3' WHERE distrito='$Distrito' ");
     if($executaDDP3)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR DDP3 -->
<!-- TROCAR DDP4 -->
<div id="DDP4" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR DDP4</h4>
   </div>
   <div class="modal-body">
    <form name="DDP4" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $DDP4 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $DDP4 = $PDO->prepare($DDP4);
        $DDP4->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioDDP4" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SDDP4 = $DDP4->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SDDP4['icbr_uid'] ?>"><?php echo $SDDP4['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="DDP4" type="submit" class="btn btn-primary" id="DDP4" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["DDP4"])
    {
     $NovoDDP4 = $_POST["socioDDP4"];
     $executaDDP4 = $PDO->query("UPDATE distrito SET DDP4='$NovoDDP4' WHERE distrito='$Distrito' ");
     if($executaDDP4)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR DDP4 -->
<!-- TROCAR IP1 -->
<div id="IP1" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR IP1</h4>
   </div>
   <div class="modal-body">
    <form name="IP1" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $IP1 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $IP1 = $PDO->prepare($IP1);
        $IP1->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioIP1" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SIP1 = $IP1->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SIP1['icbr_uid'] ?>"><?php echo $SIP1['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="IP1" type="submit" class="btn btn-primary" id="IP1" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["IP1"])
    {
     $NovoIP1 = $_POST["socioIP1"];
     $executaIP1 = $PDO->query("UPDATE distrito SET IP1='$NovoIP1' WHERE distrito='$Distrito' ");
     if($executaIP1)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR IP1 -->
<!-- TROCAR IP2 -->
<div id="IP2" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR IP2</h4>
   </div>
   <div class="modal-body">
    <form name="IP2" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $IP2 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $IP2 = $PDO->prepare($IP2);
        $IP2->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioIP2" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SIP2 = $IP2->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SIP2['icbr_uid'] ?>"><?php echo $SIP2['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="IP2" type="submit" class="btn btn-primary" id="IP2" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["IP2"])
    {
     $NovoIP2 = $_POST["socioIP2"];
     $executaIP2 = $PDO->query("UPDATE distrito SET IP2='$NovoIP2' WHERE distrito='$Distrito' ");
     if($executaIP2)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR IP2 -->
<!-- TROCAR IP3 -->
<div id="IP3" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR IP3</h4>
   </div>
   <div class="modal-body">
    <form name="IP3" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $IP3 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $IP3 = $PDO->prepare($IP3);
        $IP3->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioIP3" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SIP3 = $IP3->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SIP3['icbr_uid'] ?>"><?php echo $SIP3['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="IP3" type="submit" class="btn btn-primary" id="IP3" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["IP3"])
    {
     $NovoIP3 = $_POST["socioIP3"];
     $executaIP3 = $PDO->query("UPDATE distrito SET IP3='$NovoIP3' WHERE distrito='$Distrito' ");
     if($executaIP3)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR IP3 -->
<!-- TROCAR IP4 -->
<div id="IP4" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR IP4</h4>
   </div>
   <div class="modal-body">
    <form name="IP4" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Associado
      <?php
       $IP4 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $IP4 = $PDO->prepare($IP4);
        $IP4->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socioIP4" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($SIP4 = $IP4->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $SIP4['icbr_uid'] ?>"><?php echo $SIP4['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="IP4" type="submit" class="btn btn-primary" id="IP4" value="Atualizar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>    
    <?php
    if(@$_POST["IP4"])
    {
     $NovoIP4 = $_POST["socioIP4"];
     $executaIP4 = $PDO->query("UPDATE distrito SET IP4='$NovoIP4' WHERE distrito='$Distrito' ");
     if($executaIP4)
     {
      echo '<script type="text/javascript">alert("ATUALIZADO COM SUCESSO");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
     else
     {
      echo '<script type="text/javascript">alert("Não foi possivel");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- TROCAR IP4 -->
<!-- ESTATÍSTICAS DE ASSOCIADOS -->
<div id="EstSocios" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Estatísticas de Associados</h4>
   </div>
   <div class="modal-body">
    
   
    <div class="box box-solid">
      <div class="box-body">
       <div class="row">
        
         <div class="chart-responsive">
          <div id="associados" style="width: 500px; height: 250px;"></div>
         </div>

       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
        <div class="info-box2 bg-aqua">
         <span class="info-box-mini"><img src="../dist/img/icons/boy.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">MASCULINO</span>
           <span class="info-box-number"><?php echo $AM; ?> Associados</span>
          </div>
         </div>
        </li>
        <li>
        <div class="info-box2 bg-maroon">
         <span class="info-box-mini"><img src="../dist/img/icons/girl.png" width="50"></span>
          <div class="info-box-content2">
           <span class="info-box-text2">FEMININO</span>
           <span class="info-box-number"><?php echo $AF; ?> Associados</span>
          </div>
         </div>
        </li>
       </ul>
      </div> 
     </div>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- estatísticas de associado -->
<!-- ESTATÍSTICAS DE PROJETOS -->
<div id="PROJETOS" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Preço</h4>
   </div>
   <div class="modal-body">
      <div class="box-body">
       <div class="row">
        <div class="col-md-12">
         <div class="chart-responsive">
          <div id="listaProjetos"></div>
         </div>
        </div>
       </div>
      </div>

      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
         <div class="info-box2 shazam-verde">
          <span class="info-box-icon5"><i class="fa fa-money"></i></span>
           <div class="info-box-content3"><strong>FINANÇAS</strong>
           <i class="pull-right"><?php echo $QtFinancas; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-vermelho">
          <span class="info-box-icon5"><i class="fa fa-laptop"></i></span>
           <div class="info-box-content3"><strong>IMAGEM PÚBLICA</strong>
           <i class="pull-right"><?php echo $QtIP; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-azul">
          <span class="info-box-icon5"><i class="fa fa-child"></i></i></span>
           <div class="info-box-content3"><strong>COMUNIDADES</strong>
           <i class="pull-right"><?php echo $QtComunidades; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-roxo">
          <span class="info-box-icon5"><i class="glyphicon glyphicon-globe"></i></span>
           <div class="info-box-content3"><strong>INTERNACIONAIS</strong>
           <i class="pull-right"><?php echo $QtInternacionais; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-laranja">
          <span class="info-box-icon5"><i class="fa fa-heartbeat"></i></span>
           <div class="info-box-content3"><strong>INTERNOS</strong>
           <i class="pull-right"><?php echo $QtInternos; ?> PROJETOS</i>
           </div>
          </div>
        </li>
       </ul>
      </div> 
      
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- ESTATÍSTICAS DE PROJETOS -->




<!-- MODAL DE EXEMPLO -->
<div id="modalnovo" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Preço</h4>
   </div>
   <div class="modal-body">
    

   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE EXEMPLO -->