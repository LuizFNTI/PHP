<?php

    include("conn.php");

    $recid = $_GET["excid"];

    mysqli_query($conn, "DELETE FROM IMC WHERE id = $recid");

    header("location:lista_imc.php");


?>