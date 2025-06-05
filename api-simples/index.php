<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');

$usuarios = [
  1 => ['id' => 1, 'nome' => 'Ana',   'email' => 'ana@ex.com'],
  2 => ['id' => 2, 'nome' => 'Bruno', 'email' => 'bruno@ex.com'],
  3 => ['id' => 3, 'nome' => 'Cris',  'email' => 'cris@ex.com'],
];

$uri        = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri        = trim($uri, '/');              // remove "/" nas pontas
$partes     = explode('/', $uri);            // quebra em ["rota"] ou ["rota","3"]
$recurso    = $partes[0] ?? '';              // "rota" ou vazio
$id         = isset($partes[1]) && is_numeric($partes[1])
  ? (int)$partes[1]
  : null;

if ($recurso === 'usuarios') {
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($id === null) {
      echo json_encode(array_values($usuarios));
      http_response_code(200);
    } else
      echo json_encode($usuarios[$id]);
      http_response_code(200);
  }
} else if ($recurso === 'batata') {
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['message' => 'batata']);
    http_response_code(200);
  }
}