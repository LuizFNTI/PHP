<?php

    $arquivo = "contador.txt";

    if(file_exists($arquivo)) {
        $valor_atual = file_get_contents($arquivo);
        $valor_atual = chop ($valor_atual);
        $valor_atual++;
    }else {
        $valor_atual = 1;
    }

    $ponteiro = fopen($arquivo, "w");

    fwrite($ponteiro, $valor_atual);
    fclose($ponteiro);

?>