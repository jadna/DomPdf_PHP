<?php

    require __DIR__.'/vendor/autoload.php';

    $dompdf = new Dompdf\Dompdf();

    $dompdf->loadhtml("");

    ob_start();
    require "tabela.php";
    $dompdf->loadhtml(ob_get_clean());

    $dompdf->setPaper('A4', 'portrait'); /*Tamanho da página e a orientação*/ 
    $dompdf->render(); /* renderiza o pdf*/

    $dompdf->stream(); /* oferece para o navegador*/

    /*Salva o arquivo na raiz do diretório*/
    file_put_contents('relatorio.pdf', ['Attachment' => false], $dompdf->output());

?>

