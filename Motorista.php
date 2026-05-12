<?php

declare(strict_types=1);

class Motorista {

    private string $nome;
    private string $cpf;
    private string $cnh;
    private \DateTime $validadeCnh;

    public function __construct(string $nome, string $cpf, string $cnh, \DateTime $validadeCnh) {
        $this->setNome($nome);
        $this->cpf = $cpf;
        $this->cnh = $cnh;
        $this->validadeCnh = $validadeCnh;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        if (trim($nome) === '') {
            throw new InvalidArgumentException("O nome do motorista não pode ser vazio.");
        }
        $this->nome = $nome;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function getCnh(): string {
        return $this->cnh;
    }

    public function setCnh(string $cnh): void {
        $this->cnh = $cnh;
    }

    public function getValidadeCnh(): \DateTime {
        return $this->validadeCnh;
    }

    public function setValidadeCnh(\DateTime $validadeCnh): void {
        $this->validadeCnh = $validadeCnh;
    }
}
