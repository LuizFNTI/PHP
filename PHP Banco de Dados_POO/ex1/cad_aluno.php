<?php

require_once 'class/class_aluno.php';

$c = new aluno("alunos","localhost","root","");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Cliente</title>
        <meta charset="UTF-8">
        <link href="css/estiloFormularios.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        
        

         
       
        
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="cad_aluno.php">Cadastrar Aluno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calcular_media.php">Calcular Média</a>
                </li>
                <li class="nav-item">
           </ul>
        </nav>
        
            
        <?php

        if(isset($_POST['nome']))  {
        
            
            $matricula = addslashes($_POST['matricula']);
            $nome = addslashes($_POST['nome']);
            $nota1 = addslashes($_POST['nota1']);
            $nota2 = addslashes($_POST['nota2']);


            if(!empty($matricula) && !empty($nome) && !empty($nota1) && !empty($nota2)) {
                $c->cadastrarAluno($matricula, $nome, $nota1, $nota2);
            }       

          }

        ?>

        <div class="container" style="margin-top:100px">
            <h1>Cadastro de Aluno</h1>
            <form method="POST" class="was-validated">

            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" class="form-control" name="matricula" value="<?php if(isset($res)) {echo $res['matricula'];} ?>">
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome" required value="<?php if(isset($res)) {echo $res['nome'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota1">Primeira Nota:</label>
                <input type="text" class="form-control" name="nota1" required value="<?php if(isset($res)) {echo $res['nota1'];} ?>">
            </div>

            <div class="form-group">
                <label for="nota2">Segunda Nota:</label>
                <input type="text" class="form-control" name="nota2" required value="<?php if(isset($res)) {echo $res['nota2'];} ?>">
            </div>

            <input type="submit" value="<?php if(isset($res)) {echo "Atualizar";} else {echo "Cadastrar";} ?>">  
            </form>
        </div>       
    </body>
</html>