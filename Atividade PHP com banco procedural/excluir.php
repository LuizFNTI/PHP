<?php

    include("conn.php");

    $reccf = $_GET["cfexc"];

    mysqli_query($conn, "DELETE FROM tb_ferramentas WHERE cod_ferramenta = $reccf");

    header("location:lista.php");


?>