<?php
require("../restritos.php"); 
require_once '../init.php';
$cPerfil = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
// AQUI DECLARO A QUERY DE DADOS DOS CLUBES:
$QueryClubes = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='A' ORDER BY icbr_AssNome ASC";
$stmt = $PDO->prepare($QueryClubes);
$stmt->execute();

$QryAssI = "SELECT icbr_uid, icbr_AssClube, icbr_AssNome, icbr_AssDtNascimento FROM icbr_associado WHERE icbr_AssDistrito='$Distrito' AND icbr_AssStatus='I' ORDER BY icbr_AssNome ASC";
$AssI = $PDO->prepare($QryAssI);  //AQUI CHAMO ASSOCIADOS DESLIGADOS
$AssI->execute();
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
 <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
 <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="../plugins/select2/select2.min.css">
</head>
 <?php include_once '../top_menu.php'; ?> <!-- CHAMANDO O TOP MENU (COR, DADOS DE USUARIO, CABEÇALHO -->
  <aside class="main-sidebar">
   <section class="sidebar">
    <?php include_once '../menuLateral.php'; ?>
    </section>
  </aside>
<div class="content-wrapper">
 <section class="content-header">
  <h1>Meu Perfil
  </h1>
 </section>
 <section class="content">
  <div class="row">
   <div class="col-md-4"><!-- DADOS DO PERFIL -->
    <!-- Profile Image -->
    <div class="box box-primary">
     <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="<?php echo $server; ?>/dist/img/perfil/<?php echo $FotoUsuario; ?>" alt="Foto do perfil de <?php echo $uNome; ?>">
      <h3 class="profile-username text-center"><?php echo $uNome;?></h3>
      <ul class="list-group list-group-unbordered">
       <li class="list-group-item">
        <b>Interact Club de </b> <a class="pull-right"><?php echo $uClubeNome; ?></a>
       </li>
       <li class="list-group-item">
        <b>Cargo Atual: </b> <a class="pull-right"><?php echo $uCargoAtual; ?></a>
       </li>
      </ul>
      <!--
      <strong><i class="fa fa-book margin-r-5"></i> Ensino</strong>
       <p class="text-muted">
       <?php
        /*
        DECLARANDO A VALIDAÇÃO DE NÍVEL DE ESCOLARIDADE
        1 - ALFABETIZADO
        2 - FUNDAMENTAL INCOMPLETO
        3 - FUNDAMENTAL COMPLETO
        4 - MÉDIO INCOMPLETO
        5 - MÉDIO COMPLETO
        6 - SUPERIOR INCOMPLETO
        7 - SUPERIOR COMPLETO
        8 - PÓS GRADUAÇÃO
        9 - MESTRADO
        10 - DOUTORADO
        */
        if ($uEnsino == "1") {
          echo "ALFABETIZADO";
        }
        elseif ($uEnsino === "2") {
          echo "FUNDAMENTAL INCOMPLETO";
        }
        elseif ($uEnsino === "3") {
          echo "FUNDAMENTAL COMPLETO";
        }
        elseif ($uEnsino === "4") {
          echo "MÉDIO INCOMPLETO";
        }
        elseif ($uEnsino === "5") {
          echo "MÉDIO COMPLETO";
        }
        elseif ($uEnsino === "6") {
          echo "SUPERIOR INCOMPLETO";
        }
        elseif ($uEnsino === "7") {
          echo "SUPERIOR COMPLETO";
        }
        elseif ($uEnsino === "8") {
          echo "PÓS GRADUAÇÃO";
        }
        else{
          echo "NÃO CADASTRADO";
        }
       ?>
       </p>
       <hr>-->
       <strong><i class="fa fa-map-marker margin-r-5"></i> Localização</strong>
        <p class="text-muted"><?php echo $uEnd . ", " . $uNum . " - " . $uBai . ". " . $uCidade . "/" . $uUF; ?></p>
       <hr>
       <strong><i class="fa fa-phone margin-r-5"></i> Contato</strong>
        <p>
         <span>E-Mail: <?php echo $uMail; ?></span><br />
         <span>Fone 1: <?php echo '(' . $uDDD1 . ') ' . $uF1; ?></span><br />
         <span>Fone 2: <?php echo '(' . $uDDD2 . ') ' . $uF2; ?></span>
        </p>
     </div>
    </div>
   </div>
   <div class="col-md-8">
    <div class="nav-tabs-custom">
     <ul class="nav nav-tabs">
      <li class="active"><a href="#settings" data-toggle="tab"> Dados de Login</a></li>
      <li><a href="#activity" data-toggle="tab">Dados de Distrito</a></li>
      <li><a href="#timeline" data-toggle="tab">Linha do Tempo</a></li>
      
     </ul>
     <div class="tab-content">
      <div class=" tab-pane" id="activity">
      EM BREVE DADOS DO DISTRITO
      </div>
      <div class="tab-pane" id="timeline">
      EM BREVE LINHA DO TEMPO
      </div>
      <div class="active  tab-pane" id="settings">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Login do Usuário:</b> 
         <span class="pull-right"><?php echo $login; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Apelido:</b> 
         <span class="pull-right"><?php echo $NomeUserLogado; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>E-Mail:</b> 
         <span class="pull-right"><?php echo $uMail; ?></i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Senha:</b> 
         <span class="pull-right">***********</i>
         </span>
        </li>
        <li class="list-group-item">
         <b>Padrão de Cor:</b> 
         <span class="pull-right">
         <?php
         if ($CorPainel === "blue") {
           echo "Azul / Painel Escuro";
         }
         elseif ($CorPainel === "blue-light") {
           echo "Azul / Painel Claro";
         }
         elseif ($CorPainel === "yellow") {
           echo "Laranja / Painel Escuro";
         }
         elseif ($CorPainel === "yellow-light") {
           echo "Laranja / Painel Claro";
         }
         elseif ($CorPainel === "green") {
           echo "Verde / Painel Escuro";
         }
         elseif ($CorPainel === "green-light") {
           echo "Verde / Painel Claro";
         }           
         elseif ($CorPainel === "purple") {
           echo "Roxo / Painel Escuro";
         }
         elseif ($CorPainel === "purple-light") {
           echo "Roxo / Painel Claro";
         }  
         elseif ($CorPainel === "red") {
           echo "Vermelho / Painel Escuro";
         }
         elseif ($CorPainel === "red-light") {
           echo "Vermelho / Painel Claro";
         }  
         elseif ($CorPainel === "black") {
           echo "Branco / Painel Escuro";
         }
         elseif ($CorPainel === "black-light") {
           echo "Branco / Painel Claro";
         }  

         ?>
         </span>
        </li> 
       </div>
       <div class="col-xs-4">
       <p>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#FotoPerfil">
         <i class="fa fa-refresh"></i> Trocar Foto de Perfil
        </button>
       </p>
       <p>
        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#TNome">
         <i class="fa fa-refresh"></i> Atualizar Apelido
        </button>
       </p>
       <p>
        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#TMail">
         <i class="fa fa-refresh"></i> Atualizar E-Mail
        </button>
       </p>
       <p>
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#TPass">
         <i class="fa fa-refresh"></i> Atualizar Senha
        </button>
       </p>
       <p>
        <button type="button" class="btn bg-purple btn-block" data-toggle="modal" data-target="#TCor">
         <i class="fa fa-refresh"></i> Atualizar Padrão de Cor
        </button>
       </p>
       </div>
       <form class="form-horizontal"><div class="form-group"></div></form>
      </div>
     </div>
    </div>
   </div>
 </section>
</div><!-- CONTENT-WRAPPER -->
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
<div id="FotoPerfil" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-blue">
    <button type="button" class="close" data-dismiss="modal">X</button>
     <h4 class="modal-title">Atualizar Foto</h4>
   </div>
   <div class="modal-body">
   <form name="trocarFoto" id="name" method="post" action="" enctype="multipart/form-data">
    Selecione uma imagem: <input name="arquivo" type="file" />
    <br />
    <input type="submit" class="btn btn-primary" value="Salvar" />
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
      $InsereFoto = $PDO->query("UPDATE icbr_associado SET icbr_AssFoto='$novoNome' WHERE icbr_uid='$CodigoAssociado'");
       if ($InsereFoto) 
       {
        echo '
          <script type="text/JavaScript">alert("FOTO DE PERFIL SALVA COM SUCESSO!");
          location.href="dashboard.php"</script>';
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


   </div>
   <div class="modal-footer"></div>
  </div>
 </div>
</div>
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
</body>
</html>