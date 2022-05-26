<?php
echo "<header>";

if(empty($_SESSION['user']))
  echo "<a href='user-login.php'>Entar</a>";
else
  echo "Olá, ".$_SESSION['nome']." <a href='logout.php'>Sair</a>";
echo "</header>";

?>