<html>
    <head>
    <title>Listar Ferramentas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    

    <body>
    <div class="container">
        <table class="table table-striped">
        <thead>
              <tr>
              <th>Codigo Ferramenta</th>
              <th>Nome</th>
              <th>Marca</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include("conn.php");
        $selecione = mysqli_query($conn, "SELECT * FROM tb_ferramentas ORDER BY cod_ferramenta");
        while($campo = mysqli_fetch_array($selecione)) {?>
            <tr>
              <td><?=$campo["cod_ferramenta"]?></td>
              <td><?=$campo["nome_ferramenta"]?></td>
              <td><?=$campo["marca_ferramenta"]?></td>
              <td><a href="editar.php?editacf=<?=$campo["cod_ferramenta"]?>">Editar</a></td>
              <td><a href="excluir.php?cfexc=<?=$campo["cod_ferramenta"]?>">Excluir</a></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
    </div>
        
    </body>
</html>