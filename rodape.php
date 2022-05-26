<?php
  echo "<footer>";
  echo "<p> Acessado por ".$_SERVER['REMOTE_ADDR']." em ".date('d/M/Y')."</p>";
  echo "<p>Desenvolvido por Manuel Dembo &copy; em 2022</p>";
  echo "</footer>";

  $banco->close();
?>