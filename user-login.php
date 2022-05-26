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
      $usuario = $_POST['usuario'] ?? null;
      $senha = $_POST['senha'] ?? null;
      $nome = null;

      if(is_null($usuario) || is_null($senha))
        require_once "user-login-form.php";

      if(!is_null($usuario)){ 
        $busca = $banco->query("SELECT nome, senha FROM tbusuario WHERE codUsuario = '$usuario'");

        if($busca){
          if($busca->num_rows > 0){
            $reg = $busca->fetch_object();

            if(testarHash($senha, $reg->senha)){
              $nome = $reg->nome;

              $_SESSION['user'] = $usuario;
              $_SESSION['senha'] = $senha;
              $_SESSION['nome'] = $nome;
              
              echo msg_sucesso("Acesso aceite!");
              echo "Estás logado como <b>".$nome."<b>";
              echo "<br><br><a href='index.php'><img src='icones/icoback.png'></a>";
            } else {
              echo msg_erro("Erro! Senha incorrecta!");
              echo "<br><br><a href='user-login.php'><img src='icones/icoback.png'></a>";
            }
          } else {
            echo msg_erro("Erro! Não foi encotrada nenhuma conta com estes dados!");
            echo "<br><br><a href='user-login.php'><img src='icones/icoback.png'></a>";
          }
        } else {
          echo msg_erro("Erro! verifica a sua palavra passe e nome de usuário.");

          echo "<br><br><a href='user-login.php'><img src='icones/icoback.png'></a>";
        }
      }
    ?>
  </div>
</body>
</html>