<?php

include 'Database.php';

class ControlaUsuario
{
    private $tabela = 'usuarios';
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function salvar(Usuario $usuario)
    {
        try {
            $sql = "INSERT INTO $this->tabela (nome, email, idade) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$usuario->getNome(), $usuario->getEmail(), $usuario->getIdade()]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir usuário: " . $e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $usuarios;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar usuários: " . $e->getMessage());
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir usuário: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $usuario;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar usuário: " . $e->getMessage());
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {
            $sql = "UPDATE $this->tabela SET nome = ?, email = ?, idade = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $usuario->getNome(),
                $usuario->getEmail(),
                $usuario->getIdade(),
                $usuario->getId()
            ]);
            $this->db->closeConnection();
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }
}
