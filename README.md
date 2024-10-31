# atv-ajax
Você está atuando como engenheiro de software para uma construtora. Você deverá
desenvolver uma tela para apoiar na compra de pisos e azulejos para as construções
que serão entregues.
Para isso, você deverá desenvolver uma página html com os campos a seguir:
Para calcular a quantidade de pisos ou azulejos necessários para um cômodo, os
campos e dados que você pode pedir aos alunos para coletar são:

- 1.Largura do cômodo (em metros);

- 2.Comprimento do cômodo (em metros);
  
- 3.Tamanho do piso/azulejo (em metros quadrados ou especificar largura e
comprimento do piso);

- 4.Porcentagem de margem extra (opcional, para cobrir eventuais quebras ou ajustes).

Você deverá criar também um arquivo php que receberá uma requisição assíncrona e devolverá a quantidade de material necessário para a obra. Para isso, utilize as seguintes fórmulas:

## Calcule a área do cômodo:
- Área do cômodo = Largura do cômodo * Comprimento do cômodo

## Calcule a área de cada piso ou azulejo:
- Área do piso = Largura do piso * Comprimento do piso

## Calcule a quantidade de pisos necessária (sem margem extra):
- Quantidade de pisos = Área do piso / Área do cômodo

## Inclua uma margem extra (caso haja quebras ou necessidades de ajustes):
- Quantidade total = Quantidade de pisos * (1 + 100 Porcentagem de margem extra) <br/>
Arredonde para cima para garantir que nenhum espaço fique sem cobertura
