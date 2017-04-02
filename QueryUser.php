<?php 
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $Distrito = $row['Distrito'];								//DISTRITO DO USUÁRIO
  $PrivClubes = $row['PClubes'];							//Privilégio para visualizar Clubes
  $PrivAssociado = $row['PAssociados'];						//Privilégios para Acessar Associados
  $PrivTesouraria = $row['PTesouraria'];					//Privilégio para Acessar Tesouraria
  $PrivSecretaria = 0; //$row['PSecretaria'];					//Privilégio para Acessar Secretaria
  $PrivANP = $row['PANP'];									//Privilégios ANP
  $SenhaUsuarioLogado = $row['senha'];
  $CodigoAssociado = $row['codAssociado'];
  $CorPainel = $row['color'];
  $IDUSer = $row['codLogin'];
  $LoginNome = $NomeUserLogado;
  $PrivICBR = $row['icbr'];

 $DadosSocio = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$CodigoAssociado'");
 $DadosSocio->execute();
  $Socio = $DadosSocio->fetch();
   $FotoUsuario = $Socio['icbr_AssFoto'];
   $uNome = $Socio['icbr_AssNome'];
   $uClubeNome = $Socio['icbr_AssClube'];
   $uCargoAtual = $Socio['icbr_AssCargo'];
   $uEnd = $Socio['icbr_AssEndereco'];
   $uNum = $Socio['icbr_AssNum'];
   $uBai = $Socio['icbr_AssBairro'];
   $uCidade = $Socio['icbr_AssCidade'];
   $uUF = $Socio['icbr_AssUF'];
   $uMail = $Socio['icbr_AssEmail'];
   $uDDD1 = $Socio['DDD_1'];
   $uDDD2 = $Socio['DDD_2'];
   $uF1 = $Socio['TELEFONE_1'];
   $uF2 = $Socio['TELEFONE_2'];
   $uEnsino = $Socio['icbr_Estudo'];
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

?>