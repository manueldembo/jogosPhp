<?php
  function thumb($arquivo) {
    $caminho = "fotos/$arquivo";

    if(is_null($arquivo) || !file_exists($caminho)){
      return "fotos/indisponivel.png";
    } else {
      return $caminho;
    }
  }
  function msg_sucesso($m) {
    $resposta = "<div class='sucesso'><img class='icone' src='./icones/success.png'><span>$m</span></div>";
    return $resposta;
  }
  function msg_aviso($m) {
    $resposta = "<div class='aviso'><img class='icone' src='./icones/warning.png'><span>$m</span></div>";
    return $resposta;
  }
  function msg_erro($m) {
    $resposta = "<div class='erro'><img class='icone' src='./icones/error.png'><span>$m</span></div>";
    return $resposta;
  }
  function deslogar(){
    $_SESSION["nome"] = null;
    $_SESSION["user"] = null;
    $_SESSION["senha"] = null;
  }
?>