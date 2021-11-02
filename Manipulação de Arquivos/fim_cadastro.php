<?php

    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $senha = $_POST['senha'];
    $comentarios = $_POST['comentario'];


    $ponteiro = fopen("cadastro.txt", "w");

    $conteudo = "$nome $sexo $senha $comentarios";


    fwrite($ponteiro, $conteudo);

    fclose($ponteiro);

    


?>