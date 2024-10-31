<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = json_decode(file_get_contents("php://input"));

  // Validação de dados
  if (
    !isset($data->larguraComodo, $data->comprimentoComodo, $data->larguraPiso, $data->comprimentoPiso, $data->margem) ||
    !is_numeric($data->larguraComodo) || !is_numeric($data->comprimentoComodo) ||
    !is_numeric($data->larguraPiso) || !is_numeric($data->comprimentoPiso) ||
    !is_numeric($data->margem)
  ) {
    echo json_encode(['erro' => 'Valores inválidos ou faltantes.']);
    exit;
  }

  // Cálculos
  $areaComodo =  $data->larguraComodo * $data->comprimentoComodo;
  $areaPiso = $data->larguraPiso * $data->comprimentoPiso;

  // Verificação de divisão por zero
  if ($areaPiso == 0) {
    echo json_encode(['erro' => 'Dimensões do piso inválidas.']);
    exit;
  }

  $quantidade = $areaComodo / $areaPiso;
  $margem = $quantidade * ($data->margem / 100);
  $total = $quantidade + $margem;

  echo json_encode([
    "areaComodo" => $areaComodo,
    "areaPiso" => $areaPiso,
    "quantidade" => $quantidade,
    "margem" => $margem,
    "total" => $total
  ]);
} else {
  echo json_encode(['erro' => 'Método não suportado. Use o POST']);
}
