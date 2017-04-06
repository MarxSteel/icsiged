<?php
require_once '../init.php';
$PDO = db_connect();

echo "iniciando processo...";
 $QueryClubes = "SELECT * FROM icbr_clube ORDER BY icbr_id ASC";
  $stmt = $PDO->prepare($QueryClubes);
  $stmt->execute();
  /*
  $i = 1

  for ($i=0; $i < 200; $i++) { 
  	# code...
  }
*/


   while ($user = $stmt->fetch(PDO::FETCH_ASSOC)):
          $Codigo = $user['icbr_id'];
          $Clube = $user['icbr_Clube'];
          $Rua = $user['icbr_CEnd'];
          $Num = $user['icbr_CNum'];
          
          $Cidade = $user['icbr_Cidade'];
          $UF = $user['icbr_UF'];

          

           if ($Rua === "NÃO CADASTRADO") {
             echo 'Interact Club de ' . $Clube;
             echo '<br />Obtendo Coordenadas geográficas do local de reunião...
                   <br />CLUBE COM DADOS NÃO CADASTRADOS, PULANDO:';
           }
           elseif ($Rua === "") {
             echo 'Interact Club de ' . $Clube;
             echo '<br />Obtendo Coordenadas geográficas do local de reunião...
                   <br />CLUBE COM DADOS NÃO CADASTRADOS, PULANDO:';           }
           else{
             echo 'Interact Club de ' . $Clube;
             echo '<br />Obtendo Coordenadas geográficas do local de reunião...';
             echo '<br /> Rua: ' . $Rua;
             echo '<br /> Num: ' . $Num;
             echo '<br /> Cidade: ' . $Cidade;
             echo '<br /> Estado: ' . $UF;

               $string = $Rua;
               $array=explode(" ",$string);
               $n_palavras=count($array);
                for($i=0 ; $i < $n_palavras ; $i++ ){
                  $Valor = $array[$i] . '+';
                }
                $address = $Valor . ',' . $Num . ',' . $Cidade . ',' . $UF . ',Brasil';
                  $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
                $output= json_decode($geocode);
                $lat = $output->results[0]->geometry->location->lat;
                $long = $output->results[0]->geometry->location->lng;
           $AtualizaData = $PDO->query("UPDATE icbr_clube SET lat='$lat', lon='$long' WHERE icbr_id='$Codigo'");
           echo '<br /><strong>Latitude: </strong> OK';
           echo '<br /><strong>Longitude: </strong> OK';
           echo '<br /><strong>ATUALIZADO COM SUCESSO </strong>';
           }
      endwhile;
                  echo '<script type="text/javascript">alert("FINALIZADO");</script>';
?>