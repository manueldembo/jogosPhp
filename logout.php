<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos/estilo.css">
  <link rel="stylesheet" href="estilos/detalhes.css">
  <link rel="stylesheet" href="estilos/login.css">
  <title>???</title>
</head>
<body>
  <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
  ?>
  <div id="corpo">
    <?php
      echo "<b>".$_SESSION['nome']."</b> deslogado do sistema.";
      deslogar();
      echo "<br><br><a href='index.php'><img src='icones/icoback.png'></a>";
    ?>
  </div>
</body>
</html>