<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Bancária</title>
</head>
<body>
    <?php
    require_once "conta.php";

    $c1 = new ContaBanco();
    $c1->abrirConta("CC");
    $c1->setNumConta("0008956-8");
    $c1->setDono("Luiz");
    $c1->depositar(500.00);
    $c1->sacar(550.00);

    echo "Tipo: " . $c1->getTipo() . "<br>";
    echo "Numero da Conta: " . $c1->getNumConta() . "<br>";
    echo "Propietário: " . $c1->getDono() . "<br>";
    echo "Saldo: " . $c1->getSaldo() . "<br>";

    $c1->fecharConta();

    $c2 = new ContaBanco();
    $c2->abrirConta("CP");
    $c2->setNumConta("0009885-4");
    $c2->setDono("Felipe");
    $c2->depositar(500.00);
    $c2->sacar(650.00);

    echo "Tipo: " . $c2->getTipo() . "<br>";
    echo "Numero da Conta: " . $c1->getNumConta() . "<br>";
    echo "Propietário: " . $c2->getDono() . "<br>";
    echo "Saldo: " . $c2->getSaldo() . "<br>";

    $c2->fecharConta();
?>
</body>
</html>