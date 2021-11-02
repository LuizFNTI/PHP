<?php

    class funcionario {

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

    $cmd = $this->pdo->query("SELECT * FROM funcionario ORDER BY nome");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarDados($id, $nome, $salario, $ano) {
        //VERIFICA SE JA A CADASTRO
        $cmd = $this->pdo->prepare("SELECT id from funcionario WHERE nome = :n");

        $cmd->bindValue(":n",$nome);

        $cmd->execute();

        if($cmd->rowCount() > 0) {
            return false;
        }else{
        
            $cmd = $this->pdo->prepare("INSERT INTO funcionario (id, nome, salario, ano) VALUES (:i, :n, :s, :a)");

            $cmd->bindValue(":i",$id);
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":s",$salario);
            $cmd->bindValue(":a",$ano);

            $cmd->execute();

            return true;
        }
    }

    
    public function excluirDados($id) {
        
        $cmd = $this->pdo->prepare("DELETE FROM funcionario WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();
    }

    public function buscarDadosFuncionarios($id) {

        $res = array();
        
        $cmd = $this->pdo->prepare("SELECT * FROM funcionario WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($id, $nome, $salario, $ano) {

        

        $cmd = $this->pdo->prepare("UPDATE funcionario SET nome = :n, salario = :s, ano = :a WHERE id = :i");

            
            $cmd->bindValue(":i",$id);
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":s",$salario);
            $cmd->bindValue(":a",$ano);
            $cmd->execute();

    }

}

?>