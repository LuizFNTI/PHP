<?php

    include("conn.php");

    $reccf = $_POST['rcf'];
    $recnome = $_POST['nome'];
    $recmarca = $_POST['marca'];

    mysqli_query($conn, "UPDATE tb_ferramentas SET nome_ferramenta = '$recnome', marca_ferramenta = '$recmarca' WHERE cod_ferramenta = $reccf");

    header("location:lista.php");

?>