<?php

    $step = (isset($_GET['passo'])) ? (int) $_GET['passo'] : null;

    //Quantidade de etapas que seu instalador irá ter.
    $qntEtapas = 4;

    if (empty($step) || $step > $qntEtapas) {
        header('Location: ./?passo=1');
    }

    //Crie uma pasta chamada passo e dentro dela, coloque as páginas seguindo o modelo: pagina-1.php pagina-2.php pagina-3.php, conforme a quantidade de etapas.
    require_once 'passo/pagina-' . $step . '.php';