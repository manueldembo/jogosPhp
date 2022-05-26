<?php
session_start();

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "";
  $_SESSION['nome'] = "";
  $_SESSION['tipo'] = "";
}

function criptografar($senha) {
  $strCriptografada = "";
  for($i = 0; $i < strlen($senha); $i++) {
    $letra = ord($senha[$i]) + 1;
    $strCriptografada .= chr($letra);
  }
  
  return $strCriptografada;
}

function gerarHash($senha) {
  $txt = criptografar($senha);
  $hash = password_hash($txt, PASSWORD_DEFAULT);
  return $hash;
}

function testarHash($senha, $hash){
  $txt = criptografar($senha);
  $ok = password_verify($txt, $hash);
  return $ok;
}
?>