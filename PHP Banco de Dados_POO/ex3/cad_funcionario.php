<?php

require_once 'class/class_funcionario.php';

$c = new funcionario("funcionarios","localhost","root","");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Projeto</title>
        <meta charset="UTF-8">
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    </head>
    <body>
    
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="cad_funcionario.php">Cadastrar Funcionários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gerenciarFuncionario.php">Gerenciar Funcionários</a>
                </li>
                <li class="nav-item">
           </ul>
        </nav>
        
        
            
        <?php

        if(isset($_POST['nome']))  {

            if(isset($_GET['id_up'])) {
        
            
            $id_upd = addslashes($_GET['id_up']);
            $id = addslashes($_POST['id']);
            $nome = addslashes($_POST['nome']);
            $salario = addslashes($_POST['salario']);
            $ano = addslashes($_POST['ano']);


            if(!empty($id) && !empty($nome) && !empty($salario) && !empty($ano)) {
                $c->atualizarDados($id_upd, $id, $nome, $salario, $ano);
            }       

          }

        
          else {
            $id = addslashes($_POST['id']);
            $nome = addslashes($_POST['nome']);
            $salario = addslashes($_POST['salario']);
            $ano = addslashes($_POST['ano']);

            if(!empty($id) && !empty($nome) && !empty($salario) && !empty($ano)) {
                $c->cadastrarDados($id, $nome, $salario, $ano);
            }       
          }

        }

        ?>

        <?php

        if(isset($_GET['id_up'])) {

            $id_update = addslashes($_GET['id_up']);

            $res = $c->buscarDadosFuncionarios($id_update);
        }

        ?>

        <div class="container" style="margin-top:100px">
            <h1>Cadastro de Projeto</h1>
            <form method="POST" class="was-validated">

            <div class="form-group">
                <label for="orc">Matricula Funcionário:</label>
                <input type="number" class="form-control" name="id" required value="<?php if(isset($res)) {echo $res['id'];} ?>">
            </div>

            <div class="form-group">
                <label for="nome">Nome do Funcionario:</label>
                <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)) {echo $res['nome'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Salário:</label>
                <input type="nmber" class="form-control" name="salario" required value="<?php if(isset($res)) {echo $res['salario'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Ano:</label>
                <input type="number" class="form-control" name="ano" required value="<?php if(isset($res)) {echo $res['ano'];} ?>">
            </div>

            <input type="submit" value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>">  
            </form>
        </div>       
    </body>
</html>