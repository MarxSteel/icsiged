<!-- MODAL DOS DISTRITOS DO SUL -->
<div id="MembroEquipe" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header shazam-vermelho">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Adicionar Membro da Equipe Distrital</h4>
   </div>
   <div class="modal-body">

    <form onsubmit="return valida_form();" name="NovoSocio" id="name" method="post" action="" enctype="multipart/form-data">

     <div class="col-md-6 col-xs-12">Associado
      <?php
       $QueryClubes3 = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssDistrito='$Distrito'";
        // seleciona os registros
        $stmt3 = $PDO->prepare($QueryClubes3);
        $stmt3->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="socio" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $r['icbr_uid'] ?>"><?php echo $r['icbr_AssNome'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
     <div class="col-md-6 col-xs-12">Cargo:
      <select class="form-control select3" name="cargo" required="required">
       <option value="" selected="selected">SELECIONE UM CARGO</option>
       <option value="SDI">Secretário Distrital</option>
       <option value="SDI">Tesoureiro Distrital</option>
       <option value="SDI">Protocolo Distrital</option>
       <option value="DDP1">1º Diretor de Projetos</option>
       <option value="DDP2">2º Diretor de Projetos</option>
       <option value="DDP3">3º Diretor de Projetos</option>
       <option value="DDP4">4º Diretor de Projetos</option>
       <option value="IP1">1º Imagem Pública</option>
       <option value="IP2">2º Imagem Pública</option>
       <option value="IP3">3º Imagem Pública</option>
       <option value="IP4">4º Imagem Pública</option>
      </select>
     </div>
      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="btvalidar" type="submit" class="btn btn-primary" id="btvalidar" value="Cadastrar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>
    <?php
    if(@$_POST["btvalidar"])
    {
      $Cargo = $_POST["cargo"];
      $SocioCod = $_POST["socio"];
       $NovoCargo = $PDO->query("UPDATE distrito SET '$Cargo'='$SocioCod' WHERE distrito='$Distrito'");
       if ($NovoCargo) 

               {
        echo '
          <script type="text/JavaScript">alert("Cargo Atualizado com Sucesso!");
          location.href="Distrito.php"</script>';
       }
       else{
        echo '<script type="text/javascript">alert("Não foi possivel");</script>';
        echo '<script type="text/javascript">window.close();</script>';
       }
    }
    ?>
   </div>
    </div>

  </div>
</div>