# Sistema de Gestão de Frota

Atividade acadêmica em PHP que simula um sistema básico de gestão de frota de veículos, aplicando os conceitos de **Programação Orientada a Objetos (POO)**.

## Como funciona

O sistema é composto por três entidades principais que se relacionam entre si:

### Motorista
Representa o condutor do veículo. Armazena nome, CPF, número da CNH e data de validade da CNH. A validação do nome é feita no momento da atribuição — nomes vazios lançam uma exceção.

### Veiculo
Representa o automóvel da frota. Controla a placa, o modelo, a capacidade do tanque e o nível atual de combustível. Possui dois comportamentos principais:
- **`abastecer(litros)`** — adiciona combustível, respeitando o limite do tanque.
- **`viajar(distancia)`** — consome combustível na proporção de **1 litro a cada 10 km**. Lança exceção se o combustível for insuficiente.

### Viagem
Orquestra a relação entre motorista e veículo. Ao iniciar uma viagem:
1. Verifica se a CNH do motorista está válida (data de corte: 01/01/2024).
2. Ordena o veículo a percorrer a distância informada.
3. Gera um relatório com destino, distância, motorista, veículo e combustível restante.

### Fluxo do `index.php`

```
1. Cria dois motoristas (um com CNH válida, outro com CNH vencida)
2. Cria dois veículos
3. Tenta iniciar uma viagem com CNH vencida → captura e exibe o erro
4. Abastece o primeiro veículo
5. Inicia uma viagem válida e imprime o relatório
6. Exibe o status final do combustível de ambos os veículos
```

## Como foi feito

| Item | Detalhe |
|------|---------|
| Linguagem | PHP 8+ com `declare(strict_types=1)` |
| Paradigma | Orientação a Objetos — encapsulamento, getters/setters e lançamento de exceções |
| Servidor local | XAMPP (Apache + PHP) |
| Estrutura | Quatro arquivos `.php` sem banco de dados ou framework |

## Como executar

**Via terminal (CLI):**
```bash
php index.php
```

**Via navegador (XAMPP):**
Acesse `http://localhost/AtividadeGestãodeFrota/index.php` com o Apache ativo.

## Estrutura de arquivos

```
AtividadeGestãodeFrota/
├── Motorista.php   # Classe do motorista
├── Veiculo.php     # Classe do veículo
├── Viagem.php      # Classe da viagem
└── index.php       # Script principal com os casos de teste
```
