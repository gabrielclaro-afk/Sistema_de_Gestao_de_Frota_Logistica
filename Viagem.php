<?php

declare(strict_types=1);

class Viagem {

    private string $destino;
    private float $distanciaTotal;
    private Motorista $motorista;
    private Veiculo $veiculo;

    public function __construct(
        string $destino,
        float $distanciaTotal,
        Motorista $motorista,
        Veiculo $veiculo
    ) {
        $this->destino = $destino;
        $this->distanciaTotal = $distanciaTotal;
        $this->motorista = $motorista;
        $this->veiculo = $veiculo;
    }

    public function getDestino(): string {
        return $this->destino;
    }

    public function getVeiculo(): Veiculo {
        return $this->veiculo;
    }

    public function getMotorista(): Motorista {
        return $this->motorista;
    }

    public function iniciarViagem(): void {
        $dataCorte = new DateTime('2024-01-01');

        if ($this->motorista->getValidadeCnh() < $dataCorte) {
            throw new InvalidArgumentException(
                "A CNH do motorista está vencida. A viagem não pode ser iniciada."
            );
        }

        $this->veiculo->viajar($this->distanciaTotal);

        echo "Viagem iniciada com sucesso!\n";
    }

    public function gerarRelatorio(): string {
        return
            "Destino: " . $this->destino . "\n" .
            "Distância Total: " . $this->distanciaTotal . " km\n" .
            "Motorista: " . $this->motorista->getNome() . "\n" .
            "Veículo: " . $this->veiculo->getModelo() .
            " (Placa: " . $this->veiculo->getPlaca() . ")\n" .
            "Combustível restante: " . $this->veiculo->getCombustivelAtual() . " L";
    }
}
