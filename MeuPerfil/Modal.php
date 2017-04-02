<!-- MODAL DE TROCA DE LOGIN -->
<div id="TLogin" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Login</h4>
   </div>
   <div class="modal-body">
    <form name="TrocaLogin" id="NovoEmail" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Digite o novo Login:
      <input name="login" type="text" required class="form-control" placeholder="email@email.com" />
     </div>
     <div class="col-xs-3">Senha de Administrador
      <input name="passRDI" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3"><br />
      <input name="TrocaApelido" type="submit" class="btn bg-primary btn-block" value="ATUALIZAR DADOS"  />
     </div>
     <div class="modal-footer"><br /><br /><br /></div>
    </form>
    <?php 
    if(@$_POST["TrocaApelido"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) 
     {
      $NovoApelido = $_POST["login"];
      $TrocaApelido = $PDO->query("UPDATE login SET Nome='$NovoApelido' WHERE login='$login'");
      if ($TrocaApelido) {
       echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");location.href="dashboard.php"</script>';
      }
      else{
       echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
       echo '<script type="text/javascript">window.close();</script>';
      }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>


   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE TROCA DE LOGIN -->

<!-- MODAL DE TROCA DE APELIDO -->
<div id="TNome" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-orange">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Apelido</h4>
   </div>
   <div class="modal-body">

    <form name="TrocaApelido" id="NovoEmail" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Digite o novo Apelido:
      <input name="apelido" type="text" required class="form-control" placeholder="email@email.com" />
     </div>
     <div class="col-xs-3">Senha de Administrador
      <input name="passRDI" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3"><br />
      <input name="TrocaApelido" type="submit" class="btn bg-orange btn-block" value="ATUALIZAR DADOS"  />
     </div>
     <div class="modal-footer"><br /><br /><br /></div>
    </form>
    <?php 
    if(@$_POST["TrocaApelido"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) 
     {
      $NovoApelido = $_POST["apelido"];
      $AtualizaNome = $PDO->query("UPDATE login SET Nome='$NovoApelido' WHERE login='$login'");
      if ($AtualizaNome) {
       echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");location.href="dashboard.php"</script>';
      }
      else{
       echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
       echo '<script type="text/javascript">window.close();</script>';
      }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE TROCA DE APELIDO -->

<!-- MODAL PARA TROCA DE EMAIL -->
<div id="TMail" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar E-Mail</h4>
   </div>
   <div class="modal-body">
    <h3><b>E-Mail Atual: </b><?php echo $uMail; ?> </h3>
    <form name="NovoEmail" id="NovoEmail" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Digite o novo email:
      <input name="mail" type="text" required class="form-control" placeholder="email@email.com" />
     </div>
     <div class="col-xs-3">Senha de Administrador
      <input name="passRDI" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3"><br />
      <input name="NovoEmail" type="submit" class="btn bg-red btn-block" value="ATUALIZAR DADOS"  />
     </div>
     <div class="modal-footer"><br /><br /><br /></div>
    </form>
    <?php 
    if(@$_POST["NovoEmail"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) 
     {
      $NovoEmail = $_POST["mail"];
      $AtualizaEmail = $PDO->query("UPDATE icbr_associado SET icbr_AssEmail='$NovoEmail' WHERE icbr_uid='$CodigoAssociado'");
      if ($AtualizaEmail) {
       echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");location.href="dashboard.php"</script>';
      }
      else{
       echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
       echo '<script type="text/javascript">window.close();</script>';
      }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL PARA TROCA DE EMAIL -->

<!-- MODAL PARA TROCA DE SENHA -->
<div id="TPass" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Senha</h4>
   </div>
   <div class="modal-body">
   <form name="TrocaSenha" id="NovoEmail" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Digite a nova senha:
      <input name="NovaSenha" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3">Senha de Administrador
      <input name="passRDI" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3"><br />
      <input name="TrocaSenha" type="submit" class="btn bg-green btn-block" value="ATUALIZAR DADOS"  />
     </div>
     <div class="modal-footer"><br /><br /><br /></div>
    </form>
    <?php 
    if(@$_POST["TrocaSenha"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) 
     {
      $NovaSenha = $_POST["NovaSenha"];
      $CryNovaSenha = md5($NovaSenha);
      $TrocaApelido = $PDO->query("UPDATE login SET senha='$CryNovaSenha' WHERE login='$login'");
      if ($TrocaApelido) {
       echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");location.href="dashboard.php"</script>';
      }
      else{
       echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
       echo '<script type="text/javascript">window.close();</script>';
      }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>


   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL PARA TROCA DE SENHA -->

<!-- MODAL PARA TROCA DE COR -->
<div id="TCor" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-purple">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Cor</h4>
   </div>
   <div class="modal-body">
    <form name="TrocaCor" id="TrocaCor" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Selecione a Cor
      <select class="form-control" name="Cor" required="required">
       <option checked> >>SELECIONE<<</option>
       <option value="blue-light"> Azul / Painel Claro</option>
       <option value="blue"> Azul / Painel Escuro</option>
       <option value="yellow-light"> Laranja / Painel Claro</option>
       <option value="yellow"> Laranja / Painel Escuro</option>
       <option value="green-light"> Verde / Painel Claro</option>
       <option value="green"> Verde / Painel Escuro</option>
       <option value="purple-light"> Roxo / Painel Claro</option>
       <option value="purple"> Roxo / Painel Escuro</option>
       <option value="red-light"> Vermelho / Painel Claro</option>
       <option value="red"> Vermelho / Painel Escuro</option>
       <option value="black-light"> Branco / Painel Claro</option>
       <option value="bllack"> Branco / Painel Escuro</option>
      </select>
     </div>
     <div class="col-xs-3">Senha de Administrador
      <input name="passRDI" type="password" required class="form-control" />
     </div>
     <div class="col-xs-3"><br />
      <input name="TrocaCor" type="submit" class="btn bg-purple btn-block" value="ATUALIZAR DADOS"  />
     </div>
     <div class="modal-footer"><br /><br /><br /></div>
    </form>
    <?php 
    if(@$_POST["TrocaCor"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) 
     {
      $NovaCor = $_POST["Cor"];
      $AtualizaCor = $PDO->query("UPDATE login SET color='$NovaCor' WHERE login='$login'");
      if ($AtualizaCor) {
       echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");location.href="dashboard.php"</script>';
      }
      else{
       echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
       echo '<script type="text/javascript">window.close();</script>';
      }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
      echo '<script type="text/javascript">window.close();</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL PARA TROCA DE COR -->

<!-- MODAL PARA TROCA DE SENHA -->
<div id="FotoPerfil" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Foto</h4>
   </div>
   <div class="modal-body">



   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL PARA TROCA DE SENHA -->

