<?php
include "contador.inc";
?>
<!DOCTYPE html>
<html>
	<head>
	<title></title>
	</head>
	<body>
        <form method="POST" action="fim_cadastro.php">
            <label for="nome">nome:</label>     
            <input type="text" name="nome"><br><br>

            <input type="radio" name="sexo" value="f">Feminino<br>
            <input type="radio" name="sexo" value="m">Maaculino<br><br>

        <!----------------------CADASTRO 2----------------------->

            <label for="senha">Senha:</label>     
            <input type="text" name="senha"><br><br>

            <label for="comentarios">Comentarios:</label><br>
            <textarea name="comentario" rows="6" cols="30">
            Comentarios:
            </textarea>

            <input type="submit" value="Enviar">

        </form>
	</body>
    
</html>