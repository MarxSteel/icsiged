<?php
require("../restritos.php"); 
require_once '../init.php';
$cProj = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
$QPA = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='3' ")->fetchColumn();
$QPP = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='2' ")->fetchColumn();
$QPR = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='1' ")->fetchColumn();
//CHAMANDO PROJETO POR AVENIDA
$QtComunidades = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='COMUNIDADES'")->fetchColumn();
$QtInternos = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNOS'")->fetchColumn();
$QtInternacionais = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='INTERNACIONAIS'")->fetchColumn();
$QtFinancas = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='FINANCAS'")->fetchColumn();
$QtIP = $PDO->query("SELECT COUNT(*) FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_avenida='IMAGEM PUBLICA'")->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title><?php echo $titulo; ?></title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="../dist/css/AdminLTE.css">
 <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">
 <link rel="stylesheet" href="../plugins/morris/morris.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Cadastro de Projetos para o ANP
   <small><?php echo "<strong> Distrito " . $Distrito . "</strong> " . $Titulo; ?></small>
  </h1>
 </section>
 <section class="content">
 <?php if($PrivANP === '1'){ ?>
  <div class="row">
   <div class="col-md-4 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#cadProjeto">
      <span class="info-box-icon3 bg-white"><img src="../dist/img/icons/anp2.png" width="100"></span>
     </a>
     <div class="info-box-content"><br /><h4>Adicionar Projeto</h4></div>
    </div>
    <a class="btn btn-info btn-lg btn-block" href="javascript:abrir('sendMensagem.php');">
     <i class="fa fa-envelope"></i> Enviar mensagem para a Projetos
    </a>  
    <br />
    <div class="box box-default collapsed-box box-solid">
     <div class="box-header with-border">
      <h3 class="box-title">Projetos por <strong>Status</strong></h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
     </div>
      <div class="box-body">
       <div class="row">
        <div class="col-md-7">
         <div class="chart-responsive">
          <div class="chart" id="sales-chart" style="height: 200px; width: 200px; position: left;"></div>
         </div>
        </div>
        <div class="col-md-5">
         <ul class="chart-legend clearfix">
          <li><i class="fa fa-check text-green"></i> Aprovados</li>
          <li><i class="fa fa-remove text-red"></i> Pendentes</li>
          <li><i class="fa fa-hourglass-end text-blue"></i> Revisão</li>
         </ul>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
         <div class="info-box2 shazam-verde">
          <span class="info-box-icon4"><i class="glyphicon glyphicon-ok"></i></span>
           <div class="info-box-content3"><strong>APROVADOS</strong>
            <i class="pull-right"><?php echo $QPR; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-vermelho">
          <span class="info-box-icon4"><i class="glyphicon glyphicon-remove"></i></span>
           <div class="info-box-content3"><strong>PENDENTES/REPROVADOS</strong>
            <i class="pull-right"><?php echo $QPP; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-azul">
          <span class="info-box-icon4"><i class="glyphicon glyphicon-hourglass"></i></span>
           <div class="info-box-content3"><strong>AGUARDANDO REVISÃO</strong>
            <i class="pull-right"><?php echo $QPR; ?> PROJETOS</i>
           </div>
          </div>
        </li>
       </ul>
      </div> 
    </div>
    <div class="box box-blue collapsed-box box-solid">
     <div class="box-header with-border">
      <h3 class="box-title">Projetos por <strong>Avenida</strong></h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
       </div>
     </div>
      <div class="box-body">
       <div class="row">
        <div class="col-md-7">
         <div class="chart-responsive">
          <div class="chart" id="chartAvenida" style="height: 200px; width: 200px; position: left;"></div>
         </div>
        </div>
        <div class="col-md-5">
         <ul class="chart-legend clearfix">
          <li><i class="fa fa-money text-green"></i> Finanças</li>
          <li><i class="fa fa-laptop text-red"></i> Imagem Pública</li>
          <li><i class="fa fa-child text-blue"></i> Comunidades</li>
          <li><i class="fa fa-globe text-purple"></i> Internacionais</li>
          <li><i class="fa fa-heartbeat text-orange"></i> Internos</li>
         </ul>
        </div>
       </div>
      </div>
      <div class="box-footer no-padding">
       <ul class="nav nav-pills nav-stacked">
        <li>
         <div class="info-box2 shazam-verde">
          <span class="info-box-icon4"><i class="fa fa-money"></i></span>
           <div class="info-box-content3"><strong>FINANÇAS</strong>
           <i class="pull-right"><?php echo $QtFinancas; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-vermelho">
          <span class="info-box-icon4"><i class="fa fa-laptop"></i></span>
           <div class="info-box-content3"><strong>IMAGEM PÚBLICA</strong>
           <i class="pull-right"><?php echo $QtIP; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-azul">
          <span class="info-box-icon4"><i class="fa fa-child"></i></i></span>
           <div class="info-box-content3"><strong>COMUNIDADES</strong>
           <i class="pull-right"><?php echo $QtComunidades; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-roxo">
          <span class="info-box-icon4"><i class="glyphicon glyphicon-globe"></i></span>
           <div class="info-box-content3"><strong>INTERNACIONAIS</strong>
           <i class="pull-right"><?php echo $QtInternacionais; ?> PROJETOS</i>
           </div>
          </div>
        </li>
        <li>
         <div class="info-box2 shazam-laranja">
          <span class="info-box-icon4"><i class="fa fa-heartbeat"></i></span>
           <div class="info-box-content3"><strong>INTERNOS</strong>
           <i class="pull-right"><?php echo $QtInternos; ?> PROJETOS</i>
           </div>
          </div>
        </li>
       </ul>
      </div> 
    </div>
   </div>
   <div class="col-md-8 col-xs-12">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs">
      <li class="active"><a href="#tudoProjetos" data-toggle="tab"><strong>Todos</strong></a></li>
      <li><a href="#aprovadoProjetos" data-toggle="tab">Aprovados</a></li>
      <li><a href="#pendenteProjetos" data-toggle="tab">Pendentes</a></li>
      <li><a href="#revisaoProjetos" data-toggle="tab">Aguardando Revisão</a></li>
      <li class="pull-right">
       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalManuais"><i class="fa fa-question"></i> Manuais e Dicas</button>
      </li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="tudoProjetos">
       <table id="todosProjetos" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th width="35%">Clube</th>
          <th width="45%">Projeto</th>
          <th width="5%">Status</th>
          <th width="15%"></th>
         </tr>
        </thead>
        <tbody>
        <?php
         $TodosProjetos = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito'";
          $tProjetos = $PDO->prepare($TodosProjetos);
          $tProjetos->execute();
           while ($tP = $tProjetos->fetch(PDO::FETCH_ASSOC)):
          echo '<tr>';
          echo '<td>';
           $codClube = $tP["pro_clube"];
            $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube'");
            $Dados->execute();
            $Qry = $Dados->fetch();
           echo $Qry['icbr_Clube'];
          echo '</td>';
          echo '<td>' . $tP["pro_nome"] . '</td>';
          $CodProjeto = $tP["pro_chave"];
          $statusP = $tP["pro_status"];
          echo '<td>';
          if ($statusP === "1") {
            echo '<button class="btn btn-primary btn-block btn-xs"><i class="fa fa-hourglass-end">';
          }
          elseif ($statusP === "2") {
            echo '<button class="btn btn-danger btn-block btn-xs"><i class="fa fa-close">';
          }
          elseif ($statusP === "3") {
            echo '<button class="btn btn-success btn-block btn-xs"><i class="fa fa-check">';
          }
          else{

          }
          echo '</td>';
          ?>
          <td>
            <a class="btn btn-default btn-xs" href="javascript:abrir('vCadastro.php?ID=<?php echo $CodProjeto; ?>');">
             <i class="fa fa-search"></i>
            </a>                          
           </td>
           <?php
          echo '</tr>';
          endwhile;
          ?>
       </tbody>
       </table>
      </div>
      <div class="tab-pane" id="aprovadoProjetos">
       <table id="aprovadosProjetos" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th width="35%">Clube</th>
          <th width="45%">Projeto</th>
          <th width="15%">Aprovado</th>
          <th width="5%"></th>
         </tr>
        </thead>
        <tbody>
        <?php
         $TodosProjetos2 = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='3'";
          $tProjetos2 = $PDO->prepare($TodosProjetos2);
          $tProjetos2->execute();
           while ($tP2 = $tProjetos2->fetch(PDO::FETCH_ASSOC)):
          echo '<tr>';
          echo '<td>';
           $codClube2 = $tP2["pro_clube"];
            $Dados2 = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube2'");
            $Dados2->execute();
            $Qry2 = $Dados2->fetch();
           echo $Qry2['icbr_Clube'];
          echo '</td>';
          echo '<td>' . $tP2["pro_nome"] . '</td>';
          echo '<td>' . $tP2["pro_DtAprovado"] . '</td>';
          $CodProjeto2 = $tP2["pro_chave"];
          ?>
          <td>
            <a class="btn btn-default btn-xs" href="javascript:abrir('vCadastro.php?ID=<?php echo $CodProjeto2; ?>');">
             <i class="fa fa-search"></i>
            </a>                          
           </td>
           <?php
          echo '</tr>';
          endwhile;
          ?>
        </tbody>
       </table>      
      </div>
      <div class="tab-pane" id="pendenteProjetos">
       <table id="pendentesProjetos" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th width="35%">Clube</th>
          <th width="45%">Projeto</th>
          <th width="15%">Reprovado</th>
          <th width="5%"></th>
         </tr>
        </thead>
        <tbody>
        <?php
         $TodosProjetos3 = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='2'";
          $tProjetos3 = $PDO->prepare($TodosProjetos3);
          $tProjetos3->execute();
           while ($tP3 = $tProjetos3->fetch(PDO::FETCH_ASSOC)):
          echo '<tr>';
          echo '<td>';
           $codClube3 = $tP3["pro_clube"];
            $Dados3 = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube3'");
            $Dados3->execute();
            $Qry3 = $Dados3->fetch();
           echo $Qry3['icbr_Clube'];
          echo '</td>';
          echo '<td>' . $tP3["pro_nome"] . '</td>';
          echo '<td>' . $tP3["pro_DtReprovado"] . '</td>';
          $CodProjeto3 = $tP3["pro_chave"];
          ?>
          <td>
            <a class="btn btn-warning btn-xs" href="javascript:abrir('vCadastro.php?ID=<?php echo $CodProjeto3; ?>');">
             <i class="fa fa-refresh"></i>
            </a>                          
           </td>
           <?php
          echo '</tr>';
          endwhile;
          ?>
        </tbody>
       </table>
      </div>
      <div class="tab-pane" id="revisaoProjetos">
       <table id="revisao" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th width="35%">Clube</th>
          <th width="45%">Projeto</th>
          <th width="15%">Cadastro</th>
          <th width="5%"></th>
         </tr>
        </thead>
        <tbody>
        <?php
         $TodosProjetos4 = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito' AND pro_status='1'";
          $tProjetos4 = $PDO->prepare($TodosProjetos4);
          $tProjetos4->execute();
           while ($tP4 = $tProjetos4->fetch(PDO::FETCH_ASSOC)):
          echo '<tr>';
          echo '<td>';
           $codClube4 = $tP4["pro_clube"];
            $Dados4 = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube4'");
            $Dados4->execute();
            $Qry4 = $Dados4->fetch();
           echo $Qry4['icbr_Clube'];
          echo '</td>';
          echo '<td>' . $tP4["pro_nome"] . '</td>';
          echo '<td>' . $tP4["pro_DtCadastro"] . '</td>';
          $CodProjeto4 = $tP4["pro_chave"];
          ?>
          <td>
            <a class="btn btn-default btn-xs" href="javascript:abrir('vCadastro.php?ID=<?php echo $CodProjeto4; ?>');">
             <i class="fa fa-search"></i>
            </a>                          
           </td>
           <?php
          echo '</tr>';
          endwhile;
          ?>
        </tbody>
       </table>
      </div>
     </div>
    </div>
   </div>
  </div>
 <?php
  }
  else {
  echo '
   <div class="row">
    <div class="col-xs-12">
     <div class="info-box">
      <div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h4><i class="icon fa fa-ban"></i>Erro!</h4>
       <h3> Você não tem privilégios suficientes para abrir esta página</h3>
      </div>
     </div>
    </div>
   </div>';
  } ?>
 </section>
