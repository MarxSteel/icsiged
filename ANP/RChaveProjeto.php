<?php
require("../restritos.php"); 
require_once '../init.php';
$codProjeto = $_GET['ID']; 
$PDO = db_connect();
require_once '../QueryUser.php';
require_once 'dadosProjeto.php';
$DataAgora = date('d/m/Y H:i:s');
$teste = "teste";

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
  <style type="text/css">
  .texto {
    word-wrap: break-word;
  }
  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
 <div class="wrapper">
  <header class="main-header">
   <nav class="navbar navbar-static-top">
    <div class="container">
     <div class="navbar-header">
      <span class="logo-lg"><img src="../dist/img/logo/ICLogoMini.png" width="200"></span>
     </div>
     <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
       <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs">Olá, <?php echo $NomeUserLogado; ?></span></a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
  </header> 
  <div class="content-wrapper">
   <div class="container">
    <section class="content">
     <div class="box box-default">
      <div class="box-header with-border">
       <h2 class="box-title"><strong>ID #<?php echo $codProjeto; ?></strong> - <?php echo $NomeProjeto; ?></h2>
      </div>
      <div class="box-body">
       <div class="col-xs-8">
        <li class="list-group-item">
         <b>Clube:</b> 
         <a class="pull-right">Interact Club de <?php echo $ClubeProjeto . '<strong> (D. ' . $DistritoProjeto . ')</strong>'; ?></a>
        </li>
        <li class="list-group-item">
         <b>Data de Cadastro:</b> 
         <a class="pull-right"><?php echo $DataCadastro; ?></strong></i></a>
        </li>
        <li class="list-group-item">
         <b>E-Mail responsavel por projetos:</b> 
         <a class="pull-right"><?php echo $EmailClube; ?></strong></i></a>
        </li>
       </div>
       <div class="col-xs-4">
        <li class="list-group-item"><h4>CHAVE DE ACESSO:</h4><br />
         <h2><strong><code><?php echo $ChaveCry; ?></code></strong></h2>
        </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
          if ($StatusProjeto === '1') {
           echo '<div class="bg-green-active color-palette" align="middle"><span>REVISADO</span></div>';
          }
          elseif ($StatusProjeto === "2") {
           echo '<div class="bg-purple-active color-palette" align="middle"><span>AGUARDANDO REVIS&Atilde;O</span></div>';
          }
          elseif ($StatusProjeto === "3") {
           echo '<div class="bg-orange-active color-palette" align="middle"><span>PENDENTE</span></div>';
          }
          elseif ($StatusProjeto === "4") {
           echo '<div class="bg-navy-active color-palette" align="middle"><span>N&Atilde;O PREENCHIDO</span></div>';
          }
          else{
          }
         ?>        
         </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
          if ($AndamentoProjeto === '1') {
           echo '<div class="bg-olive-active color-palette" align="middle"><span>PLANEJAMENTO</span></div>';
          }
          elseif ($AndamentoProjeto === "2") {
           echo '<div class="bg-maroon-active color-palette" align="middle"><span>EM EXECU&Ccedil;&Atilde;O</span></div>';
          }
          elseif ($AndamentoProjeto === "3") {
           echo '<div class="bg-green-active color-palette" align="middle"><span>FINALIZADO</span></div>';
          }
          else{
          }
         ?>        
         </li>
       </div>
       <div class="col-xs-3">
        <li class="list-group-item">
         <div class="bg-black-active color-palette" align="middle"><span><?php echo $AvenidaProjeto; ?></span></div>
        </li>
       </div> 
       <div class="col-xs-3">
        <li class="list-group-item">
         <?php
         if ($AbrangenciaProjeto === "1") {
          echo '<div class="bg-navy-active color-palette" align="middle">
                 <span>PROJETO DO CLUBE</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "2") {
           echo '<div class="bg-orange-active color-palette" align="middle">
                 <span>PROJETO MULTI-CLUBE</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "3") {
           echo '<div class="bg-red-active color-palette" align="middle">
                 <span>PROJETO DISTRITAL</span>
                </div>';
         }
         elseif ($AbrangenciaProjeto === "4") {
           echo '<div class="bg-blue-active color-palette" align="middle">
                 <span>PROJETO MULTI-DISTRITAL</span>
                </div>';
         }
         ?>
        </li>
       </div>  
       <div class="col-xs-12">
        <h2>DESEJA REALMENTE ENVIAR CHAVE?</h2>
       </div>
       <form name="MandaChave" id="name" method="post" action="" enctype="multipart/form-data">
        <div class="col-xs-12">Senha de Administrador
         <input name="passRDI" type="password" required class="form-control" />
        </div>
        <div class="col-xs-12"><br />
         <input name="MandaChave" type="submit" class="btn btn-danger btn-lg btn-block" value="SIM, ENVIAR CHAVE"  />
        </div>
       </form>
       <?php 
        if(@$_POST["MandaChave"])
        {
         $SenhaRDI = $_POST['passRDI'];
         $CryRDI = md5($SenhaRDI);
         if ($CryRDI === $SenhaUsuarioLogado) 
         {
            $DtLog = date('d/m/Y - H:i:s');
            $NomeCodigo = "Chave reenviada";
            $DetalheCod = "Feito o reenvio de chave às " . $DtLog . " Pelo usuario " . $NomeUserLogado;
            $SalvaLog = $PDO->query("INSERT INTO log_projeto (codigo, DataCadastro, UserCadastro, CodProjeto, NomeCodigo, DetalheCodigo) VALUES ('101', '$DtLog', '$NomeUserLogado', '$codProjeto', '$NomeCodigo', '$DetalheCod')");
            if ($SalvaLog) 
            {

              //AQUI INICIA FUNÇÃO DE ENVIAR O E-MAIL
              $enviaFormularioParaNome = 'Interact Club de ' . $ClubeProjeto;
              $enviaFormularioParaEmail = $EmailClube;
              $caixaPostalServidorNome = 'Interact Brasil - CNP (Cadastro Nacional de Projetos)';
              $caixaPostalServidorEmail = 'projetos@interactbrasil.org';
              $caixaPostalServidorSenha = 'testar';
              /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/  
              /* abaixo as veriaveis principais, que devem conter em seu formulario*/
               $AssuntoEmail = "Novo Projeto: ID:" . $codProjeto . " - " . $NomeProjeto;

                $mensagemConcatenada = '<meta Content-type: text/html; charset="UTF-8"><link href="/email-marketing/style.css" rel="stylesheet" type="text/css" media="all"/><div class="conteudo" style="margin-top:0px;"><html><head></head> <style>body{margin: 0;padding: 0;}@media only screen and (max-width: 340px){table, img[class="partial-image"]{width:100% !important; min-width: 200px !important;}}</style><body topmargin=0 leftmargin=0> <table style="border-collapse: collapse; border-spacing: 0; min-height: 418px;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f2f2f2"> <tbody> <tr> <td align="center" style="border-collapse: collapse; padding-top: 30px; padding-bottom: 30px;"> <table cellpadding="5" cellspacing="5" width="600" bgcolor="white" style="border-collapse: collapse; border-spacing: 0;"> <tbody> <tr> <td style="border-collapse: collapse; padding: 0px; text-align: center; width: 600px;"> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; max-width: 600px; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 0px; text-align: center;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 0px; line-height: 0px; mso-line-height-rule: exactly;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"> <tbody> <tr> <td align="center" style="border-collapse: collapse; line-height: 0px; padding: 0; mso-line-height-rule: exactly;"> <a target="_blank" style="display: block; text-decoration: none; box-sizing: border-box; font-family: arial; width: 100%;"> <img class="partial-image" src="http://interactbrasil.org/layoutemail/capa.png" width="600" style="box-sizing: border-box; display: block; max-width: 600px; min-width: 160px;"> </a> </td></tr></tbody> </table> </td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; font-family: Arial; font-size: 25px; padding-bottom: 20px; padding-top: 20px; text-align: center; vertical-align: middle;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"> <tbody> <tr> <td style="border-collapse: collapse;"> <h2 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);">Voc&ecirc; tem um novo projeto, Hora de Revisar!</span> </h2> </td></tr></tbody> </table> </td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <table width="100%" style="border-collapse: collapse; border-spacing: 0; text-align: left; font-family: Arial;"> <tbody> <tr> <td style="border-collapse: collapse;"> <div style="font-family: Arial; font-size: 15px; font-weight: normal; line-height: 170%; text-align: left; color: #666; word-wrap: break-word;"> <span>Foi cadastrado um novo projeto para o seu clube, e você recebeu uma nova chave para edita-lo.</span><br/> <h3 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);"> Nome do Projeto: <span style="color: rgb(251,73,89);">' . $NomeProjeto . '</span><br/> Data de Cadastro: <span style="color: rgb(251,73,89);">' . $DataCadastro . '</span> Avenida: <span style="color: rgb(251,73,89);">' . $AvenidaProjeto . '</span><br/> </span> <h2 style="font-weight: normal; margin: 0px; padding: 0px; color: rgb(251,73,89); word-wrap: break-word;"> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(0,165,208);">Chave de Acesso:</span> <span style="font-size: inherit; text-align: center; width: 100%; color: rgb(251,73,89);">' . $ChaveCry . '</span> </h2> </h3> </div></td></tr></tbody> </table></td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; padding-bottom: 10px; padding-top: 10px; text-align: center;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"> <div style="font-family: Arial; text-align: center;"> <table style="border-collapse: collapse; border-spacing: 0; background-color: rgb(251,73,89); border-radius: 10px; color: rgb(255,255,255); display: inline-block; font-family: Arial; font-size: 15px; font-weight: bold; text-align: center;"> <tbody style="display: inline-block;"> <tr style="display: inline-block;"> <td align="center" style="border-collapse: collapse; display: inline-block; padding: 15px 20px;"> <a target="_blank" href="#LINKEDITARPROJETO" style="display: inline-block; text-decoration: none; box-sizing: border-box; font-family: arial; color: #fff; font-size: 15px; font-weight: bold; margin: 0px; padding: 0px; text-align: center; word-wrap: break-word; width: 100%;">CLIQUE AQUI PARA EDITAR SEU PROJETO </a> </td></tr></tbody> </table> </div></td></tr></tbody> </table> <table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; display: table;"> <tbody> <tr> <td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"><table width="100%" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"><tbody><tr><td style="border-collapse: collapse;"><hr style="border-color: rgb(161,128,97); border-style: dashed;"></td></tr></tbody></table></td></tr></tbody></table><table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%;"><tbody><tr><td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"><table width="170" align="right" style="border-collapse: collapse; border-spacing: 0; font-family: Arial;"><tbody><tr><td style="border-collapse: collapse; padding-left: 10px;"><a target="_blank" style="display: inline-block; text-decoration: none; box-sizing: border-box; font-family: arial; width: 100%;"><img width="160" style="box-sizing: border-box; display: block; max-width: 100%; min-width: 160px; padding-left: 0px!important; padding: 0px 5px; width: 270px;" class="partial-image" src="http://interactbrasil.org/layoutemail/logoICBRasil.png"></a></td></tr></tbody></table><div style="text-align: left; font-family: Arial; font-size: 15px; font-weight: normal; line-height: 170%; color: #666;"><div style="word-wrap: break-word; font-size: 16px;"><div><i>Este é um email automático, favor não responder.</i></div><div>MDIO Interact Brasil.<span style="line-height: 0; display: none;"></span><span style="line-height: 0; display: none;"></span></div></div></div></td></tr></tbody></table><table style="border-collapse: collapse; border-spacing: 0; box-sizing: border-box; min-height: 40px; position: relative; width: 100%; padding: 30px 0px; text-align: center;"><tbody><tr><td style="border-collapse: collapse; font-family: Arial; padding: 10px 15px;"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html></div>';
                   require_once('../dist/mail/PHPMailerAutoload.php');
                   $mail = new PHPMailer(); 
                   $mail->IsSMTP();
                   $mail->SMTPAuth  = true;
                   $mail->Charset   = 'utf8_decode()';
                   $mail->Host  = 'mx1.hostinger.com.br';
                   $mail->Port  = '587';
                   $mail->Username  = $caixaPostalServidorEmail;
                   $mail->Password  = $caixaPostalServidorSenha;
                   $mail->From  = $caixaPostalServidorEmail;
                   $mail->FromName  = utf8_decode($caixaPostalServidorNome);
                   $mail->IsHTML(true);
                   $mail->Subject  = utf8_decode($AssuntoEmail);
                   $mail->Body  = utf8_decode($mensagemConcatenada);
                   $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));    
                   if(!$mail->Send())
                   {
                    echo '<script type="text/javascript">alert("Erro ao enviar email! . ' . print($mail->ErrorInfo) .  ' ");</script>';
                   }else
                   {
                    echo '<script type="text/javascript">alert("EMAIL ENVIADO COM SUCESSO!");</script>';
                  } 
           }
           else
           {
            echo '<script type="text/javascript">alert("ERRO 500: ENTRE EM CONTATO COM A INTERACT BRASIL");</script>';
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
      </li>
      </div>
      </div>
     </div>
    </section>
  </div>
 </div><?php include_once '../footer.php'; ?></div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
</body>
</html>
