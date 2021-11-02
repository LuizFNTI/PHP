<?php

require_once 'class/class_projeto.php';

$c = new projeto("projeto","localhost","root","");

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
                    <a class="nav-link active" href="cad_projeto.php">Cadastrar Projeto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gerenciarProjeto.php">Gerenciar Projeto</a>
                </li>
                <li class="nav-item">
           </ul>
        </nav>
        
        
            
        <?php

        if(isset($_POST['nome']))  {

            if(isset($_GET['id_up'])) {
        
            
            $id_upd = addslashes($_GET['id_up']);
            $nome = addslashes($_POST['nome']);
            $orcamento = addslashes($_POST['orcamento']);
            $data = addslashes($_POST['data']);
            $hora = addslashes($_POST['hora']);


            if(!empty($nome) && !empty($orcamento) && !empty($data) && !empty($hora)) {
                $c->atualizarDados($id_upd, $nome, $orcamento, $data, $hora);
            }       

          }

        
          else {
            $nome = addslashes($_POST['nome']);
            $orcamento = addslashes($_POST['orcamento']);
            $data = addslashes($_POST['data']);
            $hora = addslashes($_POST['hora']);


            if(!empty($nome) && !empty($orcamento) && !empty($data) && !empty($hora)) {
                $c->cadastrarProjeto($nome, $orcamento, $data, $hora);
            }       
          }

        }

        ?>

        <?php

        if(isset($_GET['id_up'])) {

            $id_update = addslashes($_GET['id_up']);

            $res = $c->buscarDadosProjetos($id_update);
        }

        ?>

        <div class="container" style="margin-top:100px">
            <h1>Cadastro de Projeto</h1>
            <form method="POST" class="was-validated">

            <div class="form-group">
                <label for="nome">Nome do Projeto:</label>
                <input type="text" class="form-control" name="nome" required value="<?php if(isset($res)) {echo $res['nome'];} ?>">
            </div>

            <div class="form-group">
                <label for="orc">Orçamento Previsto:</label>
                <input type="text" class="form-control" name="orcamento" required value="<?php if(isset($res)) {echo $res['orcamento'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Data de Inicio:</label>
                <input type="date" class="form-control" name="data" required value="<?php if(isset($res)) {echo $res['dataInicio'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Horas para Execução:</label>
                <input type="time" class="form-control" name="hora" required value="<?php if(isset($res)) {echo $res['horas'];} ?>">
            </div>

            <input type="submit" value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>">  
            </form>
        </div>       
    </body>
</html>