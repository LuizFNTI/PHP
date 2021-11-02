<?php

    class projeto {

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

    $cmd = $this->pdo->query("SELECT * FROM projetos ORDER BY nome");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarProjeto($nome, $orcamento, $data, $hora) {
        //VERIFICA SE JA A CADASTRO
        $cmd = $this->pdo->prepare("SELECT id from projetos WHERE nome = :n");

        $cmd->bindValue(":n",$nome);

        $cmd->execute();

        if($cmd->rowCount() > 0) {
            return false;
        }else{
        
            $cmd = $this->pdo->prepare("INSERT INTO projetos (nome, orcamento, dataInicio, horas) VALUES (:n, :o, :d, :h)");

            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":o",$orcamento);
            $cmd->bindValue(":d",$data);
            $cmd->bindValue(":h",$hora);

            $cmd->execute();

            return true;
        }
    }

    
    public function excluirDados($id) {
        
        $cmd = $this->pdo->prepare("DELETE FROM projetos WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();
    }

    public function buscarDadosProjetos($id) {

        $res = array();
        
        $cmd = $this->pdo->prepare("SELECT * FROM projetos WHERE id = :i");

        $cmd->bindValue(":i",$id);

        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($id, $nome, $orcamento, $data, $hora) {

        

        $cmd = $this->pdo->prepare("UPDATE projetos SET nome = :n, orcamento = :o, dataInicio = :d, horas = :h WHERE id = :i");

            
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":o",$orcamento);
            $cmd->bindValue(":d",$data);
            $cmd->bindValue(":h",$hora);
            $cmd->bindValue(":i",$id);

            $cmd->execute();

    }

}

?>