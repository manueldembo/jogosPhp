<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos/estilo.css">
  <title>Listagem de Jogos</title>

</head>
<body>
  <?php
    require_once "includes/login.php";
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
  ?>
  <div id="corpo">
    <?php include_once "topo.php"; ?>
    
    <h1>Escolha seu jogo</h1>   
      <form method="get" action="index.php" id="busca">
        Ordenar: 
        <a href="index.php?o=n&c=<?php echo $chave; ?>">Nome</a> | 
        <a href="index.php?o=p&c=<?php echo $chave; ?>">Produtora</a> | 
        <a href="index.php?o=n1&c=<?php echo $chave; ?>">Nota alta</a> | 
        <a href="index.php?o=n2&c=<?php echo $chave; ?>">Nota baixa</a> |
        <a href="index.php">Mostrar Todos</a> |
        Buscar: <input type="text" name="c" size="10" max-length="40">
        <input type="submit" value="Ok">  
      </form>

    <table class="listagem">
    <?php
      $query = "SELECT j.codJogo, j.nome, g.genero, j.capa, p.produtora FROM tbjogo j 
               JOIN tbgenero g ON j.cod_genero = g.codGenero
               JOIN tbProdutora p ON j.cod_produtora = p.codProdutora ";

      if(!empty($chave))
        $query .= "WHERE j.nome LIKE '%$chave%' OR p.produtora LIKE '%$chave%' OR g.genero LIKE '%$chave%' ";

      switch ($ordem) {
        case "p":
          $query .= "ORDER BY p.produtora";
          break;
        case "n1":
          $query .= "ORDER BY j.nota";
          break;
        case "n2":
          $query .= "ORDER BY j.nota DESC";
          break;
        default:
          $query .= "ORDER BY j.nome";
          break;
      }

      $busca = $banco->query($query);

      if(!$busca){
        echo "<tr><td>Acorreu um erro ao carregar os dados!";
      } else {
        if($busca->num_rows == 0){
          echo "<tr><td>Nenhum registo encontrado!";
        } else {
          while($reg = $busca->fetch_object()){
            $t = thumb($reg->capa);
            echo "<tr><td><img src='$t' class='mini'>";
            echo "<td><a href='detalhes.php?cod=$reg->codJogo'>$reg->nome<a>";
            echo "($reg->genero)";
            echo "<br/>$reg->produtora";
            echo "<td>Adm";
          }
        }
      }
    ?>
    </table>
  </div>

  <?php include_once "rodape.php"; ?>
</body>
</html>