<?php

require_once 'class/class_carro.php';

$c = new carro("concessionaria","localhost","root","");
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
              <a class="nav-link" href="cad_carro.php">Cadastrar Carrro</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="gerenciarProjeto.php">Gerenciar Carros</a>
          </li>

     </ul>
  </nav>
   
  <div class="container" style="margin-top:100px">
  <table class="table">
      <thead>
        <tr>
          <th>ID Carro</th>
          <th>Modelo</th>
          <th>Fabricante</th>
          <th>Valor</th>
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
              <a href="cad_carro.php?id_up=<?php echo $dados[$i] ['id']; ?>">Editar</a> 
              <a href="gerenciarCarro.php?ID=<?php echo $dados[$i] ['id']; ?>">Excluir</a>
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

  $id_carro = addslashes($_GET['ID']);

  $c->excluirDados($id_carro);

  header("location: gerenciarCarro.php");

}

?>