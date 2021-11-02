<?php

require_once 'class/class_carro.php';

$c = new carro("concessionaria","localhost","root","");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Carro</title>
        <meta charset="UTF-8">
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        
        

         
       
        
    </head>
    <body>
    
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="cad_carro.php">Cadastrar Carro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gerenciarCarro.php">Gerenciar Carro</a>
                </li>
                <li class="nav-item">
           </ul>
        </nav>
        
        
            
        <?php

        if(isset($_POST['modelo']))  {

            if(isset($_GET['id_up'])) {
        
            
            $id_upd = addslashes($_GET['id_up']);
            $modelo = addslashes($_POST['modelo']);
            $marca = addslashes($_POST['marca']);
            $valor = addslashes($_POST['valor']);
           


            if(!empty($modelo) && !empty($marca) && !empty($valor)) {
                $c->atualizarDados($id_upd, $modelo, $marca, $valor);
            }       

          }

        
          else {
            $modelo = addslashes($_POST['modelo']);
            $marca = addslashes($_POST['marca']);
            $valor = addslashes($_POST['valor']);


            if(!empty($modelo) && !empty($marca) && !empty($valor)) {
                $c->cadastrarDados($modelo, $marca, $valor);
            }       
          }

        }

        ?>

        <?php

        if(isset($_GET['id_up'])) {

            $id_update = addslashes($_GET['id_up']);

            $res = $c->buscarDadosCarros($id_update);
        }

        ?>

        <div class="container" style="margin-top:100px">
            <h1>Cadastro de Carros</h1>
            <form method="POST" class="was-validated">

            <div class="form-group">
                <label for="nome">Modelo:</label>
                <input type="text" class="form-control" name="modelo" required value="<?php if(isset($res)) {echo $res['modelo'];} ?>">
            </div>

            <div class="form-group">
                <label for="orc">Fabricante:</label>
                <input type="text" class="form-control" name="marca" required value="<?php if(isset($res)) {echo $res['marca'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Valor:</label>
                <input type="text" class="form-control" name="valor" required value="<?php if(isset($res)) {echo $res['valor'];} ?>">
            </div>

            <input type="submit" value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>">  
            </form>
        </div>       
    </body>
</html>