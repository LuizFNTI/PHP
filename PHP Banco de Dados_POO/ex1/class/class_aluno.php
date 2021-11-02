<?php

    class aluno {

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

    $cmd = $this->pdo->query("SELECT * FROM aluno ORDER BY nome");
    
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


    public function cadastrarAluno($matricula, $nome, $nota1, $nota2) {
        //VERIFICA SE JA A CADASTRO
        
            $cmd = $this->pdo->prepare("INSERT INTO aluno (matricula, nome, nota1, nota2) VALUES (:m, :n, :n1, :n2)");

            $cmd->bindValue(":m",$matricula);
            $cmd->bindValue(":n",$nome);
            $cmd->bindValue(":n1",$nota1);
            $cmd->bindValue(":n2",$nota2);

            $cmd->execute();

            return true;
        }

}



?>