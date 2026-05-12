<?php

declare(strict_types=1);

require_once 'Motorista.php';
require_once 'Veiculo.php';
require_once 'Viagem.php';

$motorista1 = new Motorista('Diguinho', '1234567890', 'MG43234561', new DateTime('2030-07-18'));
$motorista2 = new Motorista('Gabriel Souza', '4567890123', 'SP54356742', new DateTime('2022-02-01'));

$veiculo1 = new Veiculo('ABC-1234', 'Fiat Pálio', 50.0, 0.0);
$veiculo2 = new Veiculo('DEF-5678', 'Volkswagen Gol', 60.0, 0.0);

// Viagem CNH vencida
echo "--- Teste: Viagem com CNH vencida ---\n";
try {
    $viagemInvalida = new Viagem('São Paulo', 100.0, $motorista2, $veiculo2);
    $viagemInvalida->iniciarViagem();
} catch (InvalidArgumentException $e) {
    echo "Erro esperado: " . $e->getMessage() . "\n";
}

// Essa é a viagem Válida
echo "\n--- Teste: Viagem válida ---\n";
$veiculo1->abastecer(30.0);
echo "Combustível após abastecimento: " . $veiculo1->getCombustivelAtual() . " L\n";

$viagem = new Viagem('Rio de Janeiro', 200.0, $motorista1, $veiculo1);
$viagem->iniciarViagem();
echo $viagem->gerarRelatorio() . "\n";

echo "\n--- Status Final do Combustível ---\n";
echo $veiculo1->getModelo() . " (" . $veiculo1->getPlaca() . "): " . $veiculo1->getCombustivelAtual() . " L\n";
echo $veiculo2->getModelo() . " (" . $veiculo2->getPlaca() . "): " . $veiculo2->getCombustivelAtual() . " L\n";
