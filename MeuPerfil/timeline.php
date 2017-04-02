<ul class="timeline">


	<?php
	$DataMostra = "10/10/2010 - 15:55";
	$NomeMostra = "Nome do tipo de alteração";
	$DescreveMostra = "nome do tipo de item mostrado";
  	 $ChamaLog = "SELECT * FROM log_dados WHERE usuario='$CodigoAssociado' ORDER BY id DESC";
   	 $QRYLog = $PDO->prepare($ChamaLog);
   	 $QRYLog->execute();
     	while ($Resl = $QRYLog->fetch(PDO::FETCH_ASSOC)):
     		/*
        $S0 = $resultadoLOG['DataCadastro'];
        $S1 = $resultadoLOG['DescreveEvento'];
        $S2 = $resultadoLOG['DetalhesEvento'];
        $S3 = $resultadoLOG['CodEvento']; 
     		*/
     	$CodEvento = $Resl['CodEvento'];
     	 if ($CodEvento === "101") { ?>

          <?php } else { } ?>

          

          

                        <?php endwhile; ?>
</ul>





<?php
//

function TimeLineVerde($VlData, $VlEvento, $VlTitulo, $Detalhe)
{

 echo '<li class="time-label"><span class="bg-green">' . $VlData . '</span></li>';
 echo '<li><i class="fa fa-check bg-green"></i>';
  echo '<div class="timeline-item">';
  echo '<h3 class="timeline-header"><strong>#' . $VlEvento . ' - ' . $VlTitulo . '</strong></h3>';
  echo '<div class="timeline-body">' . $Detalhe . '</div>';
  echo '</div>';
  echo '</li>';

}
function TLAzul($VlData, $VlEvento, $VlTitulo, $Detalhe)
{

 echo '<li class="time-label"><span class="bg-navy">' . $VlData . '</span></li>';
 echo '<li><i class="fa fa-check bg-navy"></i>';
  echo '<div class="timeline-item">';
  echo '<h3 class="timeline-header"><strong>#' . $VlEvento . ' - ' . $VlTitulo . '</strong></h3>';
  echo '<div class="timeline-body">' . $Detalhe . '</div>';
  echo '</div>';
  echo '</li>';

}
?>
