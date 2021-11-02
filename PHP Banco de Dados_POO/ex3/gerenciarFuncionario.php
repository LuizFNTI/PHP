<?php

require_once 'class/class_funcionario.php';

$c = new funcionario("funcionarios","localhost","root","");
?>





<!DOCTYPE html>
<html>
  <head>
    <title>Editar/Gerenciar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="cad_funcionario.php">Cadastrar Funcionário</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="gerenciarFuncionario.php">Gerenciar Funcionários</a>
          </li>

     </ul>
  </nav>
   
  <div class="container" style="margin-top:100px">
  <table class="table">
      <thead>
        <tr>
          <th>ID Funcionário</th>
          <th>Nome</th>
          <th>Salário</th>
          <th>Tempo na Empresa</th>
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
         <th> 
              <a href="cad_funcionario.php?id_up=<?php echo $dados[$i] ['id']; ?>">Editar</a> 
              <a href="gerenciarFuncionario.php?ID=<?php echo $dados[$i] ['id']; ?>">Excluir</a>
         </th> 
         
         <?php
         echo "</tbody>"; 
        }  
    }
    

    ?>

    </table>
  </div>
      
    
  </body>
</html>



<?php

if(isset($_GET['ID'])) {

  $id_funcionario = addslashes($_GET['ID']);

  $c->excluirDados($id_funcionario);

  header("location: gerenciarFuncionario.php");

}

?>