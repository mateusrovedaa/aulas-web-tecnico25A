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
            throw new \Exception("Error to insert user: " . $e->getMessage());
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
}
