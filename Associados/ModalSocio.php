<!-- INÍCIO DO MODAL DE ADICIONAR CARGO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovoCargo" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Adicionar novo Cargo ao Histórico do associado</h4>
    </div>
    <div class="box-body">
     <div class="col-md-12">
      <div class="box box-success collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">ADICIONAR CARGO DO CLUBE</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">
        <form name="NovoCargoClube" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-xs-4">Distrito
          <input class="form-control" disabled="disabled" TYPE="text" VALUE="<?php echo $DistritoSocio; ?>">
         </div>
         <div class="col-md-8">SELECIONE O CLUBE:
         <?php
          $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
           // seleciona os registros
           $stmt3 = $PDO->prepare($QueryClubes3);
           $stmt3->execute();
         ?>
          <div class="form-group">
           <select class="form-control select2" name="cl" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $r['icbr_Clube'] ?>"><?php echo $r['icbr_Clube'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-md-4">GESTÃO:
          <?php
           $ChamaGestao = "SELECT * FROM Gestoes  ORDER BY id DESC";// seleciona os registros
           $QryGestao = $PDO->prepare($ChamaGestao);
           $QryGestao->execute();
          ?>
          <div class="form-group">
           <select class="form-control select2" name="gestao" style="width: 100%;" required>
            <option value="" selected="selected">SELECIONE</option>
              <?php while ($Gestao = $QryGestao->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $Gestao['Gestao'] ?>"><?php echo $Gestao['Gestao'] ?></option>
              <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-md-8">Cargo:
          <?php
           $ChamaCargo = "SELECT * FROM ListaCargos WHERE TipoCargo=1";// seleciona os registros
            $stmt2 = $PDO->prepare($ChamaCargo);
            $stmt2->execute();
          ?>
          <div class="form-group">
           <select class="form-control select3" name="cargo" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
             <?php while ($c = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $c['NomeCargo'] ?>"><?php echo $c['NomeCargo'] ?></option>
             <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-xs-12"><br />
          <input name="NovoCargoClube" type="submit" class="btn btn-success btn-block" id="NovoCargoClube" value="Adicionar Cargo"  />
         </div>
        </form>
        <?php
        if(@$_POST["NovoCargoClube"])
        {
         $Gestao = $_POST["gestao"];
         $TipoCargo = '1';
         $Clube = $_POST["cl"];
         $Cargo = $_POST["cargo"];
         $executa = $PDO->query("INSERT INTO icbr_historico (hist_uid, hist_Gestao, hist_Cargo, hist_Clube, hist_Distrito, hist_Tipo) VALUES ('$IDClube', '$Gestao', '$Cargo', '$Clube', '$DistritoSocio', '$TipoCargo')");
         if($executa)
         {
          echo '
          <script type="text/JavaScript">alert("Cargo Adicionado com Sucesso");
          location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>      
       </div>
      </div>
     </div> 
     <div class="col-md-12">
      <div class="box box-warning collapsed-box box-solid">
       <div class="box-header with-border">
        <h3 class="box-title">ADICIONAR CARGO DISTRITAL</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool btn-default" data-widget="collapse"><i class="fa fa-plus"></i> Clique aqui para expandir</button>
        </div>
       </div>
       <div class="box-body">
        <form name="NovoCargoDistrito" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-xs-4">Distrito
          <input class="form-control" disabled="disabled" TYPE="text" VALUE="<?php echo $DistritoSocio; ?>">
         </div>
         <div class="col-md-8">SELECIONE O CLUBE:
         <?php
          $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
           // seleciona os registros
           $stmt3 = $PDO->prepare($QueryClubes3);
           $stmt3->execute();
         ?>
          <div class="form-group">
           <select class="form-control select2" name="Dcl" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $r['icbr_Clube'] ?>"><?php echo $r['icbr_Clube'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-md-4">GESTÃO:
          <?php
           $ChamaGestao = "SELECT * FROM Gestoes  ORDER BY id DESC";// seleciona os registros
           $QryGestao = $PDO->prepare($ChamaGestao);
           $QryGestao->execute();
          ?>
          <div class="form-group">
           <select class="form-control select2" name="Dgestao" style="width: 100%;" required>
            <option value="" selected="selected">SELECIONE</option>
              <?php while ($Gestao = $QryGestao->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $Gestao['Gestao'] ?>"><?php echo $Gestao['Gestao'] ?></option>
              <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-md-8">Cargo:
          <?php
           $ChamaCargo = "SELECT * FROM ListaCargos WHERE TipoCargo=2";// seleciona os registros
            $stmt2 = $PDO->prepare($ChamaCargo);
            $stmt2->execute();
          ?>
          <div class="form-group">
           <select class="form-control select3" name="Dcargo" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
             <?php while ($c = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $c['NomeCargo'] ?>"><?php echo $c['NomeCargo'] ?></option>
             <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-xs-12"><br />
          <input name="NovoCargoDistrito" type="submit" class="btn btn-warning btn-block" id="NovoCargoClube" value="Adicionar Cargo"  />
         </div>         
        </form>
        <?php
        if(@$_POST["NovoCargoDistrito"])
        {
         $Gestao = $_POST["Dgestao"];
         $TipoCargo = '2';
         $Clube = $_POST["Dcl"];
         $Cargo = $_POST["Dcargo"];
         $executa = $PDO->query("INSERT INTO icbr_historico (hist_uid, hist_Gestao, hist_Cargo, hist_Clube, hist_Distrito, hist_Tipo) VALUES ('$IDClube', '$Gestao', '$Cargo', '$Clube', '$DistritoSocio', '$TipoCargo')");
         if($executa)
         {
          echo '
          <script type="text/JavaScript">alert("Cargo Adicionado com Sucesso");
          location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>    
       </div>
      </div>
     </div> 
    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE ADICIONAR CARGO -->
<!-- INÍCIO DO MODAL DE TROCAR FOTO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovaFoto" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Trocar Foto </h4>
    </div>
    <div class="box-body">
     <form name="trocarFoto" id="name" method="post" action="" enctype="multipart/form-data">
       Selecione uma imagem: <input name="arquivo" type="file" />
     <br />
       <input type="submit" value="Salvar" />
    </form>
<?php
// verifica se foi enviado um arquivo 
if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{
  $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
  $nome = $_FILES['arquivo']['name'];
  // Pega a extensao
  $extensao = strrchr($nome, '.');
  // Converte a extensao para mimusculo
  $extensao = strtolower($extensao);
  // Somente imagens, .jpg;.jpeg;.gif;.png
  // Aqui eu enfilero as extesões permitidas e separo por ';'
  // Isso server apenas para eu poder pesquisar dentro desta String
  if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
  {
    // Cria um nome único para esta imagem
    // Evita que duplique as imagens no servidor.
    $novoNome = md5(microtime()) . $extensao;
    
    // Concatena a pasta com o nome
    $destino = '../dist/img/perfil/' . $novoNome; 
    
    // tenta mover o arquivo para o destino
    if( @move_uploaded_file( $arquivo_tmp, $destino  ))
    {
      $InsereFoto = $PDO->query("UPDATE icbr_associado SET icbr_AssFoto='$novoNome' WHERE icbr_uid='$IDClube'");
       if ($InsereFoto) 
       {
        echo '
          <script type="text/JavaScript">alert("FOTO DE PERFIL SALVA COM SUCESSO!");
          location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
       }
       else{
        echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL SALVAR FOTO DE PERFIL!");</script>';
        echo '<script type="text/javascript">window.close();</script>';
       }
    }
    else
        echo '<script type="text/javascript">alert("Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita! ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
        echo '<script type="text/javascript">window.close();</script>';
  }
  else
   echo '<script type="text/javascript">alert("ocê poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"");</script>';
   echo '<script type="text/javascript">window.close();</script>';     
}
?>

    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE TROCAR FOTO -->

<!-- INÍCIO DO MODAL DE REATIVAR ASSOCIADO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="Reintegra" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">Readmitir associado</h4>
    </div>
    <div class="box-body">
     <form name="Reativa" id="name" method="post" action="" enctype="multipart/form-data">
      <div class="col-md-8">SELECIONE O CLUBE:
      <?php
       $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
       // seleciona os registros
       $stmt3 = $PDO->prepare($QueryClubes3);
       $stmt3->execute();
      ?>
       <div class="form-group">
        <select class="form-control select2" name="cl" style="width: 100%;">
         <option value="" selected="selected">SELECIONE</option>
          <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
         <option value="<?php echo $r['icbr_Clube'] ?>"><?php echo $r['icbr_Clube'] ?></option>
          <?php endwhile; ?>
        </select>
       </div>
      </div>
       <div class="col-xs-4"><br />
        <input name="Reativa" type="submit" class="btn btn-success btn-block" id="Reativa" value="REATIVAR ASSOCIADO"  />
       </div>
      </form>
      <?php
      if(@$_POST["Reativa"]){
        $NomeClube = $_POST['cl'];      //AQUI CHAMA O NOME DO CLUBE BASEADO NO FORM
        $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_Clube='$NomeClube'");
        $Dados->execute();
        $Qry = $Dados->fetch();
        $IDNClube = $Qry['icbr_id'];    
        $executa = $PDO->query("UPDATE icbr_associado SET icbr_AssStatus='A', icbr_AssClube='$NomeClube', icbr_AssClubeID='$IDNClube' WHERE icbr_uid='$IDClube' ");
        if($executa)
        {
        echo '
        <script type="text/JavaScript">alert("Associado Reativado com Sucesso");</script>
        <script type="text/JavaScript">window.close();</script>';
        }
        else{
      echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
        }
      }
      ?>


    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE REATIVAR ASSOCIADO -->



<!-- INÍCIO DO MODAL DE DESATVIAR ASSOCIADO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="Desativa" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">DESATIVAR ASSOCIADO</h4>
    </div>
    <div class="box-body">
    <h2> ATENÇÃO, DESEJA REALMENTE DESLIGAR O ASSCIADO? </h2>
     <form name="Desativa" id="name" method="post" action="" enctype="multipart/form-data">
      <div class="col-xs-12"><br />
       <input name="Desativa" type="submit" class="btn btn-danger btn-block btn-lg" id="Desativa" value="SIM, DESATIVAR ASSOCIADO"  />
      </div>
     </form>
     <?php
     if(@$_POST["Desativa"]){
      $DesativaAssociado = $PDO->query("UPDATE icbr_associado SET icbr_AssStatus='I' WHERE icbr_uid='$IDClube' ");
       if($DesativaAssociado)
        {
         echo '
         <script type="text/JavaScript">alert("Associado Desligado com Sucesso");</script>
         <script type="text/JavaScript">window.close();</script>';
        }
        else
        {
         echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
        }
      }
      ?>
    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE DESATIVAR ASSOCIADO -->



<!-- INÍCIO DO MODAL DE ADICIONAR PREMIAÇÃO DO ASSOCIADO -->
<div clss="main-box-body clearfix">
 <div class="modal fade" id="NovoPremio" tabindex"-1" role="dialog" aria-abeledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><code>&times;</code></span></button>
      <h4 class="modal-title">ADICIONAR PREMIAÇÃO DE ASSOCIADO</h4>
    </div>
    <div class="box-body">
    <form name="NovoPremio" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-3">Distrito
      <input class="form-control" disabled="disabled" TYPE="text" VALUE="<?php echo $DistritoSocio; ?>">
     </div>
     <div class="col-xs-6">Prêmio
      <input class="form-control" type="text" name="premio" required">
     </div>
     <div class="col-md-3">GESTÃO:
      <?php
       $ChamaGestao = "SELECT * FROM Gestoes  ORDER BY id DESC";
        // seleciona os registros
        $QryGestao = $PDO->prepare($ChamaGestao);
        $QryGestao->execute();
       ?>
     <div class="form-group">
      <select class="form-control select2" name="gestao" style="width: 100%;" required>
       <option value="" selected="selected">SELECIONE</option>
        <?php while ($Gestao = $QryGestao->fetch(PDO::FETCH_ASSOC)): ?>
       <option value="<?php echo $Gestao['Gestao'] ?>"><?php echo $Gestao['Gestao'] ?></option>
       <?php endwhile; ?>
      </select>
     </div>
    </div>
    <div class="col-xs-12"><br />
     <input name="NovoPremio" type="submit" class="btn btn-success btn-block" id="NovoCargoClube" value="ADICIONAR PREMIAÇÃO"  />
    </div>
    </form>
    <?php
     if(@$_POST["NovoPremio"])
     {
      $Gestao = $_POST["gestao"];
      $Premio = $_POST["premio"];
       $AdicionaPremio = $PDO->query("INSERT INTO icbr_historico (hist_uid, hist_Gestao, hist_Cargo, hist_Distrito, hist_Tipo) VALUES ('$IDClube', '$Gestao', '$Premio', '$Distrito', '4')");
       if ($AdicionaPremio) 
         {
          echo '
          <script type="text/JavaScript">alert("Cargo Adicionado com Sucesso");
          location.href="VerSocio.php?ID=' . $IDClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }

        }
        ?>    
    </div><!-- /.box-body -->
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE ADICIONAR PREMIAÇÃO DO ASSOCIADO -->