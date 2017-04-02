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

?>
