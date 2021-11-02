<?php

    class carro {

    private $pdo;

    public function __construct($dbname, $host, $user, $senha) {

    try {
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
    } 
    catch (PDOException $e) {
        echo "Erro com banco de dados" .$e->getMesege();
    }

    catch (Exception $e) {
        echo "Erro fatal" .$e->getMesege();
    }
    
}
//BUSCAR DADOS E COLOCAR NA TABELA
    public function buscarDados() {

    $res = array();

    $cmd = $this->pdo->query("SELECT * FROM carros ORDER BY modelo");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarDados($modelo, $marca, $valor) {
        //VERIFICA SE JA A CADASTRO
        $cmd = $this->pdo->prepare("SELECT id from carros WHERE modelo = :m");

        $cmd->bindValue(":m",$modelo);

        $cmd->execute();

        if($cmd->rowCount() > 0) {
            return false;
        }else{
        
            $cmd = $this->pdo->prepare("INSERT INTO carros (modelo, marca, valor) VALUES (:m, :ma, :v)");

            $cmd->bindValue(":m",$modelo);
            $cmd->bindValue(":ma",$marca);
            $cmd->bindValue(":v",$valor);
            

            $cmd->execute();

            return true;
        }
    }

    
    public function excluirDados($id) {
        
        $cmd = $this->pdo->prepare("DELETE FROM carros WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();
    }

    public function buscarDadosCarros($id) {

        $res = array();
        
        $cmd = $this->pdo->prepare("SELECT * FROM carros WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($id, $modelo, $marca, $valor) {

        

        $cmd = $this->pdo->prepare("UPDATE carros SET modelo = :m, marca = :ma, valor = :v WHERE id = :i");

            
            $cmd->bindValue(":m",$modelo);
            $cmd->bindValue(":ma",$marca);
            $cmd->bindValue(":v",$valor);
            $cmd->bindValue(":i",$id);

            $cmd->execute();

    }

}

?>