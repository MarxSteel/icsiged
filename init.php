<?php
$server = 'http://192.168.0.2:8888/SIGED3';
// constantes com as credenciais de acesso ao banco MySQL
$host = "localhost:8889";
$user = "root";
$pass = "root";
$banco = "siged_novo";
$titulo = "SIGED - Sistema Integrado de Gestão Distrital <<MDIO INTERACT BRASIL>>";
$versao = "1.1.1.6";
define('DB_HOST', $host);
define('DB_USER', $user);
define('DB_PASS', $pass);
define('DB_NAME', $banco);
date_default_timezone_set('America/Sao_Paulo'); //DEFININDO O TIMEZONE PARA TODAS AS PÁGINAS


$conn = mysqli_connect($host, $user, $pass, $banco) or die("Connection failed: " . mysqli_connect_error());


/* config.php */
function dbcon()
{
    @mysql_connect("localhost:8889", "root", "root") or die(mysql_error());
    @mysql_select_db("siged_novo") or die(mysql_error());
}




//FUNÇÃO PORCENTAGEM_NNX
function porcentagem_nnx ($parcial, $porcentagem ) {
 return ($parcial / $porcentagem) * 100;
}


// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);



$cor = "skin-blue";
$Titulo = "Interact Brasil";


require_once 'functions.php';

function TiraCaractere($string) {

    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    return str_replace($what, $by, $string);
}

    function qrcode($url, $size){
        if($url && $size = "105"){
        return "http://chart.apis.google.com/chart?cht=qr&chl=".$url."&chs=".$size."x".$size."";
        }
        }

    function qrcode2($url, $size){
        if($url && $size = "130"){
        return "http://chart.apis.google.com/chart?cht=qr&chl=".$url."&chs=".$size."x".$size."";
        }
        }