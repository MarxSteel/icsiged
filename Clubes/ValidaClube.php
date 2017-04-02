
<?php 
$Dados = $PDO->prepare("SELECT * FROM icbr_clube WHERE icbr_id='$codClube'");
$Dados->execute();
$Qry = $Dados->fetch();

$clubeNome = $Qry['icbr_Clube'];
$clubeRotary = $Qry['icbr_RotaryPadrinho'];
$clubeDataFundado = $Qry['icbr_DataFundado'];
$StatusClub = $Qry['icbr_Status'];
$clubePresidente = $Qry['icbr_Presidente'];
$clubeSecretario = $Qry['icbr_Secretario'];
$clubeTesoureiro = $Qry['icbr_Tesoureiro'];
$LocalClube = $Qry['icbr_Complemento'];
$PeriodoClube = $Qry['icbr_Periodo'];
$DiaClube = $Qry['icbr_Semana'];
$HorarioClube = $Qry['icbr_Horario'];
$EndClube = $Qry['icbr_CEnd'];
$EndNClube = $Qry['icbr_CNum'];
$EndComplemento = $Qry['icbr_EndComplemento'];
$BairroClube = $Qry['icbr_Bairro'];
$CidadeClube = $Qry['icbr_Cidade'];
$CEPClube = $Qry['icbr_CEP'];
$UFClube = $Qry['icbr_UF'];
$clubeMail = $Qry['icbr_ProjetoEmail'];
?> 