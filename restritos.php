<?php
/* restritos.php */ 
session_start();
include_once'restritos.php';
if (isset($_SESSION['MeuLogin'])) { 
    $login = $_SESSION['MeuLogin']['login'];
    $hora = $_SESSION['MeuLogin']['hora'];      

    $chave = "1a2cf8gk68gj67gf784kh69fo6"; // chave secreca
    //$ip = $_SESSION['REMOTE_ADDR']; // pegando ip do usuario
    if ($_SESSION['MeuLogin']['chave'] != md5($login . $chave . $hora)) { 
        // verificado se a chave é válida
        header("Location: index.php?erro=$login Login invalido");
    }

    // atualizando a chave com novo horario de acesso
    $hora = time();
    $chave = md5($login . $chave . $hora);
    // registrando os novos dados na session.
    $_SESSION['MeuLogin'] = array("login" => $login,"chave" => $chave,"hora" => $hora); 
} else {
    header("location: " . $server . "/index.php?erro=Aceso restrito");
}
?>