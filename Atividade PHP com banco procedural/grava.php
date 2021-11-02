<?php
    include("conn.php");

    $nome = $_GET["nome"];
    $marca = $_GET["marca"];

    mysqli_query($conn, "INSERT INTO tb_ferramentas(nome_ferramenta, marca_ferramenta) VALUES ('$nome', '$marca')");

    header("location:lista.php");


?>