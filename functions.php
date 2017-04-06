<?php
  
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
  
    return $PDO;
}
 
 
/**
 * Converte datas entre os padrões ISO e brasileiro
 * Fonte: http://rberaldo.com.br/php-conversao-de-datas-formato-brasileiro-e-formato-iso/
 */
function dateConvert($date)
{
    if ( ! strstr( $date, '/' ) )
    {
        // $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    }
    else
    {
        // $date está no formato brasileiro e deve ser convertida para ISO
        sscanf($date, '%d/%d/%d', $d, $m, $y);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }
 
    return false;
}
 
 
/**
 * Calcula a idade a partir da data de nascimento
 *
 * Sobre a classe DateTime: http://rberaldo.com.br/php-usando-a-classe-nativa-datetime/
 */
function calculateAge($birthdate)
{
    $now = new DateTime();
    $diff = $now->diff(new DateTime($birthdate));
     
    return $diff->y;
}


function validaCPF($cpf)
{ // Verifiva se o número digitado contém todos os digitos
 $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
   // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
  {
  return false;
    }
  else
  {   // Calcula os números para verificar se o CPF é verdadeiro
   for ($t = 9; $t < 11; $t++) {
    for ($d = 0, $c = 0; $c < $t; $c++) {
     $d += $cpf{$c} * (($t + 1) - $c);
     }
      $d = ((10 * $d) % 11) % 10; 
       if ($cpf{$c} != $d) {
        return false;
       }
   } 
        return true;
  }
}


function Latitude($Rua, $Num, $Bairro, $Cidade, $UF){
 $string = $Rua;
 $array=explode(" ",$string);
 $n_palavras=count($array);
  for($i=0 ; $i < $n_palavras ; $i++ ){
   $Valor = $array[$i] . '+';
  }
  $address = $Valor . ',' . $Num . ',' . $Bairro . ',' . $Cidade . ',' . $UF . ',Brasil';
   $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
  $output= json_decode($geocode);
  $lat = $output->results[0]->geometry->location->lat;
  return $lat;
}

function Longitude($Rua, $Num, $Bairro, $Cidade, $UF){
 $string = $Rua;
 $array=explode(" ",$string);
 $n_palavras=count($array);
  for($i=0 ; $i < $n_palavras ; $i++ ){
   $Valor = $array[$i] . '+';
  }
  $address = $Valor . ',' . $Num . ',' . $Bairro . ',' . $Cidade . ',' . $UF . ',Brasil';
   $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
  $output= json_decode($geocode);              
  $long = $output->results[0]->geometry->location->lng;
  return $long;
}

function valida_estado ($X){
  if ($X == "AC") {
    echo " Acre";
  }
  elseif ($X === "AL") {
    echo " Alagoas";
  }
  elseif ($X === "AP") {
    echo " Amap&aacute;";
  }
  elseif ($X === "AM") {
    echo " Amazonas";
  }
  elseif ($X === "BA") {
    echo " Bahia";
  }
  elseif ($X === "CE") {
    echo " Cear&aacute;";
  }
  elseif ($X === "DF") {
    echo " Distrito Federal";
  }
  elseif ($X === "ES") {
    echo " Esp&iacute;rito Santo";
  }
  elseif ($X === "GO") {
    echo " Goi&aacute;";
  }
  elseif ($X === "MA") {
    echo " Maranh&atilde;o";
  }
  elseif ($X === "MT") {
    echo " Mato Grosso";
  }
  elseif ($X === "MS") {
    echo " Mato Grosso do Sul";
  }
  elseif ($X === "MG") {
    echo " Minas Gerais";
  }
  elseif ($X === "PA") {
    echo " Par&aacute;";
  }
  elseif ($X === "PB") {
    echo " Paraiba";
  }
  elseif ($X === "PR") {
    echo " Paran&aacute;";
  }
  elseif ($X === "PE") {
    echo " Pernambuco";
  }
  elseif ($X === "PI") {
    echo " Piau&iacute;";
  }
  elseif ($X === "RJ") {
    echo " Rio de Janeiro";
  }
  elseif ($X === "RN") {
    echo " Rio Grande do Norte";
  }
  elseif ($X === "RS") {
    echo " Rio Grande do Sul";
  }
  elseif ($X === "RO") {
    echo " Rond&ocirc;nia";
  }
  elseif ($X === "RR") {
    echo " Roraima";
  }
  elseif ($X === "SC") {
    echo " Santa Catarina";
  }
  elseif ($X === "SP") {
    echo " S&atilde;o Paulo";
  }
  elseif ($X === "SE") {
    echo " Sergipe";
  }
  elseif ($X === "TO") {
    echo " Tocantins";
  }
  
}

?>
