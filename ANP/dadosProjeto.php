<?php 
$Dados = $PDO->prepare("SELECT * FROM icbr_projeto WHERE pro_chave='$codProjeto'");
$Dados->execute();
$Qry = $Dados->fetch();

$NomeProjeto = $Qry['pro_nome'];
$Avenida = $Qry['pro_avenida'];
$ClubeCodigo = $Qry['pro_clube'];
$StatusProjeto = $Qry['pro_status'];
$DataCadastro = $Qry['pro_DtCadastro'];
$ChaveProjeto = $Qry['pro_chave'];
$UsuarioCadastro = $Qry['pro_UserCadastro'];
$DistritoProjeto = $Qry['pro_distrito'];
$IDProjeto = $Qry['id'];
$Baixar = $Qry['pro_arquivo'];

if ($StatusProjeto === "1") {
	$DetalheStatus = "Aguardando Revisão";
}
elseif ($StatusProjeto === "2") {
	$DetalheStatus = "REPROVADO";	
}
elseif ($StatusProjeto === "3") {
	$DetalheStatus = "Aprovado";
}
else{

}

if ($Avenida === "INTERNACIONAIS") 
{
	$AvenidaProjeto = '
         <div class="info-box2 shazam-roxo">
          <span class="info-box-icon4"><i class="glyphicon glyphicon-globe"></i></span>
           <div class="info-box-content3" style="text-align: center;"><strong>INTERNACIONAIS</strong>
           </div>
          </div>';
}
elseif ($Avenida === "IMAGEM PUBLICA") {
	$AvenidaProjeto = '
         <div class="info-box2 shazam-vermelho">
          <span class="info-box-icon4"><i class="fa fa-laptop"></i></span>
           <div class="info-box-content3" style="text-align: center;"><strong>IMAGEM PÚBLICA</strong>
           </div>
          </div>';
}
elseif ($Avenida === "COMUNIDADES") {
	$AvenidaProjeto = '
         <div class="info-box2 shazam-azul">
          <span class="info-box-icon4"><i class="fa fa-child"></i></i></span>
           <div class="info-box-content3" style="text-align: center;"><strong>COMUNIDADES</strong>
           </div>
          </div>';
}
elseif ($Avenida === "INTERNOS") {
	$AvenidaProjeto = '
         <div class="info-box2 shazam-laranja">
          <span class="info-box-icon4"><i class="fa fa-heartbeat"></i></span>
           <div class="info-box-content3" style="text-align: center;"><strong>INTERNOS</strong>
           </div>
          </div>';
}
elseif ($Avenida === "FINANCAS") {
	$AvenidaProjeto = '
         <div class="info-box2 shazam-verde">
          <span class="info-box-icon4"><i class="fa fa-money"></i></span>
           <div class="info-box-content3" style="text-align: center;"><strong>FINANÇAS</strong>
           </div>
          </div>';
}
else{
$AvenidaProjeto = "Erro";
}





$ChamaClube = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$ClubeCodigo'");
$ChamaClube->execute();
 $Valores = $ChamaClube->fetch();
  $ClubeProjeto = $Valores['icbr_Clube'];
  $EmailClube = $Valores['icbr_ProjetoEmail'];


?>

