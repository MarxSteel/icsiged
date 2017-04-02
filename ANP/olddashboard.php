<?php
require("../restritos.php"); 
require_once '../init.php';
$cProj = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
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
</head>
<body class="hold-transition skin-blue-light fixed sidebar-mini">
<div class="wrapper">
 <header class="main-header">
  <a href="../#" class="logo">
   <span class="logo-mini"><img src="../dist/img/logo/ICLogoMin.png" width="50"/></span>
   <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="180" /></span>
  </a>
  <nav class="navbar navbar-static-top">
   <a href="../#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Minizar Navegação</span>
   </a>
   <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
     <li class="dropdown user user-menu">
      <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
       <span class="hidden-xs"><?php echo $NomeUserLogado; ?></span>
      </a>
      <ul class="dropdown-menu">
       <li class="user-header">
        <p><?php echo $NomeUserLogado; ?></p>
       </li>
       <li class="user-footer">
        <div class="pull-left">
         <a href="../user/perfil.php" class="btn btn-info">Dados de Perfil</a>
        </div>
        <div class="pull-right">
         <a href="../logout.php" class="btn btn-danger">Sair</a>
        </div>
       </li>
      </ul>
     </li>
     <li>
       <a href="../logout.php" class="btn btn-danger btn-flat">Sair</a>
     </li>
    </ul>
    </div>
    </nav>
  </header>
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
  <div class="row">
   <?php
    if($PrivANP === '1'){
   ?> 
   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
     <a data-toggle="modal" data-target="#cadProjeto">
      <span class="info-box-icon3 bg-white"><img src="../dist/img/icons/anp2.png" width="100"></span>
     </a>
     <div class="info-box-content"><br /><h4>Adicionar Projeto</h4></div>
    </div>
   </div>
   <div class="col-xs-12">
    <div class="box box-danger color-palette-box">
     <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-file-text"></i> Lista de Projetos do Distrito <?php echo $Distrito; ?></h3>
     </div>
     <div class="box-body">
      <table id="clubesAtivo" class="table table-bordered table-striped">
       <thead>
        <tr>
         <td width="10%"><strong>ID</strong></td>
          <td width="15%"><strong>Avenida</strong></td>
          <td width="20%"><strong>Nome do Projeto</strong></td>
          <td width="20%"><strong>Clube</strong></td>
          <td width="20%"><strong>Status</strong></td>
          <td width="15%"></td>
        </tr>
       </thead>
       <tbody>
        <?php
         $ClubeAtivo = "SELECT * FROM icbr_projeto WHERE pro_distrito='$Distrito'";
          $ChamaAtivo = $PDO->prepare($ClubeAtivo);
          $ChamaAtivo->execute();
          while ($at = $ChamaAtivo->fetch(PDO::FETCH_ASSOC)): 
          echo '<tr>';
           echo '<td>' . $at["id"] . '</td>';
           echo '<td>' . $at["pro_avenida"] . '</td>';
           echo '<td>' . $at["pro_nome"] . '</td>';
           echo '<td>';
           $codClube = $at["pro_clube"];
            $Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube'");
            $Dados->execute();
            $Qry = $Dados->fetch();
           echo $Qry['icbr_Clube'];
           echo '</td>';
            $StatusProjeto = $at["pro_status"];
             if ($StatusProjeto === '1') {
               echo '
               <td>
                <div class="bg-purple-active color-palette" align="middle">
                 <span>AGUARDANDO REVISÃO</span>
                </div>
               </td>';
               echo '<td>';
                echo '<a class="btn btn-info btn-xs" href="javascript:abrir(';
                echo "'vProjeto.php?ID=" . $at['pro_chave'] . "');";
                echo '"><i class="fa fa-search"></i></a>&nbsp;';
                echo '<a class="btn bg-navy btn-xs" href="uploads/' . $at['pro_arquivo'] . '"/><i class="fa fa-download"></i>';
               echo "</td>"; 
             }
             elseif ($StatusProjeto === "2") {
               echo '
               <td>
                <div class="bg-warning-active color-palette" align="middle">
                 <span>REPROVADO</span>
                </div>
               </td>';
             }
             elseif ($StatusProjeto === "3") {
               echo '
               <td>
                <div class="bg-success-active color-palette" align="middle">
                 <span>APROVADO</span>
                </div>
               </td>';
             }
             else{
             }
          echo '</tr>';
          endwhile;
        ?>
       </tbody>
       <tfoot>
        <tr>
         <td><strong>ID</strong></td>
         <td><strong>Avenida</strong></td>
         <td><strong>Nome do Projeto</strong></td>
         <td><strong>Clube</strong></td>
         <td><strong>Status</strong></td>
         <td></td>
        </tr>
       </tfoot>
      </table>
     </div>
    </div>

   </div>
   <?php
    }
    else {
     echo '<div class="col-xs-12">';
     echo '<div class="info-box">';
     echo '<div class="alert alert-danger alert-dismissible">';
     echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
     echo '<h4><i class="icon fa fa-ban"></i>Erro!</h4>';
     echo '<h3> Você não tem privilégios suficientes para abrir esta página</h3>';
     echo '</div>';
     echo '</div>';
     echo '</div>';
    }
    ?>
  </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
<!-- MODAL DE EXEMPLO -->
<div id="cadProjeto" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-red">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Cadastrar novo projeto</h4>
   </div>
   <div class="modal-body">
   <?php
    $DataAtual = date('d/m/Y - H:i:s'); //TRATANDO DATA E HORA, DD/MM/YYYY - HH:MM:SS
    $ChamaClube = "SELECT * FROM icbr_clube WHERE icbr_Distrito='$Distrito' AND icbr_ProjetoEmail IS NOT NULL AND icbr_Presidente IS NOT NULL AND icbr_Secretario IS NOT NULL AND icbr_Tesoureiro IS NOT NULL";
     $dados = $PDO->prepare($ChamaClube);
     $dados->execute();
    $ChamAvenida = "SELECT * FROM icbr_parametros WHERE tipoPar='ProCategoria'";
     $avenida = $PDO->prepare($ChamAvenida);
     $avenida->execute();
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
        <?php while ($pd = $avenida->fetch(PDO::FETCH_ASSOC)): ?>
        <option value="<?php echo $pd['Nome'] ?>"><?php echo $pd['Nome'] ?></option>
        <?php endwhile; ?>
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
      $DataNome = date("Ymd-His");
      $NomeValidar = $Distrito . $DataNome;
      $new_name = $NomeValidar . $ext; //Definindo um novo nome para o arquivo
      $key1 = $Distrito . $pNome;
      $projetokey = md5($key1);
      $dir = 'uploads/'; //Diretório para uploads
      $DescreveProjeto =  "Projeto Cadastrado: " . $pNome;
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
        echo '<script type="text/javascript">alert("IMPORTANDO ARQUIVO, NÃO FECHAR A PÁGINA!");</script>';
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
           echo '<script type="text/javascript">alert("Erro ao Cadastrar<br /> Erro: P0x01");</script>';
           }
        }
        else
        {
           echo '<script type="text/javascript">alert("Erro ao Cadastrar<br /> Erro: P0x02");</script>';
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

<?php 
include_once '../footer.php'; 
?>

</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/select2/select2.full.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#clubesAtivo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#clubesInativo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
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
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
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
