<!DOCTYPE html>
<html>
	<head>
	<title>Calculo IMC</title>
	</head>
	<body>

        <h1>Calculo IMC</h1>

        <p>AVISO! Nos campos altura e peso, usar '.' para o calculo se efetuado cotrretamente</p>

        <form method="POST" action="insere_imc.php">
            <label for="nome">Nome:</label>     
            <input type="text" name="nome"><br><br>

            <input type="radio" name="sexo" value="f">Feminino<br>
            <input type="radio" name="sexo" value="m">Maaculino<br><br>

            <label for="idade">Sua idade:</label>     
            <input type="text" name="idade"><br><br>

            <label for="altura">Sua Altura:</label>     
            <input type="text" name="altura"><br><br>

            <label for="peso">Seu Peso:</label>     
            <input type="text" name="peso"><br><br>

            <input type="submit" value="Enviar">


	</body>
</html>