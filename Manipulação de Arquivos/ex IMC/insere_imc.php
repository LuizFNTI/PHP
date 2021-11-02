<?php

    include("conn.php");

    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];


    $result = $peso / ($altura * $altura);

    

    echo "Seu IMC É: $result<br>";

    if($result < 18.5) {
        $obesidade = "Magreza";
    }

    elseif($result >= 18.5 && $result <= 24.9) {
        $obesidade = "Nomal";
    }

    elseif($result >= 25.0 && $result <= 29.9) {
        $obesidade = "Sobrepeso";
    }

    elseif($result >= 30.0 && $result <= 39.9) {
        $obesidade = "Obeso";
    }

    elseif($result >= 40.0) {
        $obesidade = "Obesidade grave";
    }

    echo "$obesidade";

    mysqli_query($conn, "INSERT INTO IMC(nome, sexo, idade, altura, peso, imc, tipoob) VALUES ('$nome', '$sexo', '$idade', '$altura', '$peso', '$result', '$obesidade')");

    header("location:lista_imc.php");


?>