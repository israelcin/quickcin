# Quickcin

Quickcin é uma biblioteca geradora de testes usando Objetos em PHP, quer pode ser usada como uma extensão da biblioteca php-quickcheck.

## Observações
- O Quickcin não funciona em ambiente windows, pois requer 64-bit integers. Deve-se utilizar ambiente Linux.

## Instalação
- Este repositório já conta com a API do Quickcheck, basta clonar todo o projeto;

## Usando o Quickcin

- Escrever no arquivo MinhasClasses.php as classes que serão usadas na geração dos objetos de testes;
- No arquivo main.php
-- Escrever o nome o objeto a ser gerado na variável $nomeDaClasse. Ex. $nomeDaClasse = "Conta";
-- Escrever na variável $teste dentra do função $funcaoTestes, o testes a ser executado a medida que cada objeto for gerado pelo Quickcin. 



## Exemplo de um Objeto Conta gerado pelo Quickcin

```
Conta Object
(
    [numeroConta] => 3
    [saldo] => 2
    [usuario] => Usuario Object
        (
            [nomeUsuario] => h„
            [cpf] => 4
        )

    [agencia] => Agencia Object
        (
            [numeroAgencia] => 8
            [nomeAgencia] => Ï¤ UX¨Ë
            [enderecoAgencia] => Endereco Object
                (
                    [rua] => GôÆÏ9
                    [bairro] => ví ®
                    [numeroImovel] => 1
                )

        )

)
```
