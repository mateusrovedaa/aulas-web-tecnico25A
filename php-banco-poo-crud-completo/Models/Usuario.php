<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $idade;

    public function __construct($nome, $email, $idade)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->idade = $idade;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
}
