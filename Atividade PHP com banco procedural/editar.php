<!DOCTYPE html>
<html>
    <head>
	<title>Editar Ferramenta</title>
    </head>
    <body>

    <?php

    include("conn.php");
    $reccf = $_GET["editacf"];
    $seleciona = mysqli_query($conn, "SELECT * FROM tb_ferramentas WHERE cod_ferramenta = $reccf");
    $campo = mysqli_fetch_array($seleciona);


    ?>

        <form method="POST" action="gravaEdita.php">
        <input type="hidden" name="rcf" value="<?=$campo["cod_ferramenta"]?>">
        <label for="nome">Nome Ferrramenta:</label>
        <input type="text" name="nome" value="<?=$campo["nome_ferramenta"]?>">
        <label for="marca">Marca Ferramenta:</label>
        <input type="text" name="marca" value="<?=$campo["marca_ferramenta"]?>">
        <input type="submit" value="Atualizar">
        </form>
    </body>
</html>