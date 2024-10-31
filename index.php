<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Pisos</title>
</head>

<body>
  <h1>Calculadora AJAX</h1>

  <fieldset>
    <legend>Área do Cômodo</legend>
    <div>
      <label for="larguraComodo">Largura (m²)</label>
      <input type="number" name="larguraComodo" id="larguraComodo" min="0" step="any" />
    </div>
    <div>
      <label for="comprimentoComodo">Comprimento (m²)</label>
      <input type="number" name="comprimentoComodo" id="comprimentoComodo" min="0" step="any" />
    </div>
  </fieldset>

  <fieldset>
    <legend>Tamanho do Piso/Azulejo</legend>
    <div>
      <label for="larguraPiso">Largura (m²)</label>
      <input type="number" name="larguraPiso" id="larguraPiso" min="0" step="any" />
    </div>
    <div>
      <label for="comprimentoPiso">Comprimento (m²)</label>
      <input type="number" name="comprimentoPiso" id="comprimentoPiso" min="0" step="any" />
    </div>
  </fieldset>

  <div>
    <label for="margem">Margem de erro (%)</label>
    <input type="number" name="margem" id="margem" min="0" step="any" />
  </div>

  <button onclick="calcular();">Calcular com AJAX</button>

  <p id="resultado"></p>

  <script>
    function calcular() {
      const larguraComodo = document.getElementById("larguraComodo").value;
      const comprimentoComodo = document.getElementById("comprimentoComodo").value;
      const larguraPiso = document.getElementById("larguraPiso").value;
      const comprimentoPiso = document.getElementById("comprimentoPiso").value;
      const margem = document.getElementById("margem").value;

      // Verifica se todos os valores foram preenchidos e são válidos
      if (!larguraComodo || !comprimentoComodo || !larguraPiso || !comprimentoPiso || !margem ||
        larguraComodo <= 0 || comprimentoComodo <= 0 || larguraPiso <= 0 || comprimentoPiso <= 0 || margem < 0) {
        document.getElementById("resultado").innerHTML = "Por favor, insira valores válidos em todos os campos.";
        return;
      }

      // JSON com as medidas
      const medidas = {
        larguraComodo,
        comprimentoComodo,
        larguraPiso,
        comprimentoPiso,
        margem
      };

      // Envio da requisição
      const json = JSON.stringify(medidas);
      fetch('/calculo.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: json
        })
        .then(resposta => resposta.json())
        .then(dados => {
          document.getElementById("resultado").innerHTML =
            "Área do cômodo: " + dados.areaComodo + " m²<br>" +
            "Área do piso: " + dados.areaPiso + " m²<br>" +
            "Quantidade: " + dados.quantidade + "<br>" +
            "Margem: " + dados.margem + "<br>" +
            "Total: " + dados.total;
        })
        .catch(erro => {
          document.getElementById("resultado").innerHTML = "Erro ao processar.";
        });
    }
  </script>
</body>

</html>