</div><!-- CONTENT-WRAPPER -->
<!-- MODAL DE EXEMPLO -->
<div id="cadProjeto" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header shazam-vermelho">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar novo projeto</h4>
   </div>
   <div class="modal-body">
   <?php
    $DataAtual = date('d/m/Y - H:i:s'); //TRATANDO DATA E HORA, DD/MM/YYYY - HH:MM:SS
    $ChamaClube = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_ProjetoEmail IS NOT NULL AND icbr_Presidente IS NOT NULL AND icbr_Secretario IS NOT NULL AND icbr_Tesoureiro IS NOT NULL";
     $dados = $PDO->prepare($ChamaClube);
     $dados->execute();
   ?>
    <form name="NovoProjeto" id="name" method="post" action="" enctype="multipart/form-data">
     <div class="col-md-3">Data de Cadastro:
      <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $DataAtual; ?>">
      </div>
     <div class="col-md-6">Nome do Projeto:
      <input class="form-control" type="text" name="nomeProjeto" required>
     </div>
     <div class="col-md-3">Avenida:
      <div class="form-group">
       <select class="form-control select2" name="avenidaProjeto" style="width: 100%;">
        <option value="" selected="selected">SELECIONE</option>
        <option value="FINANCAS" selected="selected">FINANÇAS</option>
        <option value="IMAGEM PUCLICA" selected="selected">IMAGEM PÚBLICA</option>
        <option value="COMUNIDADES" selected="selected">COMUNIDADES</option>
        <option value="INTERNOS" selected="selected">INTERNOS</option>
        <option value="INTERNACIONAIS" selected="selected">INTERNACIONAIS</option>

       </select>
      </div>
     </div>
     <div class="col-md-6">Interact Club de:
      <div class="form-group">
       <select class="form-control select3" name="clubeProjeto" style="width: 100%;">
        <option value="" selected="selected">SELECIONE</option>
        <?php while ($r = $dados->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $r['icbr_id'] ?>"><?php echo $r['icbr_Clube'] ?></option>
        <?php endwhile; ?>
       </select>
      </div>
     </div>
<div class="col-xs-4">Selecione o Arquivo (<b>APENAS PDF</b>)
     <input name="fileUpload" type="file" class="form" onfocus="this.value='';"/>      
    </div>
     <div class="pull-right"><br />
      <input name="NovoProjeto" type="submit" class="btn btn-danger btn-flat" value="CADASTRAR"  /> 
      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">FECHAR</button>
     </div>
    </form>
    <?php
    if(@$_POST["NovoProjeto"])
    {
     if(isset($_FILES['fileUpload']))
     {
      $pNome = $_POST['nomeProjeto'];
      $pAvenida = $_POST['avenidaProjeto'];
      $pClube = $_POST['clubeProjeto'];
      $DataCadastro = date('d/m/Y - H:i');
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
      $ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
       if ($ext === ".pdf") {
        $DataNome = date("Ymd-His");
        $NomeValidar = $Distrito . $DataNome;
        $new_name = $NomeValidar . $ext; //Definindo um novo nome para o arquivo
        $key1 = $Distrito . $pNome;
        $projetokey = md5($key1);
        $dir = 'uploads/'; //Diretório para uploads
        $DescreveProjeto =  "Projeto Cadastrado: " . $pNome;
         move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        //echo '<script type="text/javascript">alert("' . $new_name . '");</script>';  //mostrar nome do arquivo importado
         error_reporting(E_ALL ^ E_NOTICE); 
        //$CadastraProjeto = $PDO->query("INSERT INTO icbr_projeto (pro_nome, pro_avenida, pro_clube, pro_status, pro_chave, pro_arquivo) VALUES ('$pNome', '$pAvenida', '$pClube', '1', '$NomeValidar')");
        $CadastraProjeto = $PDO->query("INSERT INTO icbr_projeto (pro_nome, pro_avenida, pro_clube, pro_distrito, pro_status, pro_arquivo, pro_chave, pro_DtCadastro) VALUES ('$pNome', '$pAvenida', '$pClube', '$Distrito', '1', '$new_name', '$projetokey', '$DataCadastro')");
        if ($CadastraProjeto) 
        {
          $InsereLog = $PDO->query("INSERT INTO log_projeto (DataCadastro, UserCadastro, CodProjeto, DetalheCodigo, Codigo) VALUES ('$DataCadastro', '$NomeUserLogado', '$projetokey', '$DescreveProjeto', '11')");
           if ($InsereLog) {
              echo '<script type="text/JavaScript">alert("Cadastrado com Sucesso");
              location.href="dashboard.php"</script>';
           }
           else{
           echo '<script type="text/javascript">alert("Erro ao Cadastrar! Erro: 0x01");</script>';
           }
        }
        else
        {
           echo '<script type="text/javascript">alert("Erro ao Cadastrar! Erro: 0x09");</script>';
        }
      }
      else{
           echo '<script type="text/javascript">alert("Erro ao Cadastrar! Erro: 0x10");</script>';
       }
      }
    }
    ?>
   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
<!-- MODAL DE EXEMPLO -->
<!-- MODAL MANUAIS -->
<div id="modalManuais" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Manuais e Dicas</h4>
   </div>
   <div class="modal-body">
    <div class="row">
    <div class="col-md-6 col-xs-12">
     <div class="box box-info">
      <div class="box-header">LEGENDAS (STATUS DOS PROJETOS)</div>
      <div class="box-body">
       <div class="col-md-4">
        <button class="btn btn-danger btn-block"><i class="fa fa-close"></i></button>
       </div>
       <div class="col-md-8">
        <button class="btn btn-default btn-block">REPROVADO OU COM PENDÊNCIAS</button>
       </div>
       <hr>
       <div class="col-md-4">
        <button class="btn btn-success btn-block"><i class="fa fa-check"></i></button>
       </div>
       <div class="col-md-8">
        <button class="btn btn-default btn-block">APROVADO E DISPONÍVEL NO ANP</button>
       </div>
       <hr>
       <br />
       <div class="col-md-4">
        <button class="btn btn-primary btn-block"><i class="fa fa-hourglass-end"></i></button>
       </div>
       <div class="col-md-8">
        <button class="btn btn-default btn-block">AGUARDANDO REVISÃO</button>
       </div>
       <hr>
      </div>
     </div>
    </div>
    <div class="col-md-6 col-xs-12">
     <div class="box box-success">
      <div class="box-header">MANUAIS</div>
      <div class="box-body">
       <a class="btn bg-olive btn-block" href="javascript:abrir('../Manuais/[ANP]CadastraProjeto.pdf');">
        CADASTRAR NOVO PROJETO</i>
       </a>    
       <a class="btn bg-olive btn-block" href="javascript:abrir('../Manuais/[ANP]CadastraProjeto.pdf');">
        RESPONDER PENDÊNCIA</i>
       </a> 
       <a class="btn bg-olive btn-block" href="javascript:abrir('../Manuais/[ANP]CadastraProjeto.pdf');">
        SOLICITAR REVISÃO PELA
       </a>    
      </div>
     </div>
    </div>
    </div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
   </div>
  </div>
 </div>
</div>
<!-- FINAL DO MODAL MANUAIS -->




<?php 
include_once '../footer.php'; 
?>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>

<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#0088ff", "#ff0033", "#aadd22"],
      data: [
        {label: "Aguardando Revisão", value: <?php echo $QPR; ?>},
        {label: "Pendentes/Reprovados", value: <?php echo $QPP; ?>},
        {label: "Aprovados", value: <?php echo $QPA; ?>}
      ],
      hideHover: 'auto'
    });

  });
</script>
<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'chartAvenida',
      resize: true,
      colors: ["#0088ff", "#ff0033", "#aadd22", "#ff7700", "#9911aa"],
      data: [
        {label: "Comunidades", value: <?php echo $QtComunidades; ?>},
        {label: "Imagem Pública", value: <?php echo $QtIP; ?>},
        {label: "Finanças", value: <?php echo $QtFinancas; ?>},
        {label: "Internos", value: <?php echo $QtInternos; ?>},
        {label: "Internacionais", value: <?php echo $QtInternacionais; ?>}
      ],
      hideHover: 'auto'
    });

  });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#todosProjetos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
    $('#aprovadosProjetos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    $('#pendentesProjetos').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
    $('#revisao').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });
</script>
<script language="JavaScript">
function abrir(URL) {
 
  var width = 1000;
  var height = 650;
 
  var left = 99;
  var top = 99;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select3").select2();
  });
</script>
</body>
</html>
