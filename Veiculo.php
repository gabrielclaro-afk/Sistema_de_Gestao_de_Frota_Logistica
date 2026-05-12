<?php

declare(strict_types=1);

class Veiculo {

    private string $placa;
    private string $modelo;
    private float $capacidadeTanque;
    private float $combustivelAtual;

    public function __construct(
        string $placa,
        string $modelo,
        float $capacidadeTanque,
        float $combustivelAtual
    ) {
        if ($combustivelAtual < 0) {
            throw new InvalidArgumentException("O combustível não pode ser negativo.");
        }
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->capacidadeTanque = $capacidadeTanque;
        $this->combustivelAtual = $combustivelAtual;
    }

    public function getPlaca(): string {
        return $this->placa;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getCapacidadeTanque(): float {
        return $this->capacidadeTanque;
    }

    public function getCombustivelAtual(): float {
        return $this->combustivelAtual;
    }

    public function abastecer(float $litros): void {
        if ($litros <= 0) {
            throw new InvalidArgumentException("A quantidade de combustível deve ser positiva.");
        }

        $novaQuantidade = $this->combustivelAtual + $litros;

        if ($novaQuantidade > $this->capacidadeTanque) {
            throw new InvalidArgumentException("A quantidade excede a capacidade do tanque.");
        }

        $this->combustivelAtual = $novaQuantidade;
    }

    public function viajar(float $distancia): void {
        if ($distancia <= 0) {
            throw new InvalidArgumentException("A distância deve ser positiva.");
        }

        $combustivelNecessario = $distancia / 10;

        if ($combustivelNecessario > $this->combustivelAtual) {
            throw new InvalidArgumentException("Combustível insuficiente. A viagem foi interrompida.");
        }

        $this->combustivelAtual -= $combustivelNecessario;
    }
}
