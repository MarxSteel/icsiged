<?php
/*
NESTA PÁGINA SERA FEITA A QUERY DOS DADOS DA EQUIPE


*/
//TRATANDO RDI
   $DadosRDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$RDI'");
   $DadosRDI->execute();
    $RRDI = $DadosRDI->fetch();
     $NomeRDI = $RRDI['icbr_AssNome'];
     $FotoRDI = $RRDI['icbr_AssFoto'];

//TRATANDO SDI
   $DadosSDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$SDI'");
   $DadosSDI->execute();
    $RSDI = $DadosSDI->fetch();
     $NomeSDI = $RSDI['icbr_AssNome'];
     $FotoSDI = $RSDI['icbr_AssFoto'];

//TRATANDO TDI
   $DadosTDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$TDI'");
   $DadosTDI->execute();
    $RTDI = $DadosTDI->fetch();
     $NomeTDI = $RTDI['icbr_AssNome'];
     $FotoTDI = $RTDI['icbr_AssFoto'];

//TRATANDO PDI
   $DadosPDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$PDI'");
   $DadosPDI->execute();
    $RPDI = $DadosPDI->fetch();
     $NomePDI = $RPDI['icbr_AssNome'];
     $FotoPDI = $RPDI['icbr_AssFoto'];

//TRATANDO RDIEleito
   $DadosRDIEleito = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$RDIEleito'");
   $DadosRDIEleito->execute();
    $RRDIEleito = $DadosRDIEleito->fetch();
     $NomeRDIEleito = $RRDIEleito['icbr_AssNome'];
     $FotoRDIEleito = $RRDIEleito['icbr_AssFoto'];
//TRATANDO ViceRDI
   $DadosViceRDI = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$ViceRDI'");
   $DadosViceRDI->execute();
    $RViceRDI = $DadosViceRDI->fetch();
     $NomeViceRDI = $RViceRDI['icbr_AssNome'];
     $FotoViceRDI = $RViceRDI['icbr_AssFoto'];

//DIRETORES DE PROJETOS
//TRATANDO DDP1
   $DadosDDP1 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$DDP1'");
   $DadosDDP1->execute();
    $RDDP1 = $DadosDDP1->fetch();
     $NomeDDP1 = $RDDP1['icbr_AssNome'];
     $FotoDDP1 = $RDDP1['icbr_AssFoto'];
//TRATANDO DDP2
   $DadosDDP2 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$DDP2'");
   $DadosDDP2->execute();
    $RDDP2 = $DadosDDP2->fetch();
     $NomeDDP2 = $RDDP2['icbr_AssNome'];
     $FotoDDP2 = $RDDP2['icbr_AssFoto'];
//TRATANDO DDP3
   $DadosDDP3 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$DDP3'");
   $DadosDDP3->execute();
    $RDDP3 = $DadosDDP3->fetch();
     $NomeDDP3 = $RDDP3['icbr_AssNome'];
     $FotoDDP3 = $RDDP3['icbr_AssFoto'];
//TRATANDO DDP4
   $DadosDDP4 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$DDP4'");
   $DadosDDP4->execute();
    $RDDP4 = $DadosDDP4->fetch();
     $NomeDDP4 = $RDDP4['icbr_AssNome'];
     $FotoDDP4 = $RDDP4['icbr_AssFoto'];


//DIRETORES DE IMAGEM PÚBLICA
//TRATANDO IP1
   $DadosIP1 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IP1'");
   $DadosIP1->execute();
    $RIP1 = $DadosIP1->fetch();
     $NomeIP1 = $RIP1['icbr_AssNome'];
     $FotoIP1 = $RIP1['icbr_AssFoto'];
//TRATANDO IP2
   $DadosIP2 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IP2'");
   $DadosIP2->execute();
    $RIP2 = $DadosIP2->fetch();
     $NomeIP2 = $RIP2['icbr_AssNome'];
     $FotoIP2 = $RIP2['icbr_AssFoto'];
//TRATANDO IP3
   $DadosIP3 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IP3'");
   $DadosIP3->execute();
    $RIP3 = $DadosIP3->fetch();
     $NomeIP3 = $RIP3['icbr_AssNome'];
     $FotoIP3 = $RIP3['icbr_AssFoto'];
//TRATANDO IP4
   $DadosIP4 = $PDO->prepare("SELECT * FROM icbr_associado WHERE icbr_uid='$IP4'");
   $DadosIP4->execute();
    $RIP4 = $DadosIP4->fetch();
     $NomeIP4 = $RIP4['icbr_AssNome'];
     $FotoIP4 = $RIP4['icbr_AssFoto'];
