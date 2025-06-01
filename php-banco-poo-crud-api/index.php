<?php

require_once __DIR__ . '/Controllers/ControlaUsuario.php';

// Cabeçalhos CORS e JSON
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');

$ctrl = new ControlaUsuario();

// Lê JSON do corpo (para POST e PUT)
$input = file_get_contents('php://input');
$dados    = json_decode($input, true);

//    Exemplo de REQUEST_URI:  /rota/  (ou  /usuarios/3)
$uri        = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri        = trim($uri, '/');              // remove "/" nas pontas
$partes     = explode('/', $uri);            // quebra em ["rota"] ou ["rota","3"]
$recurso    = $partes[0] ?? '';              // "rota" ou vazio
$id         = isset($partes[1]) && is_numeric($partes[1]) 
                ? (int)$partes[1] 
                : null;

if ($recurso === 'usuarios') {
    // Método HTTP e ID definem qual ação chamar
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if ($id === null) {
            // GET /usuarios → lista todos
            $ctrl->listarTodos();
        } else {
            // GET /usuarios/{id} → busca por ID
            $ctrl->buscarPorId($id);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // POST /usuarios → criar novo (espera JSON com nome, email, idade)
        $ctrl->salvar($dados);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // PUT /usuarios/{id} → atualizar
        if ($id === null) {
            http_response_code(400);
            echo json_encode(['error' => 'ID obrigatório para atualizar']);
            exit;
        }
        $ctrl->atualizar($id, $dados);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // DELETE /usuarios/{id} → excluir
        if ($id === null) {
            http_response_code(400);
            echo json_encode(['error' => 'ID obrigatório para excluir']);
            exit;
        }
        $ctrl->excluir($id);
    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Método não permitido']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Recurso não encontrado']);
}
