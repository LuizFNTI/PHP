<html>
    <head>
    <title>Listar Ferramentas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    

    <body>

    <h1>Lista IMC</h1>

    <a href="calcula_imc.php">Calcular IMC</a>
    <a href="salva_excel.php">Exportar Excel</a>

    <div class="container">
        <table class="table table-striped">
        <thead>
              <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Sexo</th>
              <th>Idade</th>
              <th>Altura</th>
              <th>Peso</th>
              <th>IMC</th>
              <th>Situação</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include("conn.php");
        $selecione = mysqli_query($conn, "SELECT * FROM IMC ORDER BY id");
        while($campo = mysqli_fetch_array($selecione)) {?>
            <tr>
              <td><?=$campo["id"]?></td>
              <td><?=$campo["nome"]?></td>
              <td><?=$campo["sexo"]?></td>
              <td><?=$campo["idade"]?></td>
              <td><?=$campo["altura"]?></td>
              <td><?=$campo["peso"]?></td>
              <td><?=$campo["imc"]?></td>
              <td><?=$campo["tipoob"]?></td>
              <td><a href="excluir_imc.php?excid=<?=$campo["id"]?>">Excluir</a></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
        
    </body>
</html>