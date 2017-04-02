<!-- MODAL DE TROCA DE ROTARY CLUB PATROCINADOR -->

<div class="modal fade" id="TrocaRotary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Rotary Club Patrocinador</h4>
      </div>
      <div class="modal-body">
        <h3>Rotary Club Patrocinador Atual: <strong><?php echo $clubeRotary; ?></strong></h3>
       <form name="ReativaClube" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-8">Rotary Club Padrinho
         <input name="RCPadrinho" type="text" required class="form-control" placeholder="Nome Completo do Rotary Club Padrinho" />
        </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="modal-footer"><br /><br /><br />
         <input name="ReativaClube" type="submit" class="btn btn-primary btn-lg btn-block" value="Atualizar Cadastro"  />
        </div>
       </form>
       <?php 
        if(@$_POST["ReativaClube"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $RotaryPadrinho = $_POST['RCPadrinho'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_RotaryPadrinho='$RotaryPadrinho' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            $CodEvento = "102";
            $DescreveEvento = "Troca de Rotary Club Patrocinador ";
             $D1 = "<strong>Rotary Club Anterior: </strong>" . $clubeRotary;
             $D2 = "<br /><strong>Novo Rotary Club: </strong> " . $RotaryPadrinho;
             $D = date('d/m/Y - H:i:s');             
             $D3 =  "<br />Usuário responsável pelo Cadastro: " . $CodigoAssociado . " - " . $uNome;
             $D4 = "<br /><strong>Data de Cadastro: </strong>" . $D3;
              $DetalheInserir = $D1 . $D2 . $D3 . $D4;
            $InsereLog = $PDO->query("INSERT INTO log_dados (usuario, CodEvento, DescreveEvento, DetalhesEvento, TipoLog, CodValidador) VALUES ('$CodigoAssociado', '102', '$DescreveEvento', '$DetalheInserir', '1', '$codClube')");
             if ($InsereLog)
             {
              echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
             }
             else{
              echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x03");</script>';
              echo '<script type="text/javascript">window.close();</script>';
             }
           }
           else
           {
              echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x04");</script>';
              echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("Erro! SENHA INVÁLIDA. Erro: 0x00");</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE RC PATROCINADOR -->
<!-- MODAL DE TROCA DATA DE FUNDACAO DO CLUB -->
<div class="modal fade" id="DataFundacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Data de Fundação do Interact Club</h4>
      </div>
      <div class="modal-body">
        <h3>Data de Fundação/Reativação Atual: <strong><?php echo $clubeDataFundado; ?></strong></h3>
       <form name="TrocaDataFundado" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-4">Data de Funda&ccedil;&atilde;o
         <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
           <input type="text" name="DataFund" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)" required="required" placeholder="Data">
         </div>
        </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="col-xs-4"><br />
         <input name="TrocaDataFundado" type="submit" class="btn btn-danger btn-lg btn-block" value="Atualizar Cadastro"  />
        </div>
        <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["TrocaDataFundado"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $NovaData = $_POST['DataFund'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_DataFundado='$NovaData' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            $CodEvento = "103";
            $DescreveEvento = "Troca de Data de Fundação ";
             $D1 = "<strong>Data anterior: </strong>" . $clubeDataFundado;
             $D2 = "<br /><strong>Nova data: </strong> " . $NovaData;
             $D = date('d/m/Y - H:i:s');             
             $D3 =  "<br />Usuário responsável pelo Cadastro: " . $CodigoAssociado . " - " . $uNome;
             $D4 = "<br /><strong>Data de Cadastro: </strong>" . $D3;
              $DetalheInserir = $D1 . $D2 . $D3 . $D4;
            $InsereLog = $PDO->query("INSERT INTO log_dados (usuario, CodEvento, DescreveEvento, DetalhesEvento, TipoLog, CodValidador) VALUES ('$CodigoAssociado', '103', '$DescreveEvento', '$DetalheInserir', '1', '$codClube')");
             if ($InsereLog)
             {
              echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
             }
             else{
              echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x05");</script>';
              echo '<script type="text/javascript">window.close();</script>';
             }
           }
           else
           {
            echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x06");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("Erro! SENHA INVÁLIDA. Erro: 0x00");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE RC PATROCINADOR -->
<!-- MODAL DE TROCA DADOS DE REUNIÃO -->
<div class="modal fade" id="AlteraReuniao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-purple">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Alterar Dados de Reunião</h4>
      </div>
      <div class="modal-body">
       <form name="TrocaReuniao" id="name" method="post" action="" enctype="multipart/form-data">
       <div class="col-xs-10">Local de Reunião
        <input type="text" name="LocalReuniao" required class="form-control" placeholder="Digite aqui o nome do local de reunião" />
       </div>
       <div class="col-xs-2">Hor&aacute;rio de Reuni&atilde;o
        <input type="text" name="HoraReuniao" required class="form-control" minlength="5" maxlength="5" placeholder="HH:MM" />
       </div>
       <div class="col-xs-3">Periodo
        <select class="form-control" name="PeriodoReuniao" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="semanal"> Semanal</option>
         <option value="quinzenal"> Quinzenal</option>
         <option value="mensal"> Mensal</option>
        </select>
       </div>
       <div class="col-xs-3">Dia da Semana
        <select class="form-control" name="diaSemana" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="Segunda-Feira"> Segunda-Feira</option>
         <option value="Ter&ccedil;a-Feira"> Ter&ccedil;a-Feira</option>
         <option value="Quarta-Feira"> Quarta-Feira</option>
         <option value="Quinta-Feira"> Quinta-Feira</option>
         <option value="Sexta-Feira"> Sexta-Feira</option>
         <option value="Sabado"> S&aacute;bado</option>
         <option value="Domingo"> Domingo</option> 
        </select>
       </div>
       <div class="col-xs-3">Senha de Administrador
        <input name="passRDI" type="password" required class="form-control" />
       </div>
       <div class="col-xs-3"><br />
        <input name="TrocaReuniao" type="submit" class="btn bg-purple btn-block" value="ATUALIZAR DADOS"  />
       </div>
       <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["TrocaReuniao"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $LocalReuniao = $_POST['LocalReuniao'];
          $HoraReuniao = $_POST['HoraReuniao'];
          $PeriodoReuniao = $_POST['PeriodoReuniao'];
          $DiaReuniao = $_POST['diaSemana'];
          $NovaData = $_POST['DataFund'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_Periodo='$PeriodoReuniao' , icbr_Semana='$DiaReuniao', icbr_Horario='$HoraReuniao', icbr_Complemento='$LocalReuniao'  WHERE icbr_id='$codClube' ");
           if($executa)
           {
            $CodEvento = "104";
            $DescreveEvento = "Troca de Dados de Reunião ";
             $D = date('d/m/Y - H:i:s');             
             $D3 =  "<br />Usuário responsável pelo Cadastro: " . $CodigoAssociado . " - " . $uNome;
             $D4 = "<br /><strong>Data de Cadastro: </strong>" . $D3;
              $DetalheInserir = $D3 . $D4;
            $InsereLog = $PDO->query("INSERT INTO log_dados (usuario, CodEvento, DescreveEvento, DetalhesEvento, TipoLog, CodValidador) VALUES ('$CodigoAssociado', '104', '$DescreveEvento', '$DetalheInserir', '1', '$codClube')");
             if ($InsereLog)
             {
              echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
             }
             else{
              echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x07");</script>';
              echo '<script type="text/javascript">window.close();</script>';
             }
           }
           else
           {
            echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x08");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("Erro! SENHA INVÁLIDA. Erro: 0x00");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DADOS DE REUNIÃO -->
<!-- MODAL DE TROCA DE ENDEREÇO -->
<div id="AlteraEndereco" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-yellow">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Endereço</h4>
   </div>
   <div class="modal-body">
    <form name="AlteraEndereco" method="post" action="" enctype="multipart/form-data">
       <div class="col-xs-10">Endere&ccedil;o
        <input type="text" name="rua" required class="form-control" placeholder="RUA SETE DE SETEMBRO" />
       </div>
       <div class="col-xs-2">N&uacute;mero
        <input type="text" name="num" required class="form-control"/>
       </div>
       <div class="col-xs-4">Complemento
        <input name="complementoEndereco" type="text" required class="form-control" />
       </div>
       <div class="col-xs-4">Bairro
        <input type="text" name="bairro" required class="form-control" placeholder="BAIRRO" />
       </div>
       <div class="col-xs-4">Cidade
        <input type="text" name="cidade" required class="form-control" placeholder="CIDADE" />
       </div>
       <div class="col-xs-4">Estado
        <select class="form-control" name="UF" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="AC"> Acre</option>
         <option value="AL"> Alagoas</option>
         <option value="AM"> Amap&aacute;</option>
         <option value="BA"> Bahia</option>
         <option value="CE"> Cear&aacute;</option>
         <option value="DF"> Distrito Federal</option>
         <option value="ES"> Esp&iacute;rito Santo</option>
         <option value="GO"> Goi&aacute;</option>
         <option value="MA"> Maranh&atilde;o</option>
         <option value="MT"> Mato Grosso</option>
         <option value="MS"> Mato Grosso do Sul</option>
         <option value="MG"> Minas Gerais</option>
         <option value="PA"> Par&aacute;</option>
         <option value="PB"> Para&iacute;ba</option>
         <option value="PR"> Paran&aacute;</option>
         <option value="PE"> Pernambuco</option>
         <option value="PI"> Piau&iacute;</option>
         <option value="RJ"> Rio de Janeiro</option>
         <option value="RN"> Rio Grande do Norte</option>
         <option value="RS"> Rio Grande do Sul</option>
         <option value="RO"> Rond&ocirc;nia</option>
         <option value="RR"> Roraima</option>
         <option value="SC"> Santa Catarina</option>
         <option value="SP"> S&atilde;o Paulo</option>
         <option value="SE"> Sergipe</option>
        </select>
       </div>
       <div class="col-xs-4">CEP (COM PONTUAÇÃO)
        <input type="text" name="CEPEndereco" required class="form-control" minlength="10" maxlength="10" placeholder="12.345-678" />
       </div>
       <div class="col-xs-4">Senha de Administrador
        <input name="passRDI" type="password" required class="form-control" />
       </div>
       <div class="col-xs-12"><br />
        <input name="AlteraEndereco" type="submit" class="btn btn-warning btn-block" value="ATUALIZAR ENDEREÇO"  />
       </div>
       <div class="modal-footer"><br /><br /><br />
        </div>
       </form>
       <?php 
        if(@$_POST["AlteraEndereco"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $Rua = $_POST['rua'];
          $Num = $_POST['num'];
          $CEPEndereco = $_POST['CEPEndereco'];
          $CompEndereco = $_POST['complementoEndereco'];
          $Bairro = $_POST['bairro'];
          $Cidade = $_POST['cidade'];
          $UF = $_POST['UF'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_CEnd='$Rua', icbr_CNum='$Num', icbr_Bairro='$Bairro', icbr_Cidade='$Cidade', icbr_UF='$UF', icbr_CEP='$CEPEndereco', icbr_EndComplemento='$CompEndereco' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
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
<!-- FIM DO MODAL DE TROCA DE ENDEREÇO -->
<!-- Cadastro de novo clube -->
<div id="NovoClub" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-blue-gradient">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar Novo Clube</h4>
   </div>
   <div class="modal-body">
    <form name="NovoClube" id="NovoClube" method="post" action="" enctype="multipart/form-data">
     <div class="col-md-4 col-xs-12">Interact Club de:
      <input type="text" name="NomeClube" class="form-control" placeholder="Curitiba Leste" />
     </div>
     <div class="col-md-4 col-xs-12">Rotary Club Patrocinador (Nome Completo):
      <input type="text" name="NomeRotary" class="form-control" placeholder="Rotary Club de Curitiba Leste" />
     </div>
     <div class="col-md-4 col-xs-12">Data de Fundação
     <div class="input-group">
      <div class="input-group-addon">
       <i class="fa fa-calendar"></i>
      </div>
       <input type="text" name="DataFundado" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)"  placeholder="Data de Funda&ccedil;&atilde;o">
      </div>
      </div>
      <div class="col-xs-12">
      <h5><strong>DADOS DE REUNI&Atilde;O</strong></h5>
      </div>
       <div class="col-md-4 col-xs-12">Local de Reunião
        <input type="text" name="LocalReuniao"  class="form-control" placeholder="Digite aqui o nome do local de reunião" />
       </div>
       <div class="col-md-2 col-xs-6">Hor&aacute;rio de Reuni&atilde;o
        <input type="text" name="HoraReuniao"  class="form-control" minlength="5" maxlength="5" placeholder="HH:MM" />
       </div>
       <div class="col-md-3 col-xs-6">Periodo
        <select class="form-control" name="PeriodoReuniao" >
         <option checked> >>SELECIONE<<</option>
         <option value="semanal"> Semanal</option>
         <option value="quinzenal"> Quinzenal</option>
         <option value="mensal"> Mensal</option>
        </select>
       </div>
       <div class="col-md-3 col-xs-12">Dia da Semana
        <select class="form-control" name="diaSemana" >
         <option checked> >>SELECIONE<<</option>
         <option value="Segunda-Feira"> Segunda-Feira</option>
         <option value="Ter&ccedil;a-Feira"> Ter&ccedil;a-Feira</option>
         <option value="Quarta-Feira"> Quarta-Feira</option>
         <option value="Quinta-Feira"> Quinta-Feira</option>
         <option value="Sexta-Feira"> Sexta-Feira</option>
         <option value="Sabado"> S&aacute;bado</option>
         <option value="Domingo"> Domingo</option> 
        </select>
       </div>
      <div class="col-xs-12">
      <h5><strong>DADOS DE ENDERE&Ccedil;O</strong></h5>
      </div>
       <div class="col-md-10 col-xs-8">Endere&ccedil;o
        <input type="text" name="rua"  class="form-control" placeholder="RUA SETE DE SETEMBRO" />
       </div>
       <div class="col-md-2 col-xs-4">N&uacute;mero
        <input type="text" name="num"  class="form-control"/>
       </div>
       <div class="col-md-4 col-xs-12">Complemento
        <input type="text" name="novoComp"  class="form-control" placeholder="Ex.: Ao lado da Loja de Ferragens" />
       </div>
       <div class="col-md-4 col-xs-12">Bairro
        <input type="text" name="bairro"  class="form-control" placeholder="BAIRRO" />
       </div>
       <div class="col-md-4 col-xs-12">Cidade
        <input type="text" name="cidade"  class="form-control" placeholder="CIDADE" />
       </div>
       <div class="col-md-4 col-xs-12">Estado
        <select class="form-control" name="UF" required="required">
         <option checked> >>SELECIONE<<</option>
         <option value="AC"> Acre</option>
         <option value="AL"> Alagoas</option>
         <option value="AM"> Amap&aacute;</option>
         <option value="BA"> Bahia</option>
         <option value="CE"> Cear&aacute;</option>
         <option value="DF"> Distrito Federal</option>
         <option value="ES"> Esp&iacute;rito Santo</option>
         <option value="GO"> Goi&aacute;</option>
         <option value="MA"> Maranh&atilde;o</option>
         <option value="MT"> Mato Grosso</option>
         <option value="MS"> Mato Grosso do Sul</option>
         <option value="MG"> Minas Gerais</option>
         <option value="PA"> Par&aacute;</option>
         <option value="PB"> Para&iacute;ba</option>
         <option value="PR"> Paran&aacute;</option>
         <option value="PE"> Pernambuco</option>
         <option value="PI"> Piau&iacute;</option>
         <option value="RJ"> Rio de Janeiro</option>
         <option value="RN"> Rio Grande do Norte</option>
         <option value="RS"> Rio Grande do Sul</option>
         <option value="RO"> Rond&ocirc;nia</option>
         <option value="RR"> Roraima</option>
         <option value="SC"> Santa Catarina</option>
         <option value="SP"> S&atilde;o Paulo</option>
         <option value="SE"> Sergipe</option>
        </select>
       </div>
       <div class="col-md-4 col-xs-6">CEP (COM PONTUAÇÃO)
        <input type="text" name="CEP"  class="form-control" minlength="10" maxlength="10" placeholder="12.345-678" />
       </div>       
        <div class="col-md-4 col-xs-6">Senha de Administrador
         <input name="passRDI" type="password"  class="form-control" />
        </div>
        <div class="col-xs-12"><br />
         <input name="NovoClub" type="submit" class="btn btn-primary btn-block" value="CADASTRAR CLUBE"  />
        </div>
        <div class="modal-footer"><br /><br /><br />
        </div>
       </form>

       <?php 
        if(@$_POST["NovoClub"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {          
          $NomeClube = $_POST['NomeClube'];
          $NomeRotary = $_POST['NomeRotary'];
          $DataFundado = $_POST['DataFundado'];
          $Rua = $_POST['rua'];
          $Num = $_POST['num'];
          $CEP = $_POST['CEP'];
          $Bairro = $_POST['bairro'];
          $Cidade = $_POST['cidade'];
          $novoComp = $_POST['novoComp'];
          $UF = $_POST['UF'];
          $LocalReuniao = $_POST['LocalReuniao'];
          $HoraReuniao = $_POST['HoraReuniao'];
          $PeriodoReuniao = $_POST['PeriodoReuniao'];
          $DiaReuniao = $_POST['diaSemana'];
          $Cadastra = $PDO->query("INSERT INTO icbr_clube (icbr_Clube, icbr_DataFundado, icbr_Distrito, icbr_RotaryPadrinho, icbr_CEnd, icbr_CNum, icbr_Bairro, icbr_Cidade, icbr_CEP, icbr_UF, icbr_Periodo, icbr_Semana, icbr_Horario, icbr_Complemento, icbr_Status, icbr_EndComplemento) VALUES ('$NomeClube', '$DataFundado', '$Distrito', '$NomeRotary', '$Rua', '$Num', '$Bairro', '$Cidade', '$CEP', '$UF', '$PeriodoReuniao', '$DiaReuniao', '$HoraReuniao', '$LocalReuniao', 'A', '$novoComp')");
           if($Cadastra)
           {
            echo '<script type="text/JavaScript">alert("Clube Cadastrado com Sucesso!");
              location.href="dashboard.php"</script>';


            echo '<script type="text/javascript">alert("Clube Cadastrado com Sucesso!");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("Erro! Não foi possível concluir. Erro: 0x02");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("Erro! SENHA INVÁLIDA. Erro: 0x00");</script>';
          echo '<script type="text/javascript">window.close();</script>';
         }
        }
       ?>    
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- Cadastro de Novo Clube -->
<!-- MODAL DE TROCA E-MAIL -->

<div class="modal fade" id="NovoEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Troca de E-mail</h4>
      </div>
      <div class="modal-body">
        <h3>E-Mail Atual: <strong><?php echo $clubeMail; ?></strong></h3>
       <form name="NovoEmail" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-8">Novo E-mail
         <input name="MailNovo" type="mail" required class="form-control" placeholder="email@mail.com" />
        </div>
        <div class="col-xs-4">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="modal-footer"><br /><br /><br />
         <input name="NovoEmail" type="submit" class="btn btn-primary" value="Atualizar Cadastro"  />
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
       </form>
       <?php 
        if(@$_POST["NovoEmail"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
          $NovoMail = $_POST['MailNovo'];
           $executa = $PDO->query("UPDATE icbr_clube SET icbr_ProjetoEmail='$NovoMail' WHERE icbr_id='$codClube' ");
           if($executa)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="vClube.php?ID=' . $codClube . '"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
         }
         else 
         {
          echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
         }
        }
       ?>
      </div>
    </div>
  </div>
</div>
<!-- FIM DO MODAL DE TROCA DE E-MAIL -->
<!-- MODAL DE ALTERAÇÃO DO PRESIDENTE -->
<div id="NovoPres" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR PRESIDENTE</h4>
   </div>
   <div class="modal-body">
    <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Atenção!</h4>
       É possivel definir como presidente apenas associados com status de ATIVO, se o associado que deseja está desativado, favor reintegrar no cadastro de associados antes de efetuar esta alteração.    
    </div>
        <form name="NovoPresidente" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-md-8">SELECIONE O NOVO PRESIDENTE:
         <?php
          $ChamaSocioPres = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssClubeID='$codClube'";
           // seleciona os registros
           $socioPres = $PDO->prepare($ChamaSocioPres);
           $socioPres->execute();
         ?>
          <div class="form-group">
           <select class="form-control select2" name="presidente" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($SPres = $socioPres->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $SPres['icbr_AssNome'] ?>"><?php echo $SPres['icbr_AssNome'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-xs-4"><br />
          <input name="NovoPresidente" type="submit" class="btn btn-success" id="NovoPresidente" value="ATUALIZAR PRESIDENTE"  />
         </div>
        </form>
        <?php
        if(@$_POST["NovoPresidente"])
        {
         $NvPresidente = $_POST["presidente"];
          $AlteraPresidente = $PDO->query("UPDATE icbr_clube SET icbr_Presidente='$NvPresidente' WHERE icbr_id='$codClube' ");
         if($AlteraPresidente)
         {
          echo '
          <script type="text/JavaScript">alert("Presidente Atualizado com Sucesso");
          location.href="vClube.php?ID=' . $codClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>  
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE ALTERAÇÃO DO PRESIDENTE -->
<!-- MODAL DE ALTERAÇÃO DO SECRETÁRIO -->
<div id="NovoSec" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR SECRETÁRIO</h4>
   </div>
   <div class="modal-body">
    <div class="alert alert-warning alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Atenção!</h4>
       É possivel definir como secretário apenas associados com status de ATIVO, se o associado que deseja está desativado, favor reintegrar no cadastro de associados antes de efetuar esta alteração.    
    </div>
        <form name="NovoSecretario" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-md-8">SELECIONE O NOVO SECRETÁRIO:
         <?php
          $ChamaSocioSec = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssClubeID='$codClube'";
           // seleciona os registros
           $socioSec = $PDO->prepare($ChamaSocioSec);
           $socioSec->execute();
         ?>
          <div class="form-group">
           <select class="form-control select3" name="secretario" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($SSec = $socioSec->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $SSec['icbr_AssNome'] ?>"><?php echo $SSec['icbr_AssNome'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-xs-4"><br />
          <input name="NovoSecretario" type="submit" class="btn btn-danger" id="NovoSecretario" value="ATUALIZAR SECRETARIO"  />
         </div>
        </form>
        <?php
        if(@$_POST["NovoSecretario"])
        {
         $NvSecretario = $_POST["secretario"];
          $AlteraSecretario = $PDO->query("UPDATE icbr_clube SET icbr_Secretario='$NvSecretario' WHERE icbr_id='$codClube' ");
         if($AlteraSecretario)
         {
          echo '
          <script type="text/JavaScript">alert("Secretario Atualizado com Sucesso");
          location.href="vClube.php?ID=' . $codClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>  
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE ALTERAÇÃO DO SECRETÁRIO -->
<!-- MODAL DE ALTERAÇÃO DO TESOUREIRO -->
<div id="NovoTes" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">ATUALIZAR TESOUREIRO</h4>
   </div>
   <div class="modal-body">
    <div class="alert alert-primary alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Atenção!</h4>
       É possivel definir como tesoureiro apenas associados com status de ATIVO, se o associado que deseja está desativado, favor reintegrar no cadastro de associados antes de efetuar esta alteração.    
    </div>
        <form name="NovoTesoureiro" id="name" method="post" action="" enctype="multipart/form-data">
         <div class="col-md-8">SELECIONE O NOVO TESOUREIRO:
         <?php
          $ChamaSocioTes = "SELECT * FROM icbr_associado WHERE icbr_AssStatus='A' AND icbr_AssClubeID='$codClube'";
           // seleciona os registros
           $socioTes = $PDO->prepare($ChamaSocioTes);
           $socioTes->execute();
         ?>
          <div class="form-group">
           <select class="form-control select4" name="tesoureiro" style="width: 100%;">
            <option value="" selected="selected">SELECIONE</option>
            <?php while ($STes = $socioTes->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $STes['icbr_AssNome'] ?>"><?php echo $STes['icbr_AssNome'] ?></option>
            <?php endwhile; ?>
           </select>
          </div>
         </div>
         <div class="col-xs-4"><br />
          <input name="NovoTesoureiro" type="submit" class="btn btn-warning" id="NovoTesoureiro" value="ATUALIZAR TESOUREIRO"  />
         </div>
        </form>
        <?php
        if(@$_POST["NovoTesoureiro"])
        {
         $NvTesoureiro = $_POST["tesoureiro"];
          $AlteraTesoureiro = $PDO->query("UPDATE icbr_clube SET icbr_Tesoureiro='$NvTesoureiro' WHERE icbr_id='$codClube' ");
         if($AlteraTesoureiro)
         {
          echo '
          <script type="text/JavaScript">alert("Tesoureiro Atualizado com Sucesso");
          location.href="vClube.php?ID=' . $codClube . '"</script>';
         }
         else
         {
          echo '<script type="text/javascript">alert("Erro! ' . $PDO->errorInfo() .'");</script>';
         }
        }
        ?>  
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE ALTERAÇÃO DO TESOUREIRO -->





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