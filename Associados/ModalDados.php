<!-- INÍCIO DO MODAL DE CADASTRO DE ASSOCIADO -->
<div id="NovoSocio" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar Associado</h4>
   </div>
   <div class="modal-body">
    <div class="alert alert-danger alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
     Obrigatoriamente, é necessário digitar o CPF com Pontos e traços, ou seja: 012.345.678-90.
    </div>
    <form onsubmit="return valida_form();" name="NovoSocio" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-xs-12">Nome Completo
      <input type="text" name="nome" class="form-control" required>
     </div>
     <div class="col-md-4 col-xs-12">Tipo de Documento
      <select class="form-control" name="docto" required>
       <option value="" selected="selected">SELECIONE</option>
       <option value="CPF">CPF</option>
       <option value="RG">RG</option>
      </select>
     </div>
     <div class="col-md-4 col-xs-12">CPF
      <input type="text" name="cpf"  minlength="14" maxlength="14" class="form-control" placeholder="999.999.999-99">
     </div>
     <div class="col-md-4 col-xs-12">RG
      <input type="text" name="rg"  minlength="14" maxlength="14" class="form-control" placeholder="12.345.678-90">
     </div>
     <div class="col-md-6 col-xs-12">Interact Club de:
      <?php
       $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
        // seleciona os registros
        $stmt3 = $PDO->prepare($QueryClubes3);
        $stmt3->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="clube" style="width: 100%;" required>
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $r['icbr_id'] ?>"><?php echo $r['icbr_Clube'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
     <div class="col-md-6 col-xs-12">Cargo:
      <?php
       $ChamarCargo = "SELECT * FROM listaCargos WHERE TipoCargo = 1";
        // seleciona os registros
        $qryCargo = $PDO->prepare($ChamarCargo);
        $qryCargo->execute();
      ?>
      <div class="form-group">
       <select class="form-control select5" name="cargo" style="width: 100%;">
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($cargoNovo = $qryCargo->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $cargoNovo['NomeCargo'] ?>"><?php echo $cargoNovo['NomeCargo'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
     <div class="col-md-4 col-xs-6">Data de Posse
      <div class="input-group">
       <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
       <input type="text" name="posse" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
      </div>
     </div>
     <div class="col-md-4 col-xs-6">Data de Nascimento
      <div class="input-group">
       <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
       <input type="text" name="nasc" required="required" class="form-control" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)" >
      </div>
     </div>
     <div class="col-md-4 col-xs-12">Gênero
      <select class="form-control" name="genero" required="required>
       <option value="" selected="selected">SELECIONE</option>
       <option value="M">Masculino</option>
       <option value="F">Feminino</option>
      </select>
     </div>
     <br /><h4>Dados de Endereço</h4>
      <div class="col-xs-9">Rua
       <input type="text" name="rua" class="form-control" required >
      </div>
      <div class="col-xs-3">Nº
       <input type="text" name="numero" class="form-control" required  >
      </div>
      <div class="col-md-6 col-xs-12">Bairro/Setor
       <input type="text" name="bairro" class="form-control" required  >
      </div>
      <div class="col-md-6 col-xs-12">Cidade
       <input type="text" name="cidade" class="form-control" required  >
      </div>
      <div class="col-md-4 col-xs-6">CEP
       <input type="text"  name="cep" minlength="10" maxlength="10"  class="form-control" required  >
      </div>
      <div class="col-md-4 col-xs-6">Estado
       <select class="form-control" name="uf" required>
        <option value="" selected="selected">SELECIONE</option>
        <option value="Acre">Acre</option>
        <option value="Alagoas">Alagoas</option>
        <option value="Amapá">Amapá</option>
        <option value="Amazonas">Amazonas</option>
        <option value="Bahia">Bahia</option>
        <option value="Ceará">Ceará</option>
        <option value="Distrito Federal">Distrito Federal</option>
        <option value="Espirito Santo">Espírito Santo</option>
        <option value="Goiás">Goiás</option>
        <option value="Maranhão">Maranhão</option>
        <option value="Mato Grosso">Mato Grosso</option>
        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
        <option value="Minas Gerais">Minas Gerais</option>
        <option value="Pará">Pará</option>
        <option value="Paraíba">Paraíba</option>
        <option value="Paraná">Paraná</option>
        <option value="Pernambuco">Pernambuco</option>
        <option value="Piauí">Piauí</option>
        <option value="Rio de Janeiro">Rio de Janeiro</option>
        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
        <option value="Rondônia">Rondônia</option>
        <option value="Roraima">Roraima</option>
        <option value="Santa Catarina">Santa Catarina</option>
        <option value="São Paulo">São Paulo</option>
        <option value="Sergipe">Sergipe</option>
        <option value="Tocantins">Tocantins</option>
       </select>
      </div>
     <div class="col-md-4 col-xs-12">E-Mail
      <input type="text" name="mail" class="form-control">
     </div>
     <div class="col-md-2 col-xs-4">DDD
      <input type="text" name="ddd" class="form-control">
     </div>
     <div class="col-md-4 col-xs-8">Telefone (SEM TRAÇOS)
      <input type="text" name="telefone" class="form-control">
     </div>

      <div class="col-md-6 col-xs-12"><br /></div><br />
       <div><br /><br />
        <input name="btvalidar" type="submit" class="btn btn-primary" id="btvalidar" value="Cadastrar" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
       </div>
    </form>
    <?
    if(isset($_POST['btvalidar']))
    {
    $TipoDocumento = $_POST['docto'];
     if ($TipoDocumento === "RG") {
       $DC = $_POST['rg'];
       $cpf_enviado = true;
     }
     elseif ($TipoDocumento === "CPF") {
      $DC = $_POST['cpf'];
      $cpf_enviado = validaCPF($_POST['cpf']);

     }

     if($cpf_enviado == true){
            // só continua com as queries se o CPF for validado
      $Nome = $_POST['nome'];
      $Clube = $_POST['clube'];
      $Cargo = $_POST['cargo'];
      $Posse = $_POST['posse'];
      $DtNasc = $_POST['nasc'];
      $Rua = $_POST['rua'];
      $Num = $_POST['numero'];
      $Bairro = $_POST['bairro'];
      $Cidade = $_POST['cidade'];
      $UF = $_POST['uf'];
      $CEP = $_POST['cep'];
      $G = $_POST['genero'];
    
      $Mail = $_POST['mail'];
      $DDD1 = $_POST['ddd'];
      $TELEFONE_1 = $_POST['telefone'];
               //AQUI CHAMANDO INFORMAÇÕES DO CLUBE
       $chamaclube = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$Clube'");
       $chamaclube->execute();
       $iid = $chamaclube->fetch();
        $NomeClube = $iid['icbr_Clube'];
         $executa = $PDO->query("INSERT INTO icbr_associado (icbr_AssNome, icbr_DtPosse, icbr_AssCargo, icbr_AssClube, icbr_AssClubeID, icbr_AssDistrito, icbr_AssDtNascimento, icbr_AssEndereco, icbr_AssNum, icbr_AssBairro, icbr_AssCidade, icbr_AssUF, icbr_AssCEP, icbr_AssGenero, icbr_AssFoto, icbr_CPF, icbr_AssEmail, DDD_1, TELEFONE_1) VALUES ('$Nome', '$Posse', '$Cargo', '$NomeClube', '$Clube', '$Distrito', '$DtNasc', '$Rua', '$Num', '$Bairro', '$Cidade', '$UF', '$CEP', '$G', 'SemFoto.jpg', '$DC', '$Mail', '$DDD1', '$TELEFONE_1')");
          if($executa){
           echo '<script type="text/JavaScript">alert("Associado cadastrado com sucesso!");location.href="dashboard.php"</script>';
          }
          else{
           echo '<script type="text/javascript">alert("Erro!' . $PDO->errorInfo() . '");</script>';
          }
     }
     elseif($cpf_enviado == false){
      echo '<script type="text/javascript">alert("CPF INVÁLIDO");</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE ASSOCIADO -->


<!-- INÍCIO DO MODAL DE CADASTRO DE ASSOCIADO -->
<div id="ImportaXLS" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-orange">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Importar Lista de Associados</h4>
   </div>
   <div class="modal-body">
    <div class="alert alert-danger alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Atenção!</h4>
       Este formulário apenas IMPORTA os dados preenchidos no Excel, você é total responsável pela validade dos dados contidos nele. Caso as informações estejam fora de formatação e/ou sejam falsas, deverá ser solicitado via e-mail para a Interact Brasil a remoção, além de acarretar em perda de pontos no Ranking Interact Brasil. Vale ressaltar que, dependendo dos erros de preenchimento, será necessário purgar (apagar) todos os dados referentes ao seu distrito, para que possam ser preenchidos do início novamente, do Zero. Para lhe auxiliar, acesse o manual de importação disponível em Vídeo (Youtube e Download) além do documento em PDF.
    </div>
   <form name="ImportaSocio" id="name" method="post" action="" enctype="multipart/form-data">
   <div class="col-md-4">SELECIONE O CLUBE:
    <?php
       $QueryClubes3 = "SELECT * FROM icbr_clube WHERE icbr_Status='A' AND icbr_Distrito='$Distrito'";
        // seleciona os registros
        $stmt3 = $PDO->prepare($QueryClubes3);
        $stmt3->execute();
      ?>
      <div class="form-group">
       <select class="form-control select2" name="clube" style="width: 100%;">
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($r = $stmt3->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $r['icbr_id'] ?>"><?php echo $r['icbr_Clube'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
   <div class="col-md-4 col-xs-12">Selecione o Arquivo
    <input name="fileUpload" type="file" class="form" onfocus="this.value='';"/>      
   </div>
   <div class="col-md-3 col-xs-12">Senha de Administrador
    <input name="passRDI" type="password" required class="form-control" />
   </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div>
    <input name="ImportaSocio" type="submit" class="btn btn-primary" id="ImportaSocio" value="IMPORTAR LISTA DE ASSOCIADOS" />
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
    </form>
    <?php 
    if(@$_POST["ImportaSocio"])
    {
     $SenhaRDI = $_POST['passRDI'];
     $CryRDI = md5($SenhaRDI);
     if ($CryRDI === $SenhaUsuarioLogado) //AQUI VALIDA DE A SENHA DE USUÁRIO ESTA CORRETA. SE SIM, CONTINUA
     {
      if(isset($_FILES['fileUpload']))
       {
       $CodClube = $_POST['clube'];
        $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$CodClube'");
        $Dados->execute();
        $Qry = $Dados->fetch();
        $clubeNome = $Qry['icbr_Clube'];
        date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
        $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
        $DataNome = date("Ymd-His");
        $NomeValidar = $Distrito . $DataNome . ".";
        $new_name = $NomeValidar . $ext; //Definindo um novo nome para o arquivo
        $dir = 'planilhas/'; //Diretório para uploads
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        error_reporting(E_ALL ^ E_NOTICE); 
          require_once 'excel_reader2.php'; 
          $data = new Spreadsheet_Excel_Reader($dir . "/" . $NomeValidar . '.xls'); 
          for( $i=3; $i <= $data->rowcount($sheet_index=0); $i++ )
          {
            $NomeCompleto = $data->val($i, 1);
            $DtNasc = $data->val($i, 2);
            $QDtNasc = explode("/", $DtNasc);
            $NascMes = $QDtNasc[0];
            $NascDia = $QDtNasc[1];
            $NascAno = $QDtNasc[2];
             $DataNascimento = $NascDia . "/" . $NascMes . "/" . $NascAno;
            $DtPosse = $data->val($i, 3);
            $QDtPosse = explode("/", $DtNasc);
            $PosseMes = $QDtNasc[0];
            $PosseDia = $QDtNasc[1];
            $PosseAno = $QDtNasc[2];
             $DataPosse = $PosseDia . "/" . $PosseMes . "/" . $PosseAno;
            $DistritoImporta = $data->val($i, 4);
            $ERua = $data->val($i, 5);
            $ENum = $data->val($i, 6);
            $EBai = $data->val($i, 7);
            $ECid = $data->val($i, 8);
            $EEst = $data->val($i, 9);
            $ECEP = $data->val($i, 10);
            $Gen = $data->val($i, 11);
            $TDDD1 = $data->val($i, 12);
            $TTEL1 = $data->val($i, 13);
            $TDDD2 = $data->val($i, 14);
            $TTEL2 = $data->val($i, 15);
            $EMAIL = $data->val($i, 16);
            $CPFSOCIO = $data->val($i, 17);
            $StatusSocio = $data->val($i, 18);
            $Importar = $PDO->query("INSERT INTO icbr_associado (icbr_AssNome, icbr_AssDtNascimento, icbr_AssClube, icbr_AssDistrito, icbr_DtPosse, icbr_AssClubeID, icbr_AssEndereco, icbr_AssNum, icbr_AssBairro, icbr_AssCidade, icbr_AssUF, icbr_AssCEP, icbr_AssGenero, icbr_AssFoto, DDD_1, TELEFONE_1, DDD_2, TELEFONE_2, icbr_AssEmail, icbr_CPF, icbr_AssStatus) VALUES ('$NomeCompleto', '$DataNascimento', '$clubeNome', '$DistritoImporta', '$DataPosse', '$CodClube', '$ERua', '$ENum', '$EBai', '$ECid', '$EEst', '$ECEP', '$Gen', 'SemFoto.jpg', '$TDDD1', '$TTEL1', '$TDDD2', '$TTEL2', '$EMAIL', '$CPFSOCIO', '$StatusSocio')");
           if($Importar)
           {
            echo '<script type="text/JavaScript">alert("ATUALIZADO COM SUCESSO");
              location.href="dashboard.php"</script>';
           }
           else
           {
            echo '<script type="text/javascript">alert("NÃO FOI POSSÍVEL ATUALIZAR CADASTRO, ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
            echo '<script type="text/javascript">window.close();</script>';
           }
          }
       }
     }
     else 
     {
      echo '<script type="text/javascript">alert("SENHA INVÁLIDA");</script>';
     }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL DE CADASTRO DE ASSOCIADO -->



<!-- INICIO DO MODAL DE IMPRESSÃO DE CREDENCIAL -->
<div id="Credencial" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Impressão de Credencial</h4>
   </div>
   <div class="modal-body">
    <h3> EM BREVE! </h3>

   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE EXEMPLO -->
<!-- FINAL DO MODAL DE IMPRESSÃO DE CREDENCIAL -->








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