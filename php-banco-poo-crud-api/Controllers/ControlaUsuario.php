<?php
require_once __DIR__ . '../../Models/DAO/UsuarioDAO.php';
require_once __DIR__ . '../../Models/Usuario.php';

class ControlaUsuario
{
    private UsuarioDAO $dao;

    public function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    // listar todos os usuários
    public function listarTodos(): void
    {
        $todos = $this->dao->listar();
        echo json_encode($todos);
    }

    // buscar usuário por ID
    public function buscarPorId(int $id): void
    {
        $usuario = $this->dao->buscarPorId($id);
        if ($usuario === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Usuário não encontrado']);
        } else {
            echo json_encode($usuario);
        }
    }

    // Criar novo usuário
    public function salvar(array $data): void
    {
        $usuario = new Usuario(
            $data['nome'],
            $data['email'],
            (int)$data['idade']
        );
        $novoId = $this->dao->salvar($usuario);
        $criado = $this->dao->buscarPorId($novoId);
        
        http_response_code(201);
        echo json_encode($criado);
    }

    // Atualizar usuário
    public function atualizar(int $id, array $data): void
    {
        $usuarioExiste = $this->dao->buscarPorId($id);
        if ($usuarioExiste === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Usuário não encontrado']);
            return;
        }

        $nome  = $data['nome'];
        $email = $data['email'];
        $idade = $data['idade'];

        $usuario = new Usuario($nome, $email, $idade);
        $usuario->setId($id);
        $usuarioAtualizado = $this->dao->atualizar($usuario);

        if ($usuarioAtualizado) {
            $atualizado = $this->dao->buscarPorId($id);
            echo json_encode($atualizado);
            http_response_code(200);
        } 
    }

    // Excluir usuário
    public function excluir(int $id): void
    {
        $usuarioExiste = $this->dao->buscarPorId($id);
        if ($usuarioExiste === null) {
            http_response_code(404);
            echo json_encode(['error' => 'Usuário não encontrado']);
            return;
        }

        $apagado = $this->dao->excluir($id);
        if ($apagado) {
            http_response_code(204);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Falha ao excluir usuário']);
        }
    }
}
