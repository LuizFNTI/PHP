<?php

require_once 'class/class_aluno.php';

$c = new aluno("Alunos","localhost","root","");
?>





<!DOCTYPE html>
<html>
  <head>
    <title>Calcular Média</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="cad_aluno.php">Cadastrar Aluno</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="calcular_media.php">Calcular Média</a>
          </li>
     </ul>
  </nav>
   
  <div class="container" style="margin-top:100px">
  <table class="table">
      <thead>
        <tr>
          <th>Numero Matricula</th>
          <th>Aluno</th>
          <th>Avaliação 1</th>
          <th>Avaliação 2</th>
          <th>Média</th>
        </tr>
    </thead>

    <?php

    $dados = $c->buscarDados();
    
    if(count($dados) > 0) {
        for ($i=0; $i < count($dados); $i++) {

            echo "<tbody>";

            foreach ($dados[$i] as $k => $v) {
                
                echo "<th>".$v."</th>";
            }
            
        
        ?>
         
         <?php
         echo "</tbody>"; 
        }  
    }
    

    ?>

         
   
      
      
        
      
    </table>
  </div>
      
    
  </body>
</html>



