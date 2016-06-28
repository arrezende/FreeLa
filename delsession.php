<?php
session_start();
session_destroy();
$_SESSION['logado'] = FALSE;
$_SESSION['cliente'] = FALSE;
echo "<script>window.location = 'index.php'</script>";
?>