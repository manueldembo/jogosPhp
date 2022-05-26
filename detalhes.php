<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos/estilo.css">
  <link rel="stylesheet" href="estilos/detalhes.css">
  <title>Título da página</title>
</head>
<body>
  <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
  ?>
  <div id="corpo">
    <?php
      include_once "topo.php";

      $cod = $_GET['cod'] ?? 0;
      $busca = $banco->query("SELECT * FROM tbJogo WHERE codJogo = '$cod'");
    ?>
    <h1>Detalhes do jogo</h1>
    
    <table class='detalhes'>
      <?php
        if(!$busca){
          echo "<tr><td>Falha na busca! $banco->error";
        }else{
          if($busca->num_rows == 1){
            $reg = $busca->fetch_object();
            $t = thumb($reg->capa);
            echo "<tr><td rowspan='3'><img src='$t' class='full'>";
            echo "<td><h2>$reg->nome</h2>";
            echo "Nota: ".number_format($reg->nota, 1)."/10.0";
            echo "<tr><td>$reg->descricao";
            echo "<tr><td>Adm";
          } else{
            echo "<tr><td>Nenhum registo encontrado!";
          }
        }
        ?>
    </table>
    <a href="index.php"><img src="icones/icoback.png"></a>
  </div>

  <?php include_once "rodape.php" ?>
</body>
</html>