<?php

class ContaBanco {
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    public function __construct() {
        $this->status = false;
        $this->saldo = 0;
        echo "<h1>Conta Aberta<br></h1>";
    }

    public function setNumConta($nc) {
        $this->numConta = $nc;
    }
    public function getNumConta() {
        return $this->numConta;
    }
    public function setDono($dono) {
        $this->dono = $dono;
    }
    public function getDono() {
        return $this->dono;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    public function getSaldo() {
        return $this->saldo;
    }
    function setStatus($status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }

    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if($t == "CC") {
            $this->setSaldo(50.00);
            $this->tipo = "Conta Corrente";
        } else if($t == "CP") {
            $this->setSaldo(150.00);
            $this->tipo = "Conta Popupança";
        }
    }

    public function fecharConta() {
        if($this->saldo > 0) {
            echo "Retire o saldo par poder fechar a conta";
        } else if($this->saldo < 0) {
            echo "Débitos Pendente, impossível fechar a conta";
        } else {
            $this->setStatus(false);
            echo "Conta Fechada!";
        }
    }

    public function depositar($valor) {
        if($this->status == true) {
            $this->saldo += $valor;
        } else {
            echo "Impossível Depositar!";
        }
    }

    public function sacar($valor) {
        if($this->status == true) {
            if($this->saldo > 0) {
                $this->saldo -= $valor;
            } else {
                echo "Saldo Insuficiente!";
            }
        } else {
            echo "Impossível Sacar";
        }
    }
}


?>