<?php
// DAO = Data Access Object
// Esta classe concentra TODO o SQL da tabela "cliente".

require_once 'conexao.php';

class ClienteDAO
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = conectar();
    }

    // C - Create
    public function inserir($nome, $email, $telefone)
    {
        $sql = $this->pdo->prepare('INSERT INTO cliente (nome, email, telefone) VALUES (?, ?, ?)');
        $sql->execute([$nome, $email, $telefone]);

        return $this->pdo->lastInsertId();
    }

    // R - Read
    public function listar()
    {
        $sql = $this->pdo->query('SELECT * FROM cliente ORDER BY nome');
        return $sql->fetchAll();
    }

    public function buscarPorId($id)
    {
        $sql = $this->pdo->prepare('SELECT * FROM cliente WHERE id = ?');
        $sql->execute([$id]);
        return $sql->fetch();
    }

    // U - Update
    public function atualizar($id, $nome, $email, $telefone)
    {
        $sql = $this->pdo->prepare('UPDATE cliente SET nome = ?, email = ?, telefone = ? WHERE id = ?');
        return $sql->execute([$nome, $email, $telefone, $id]);
    }

    // D - Delete
    public function excluir($id)
    {
        $sql = $this->pdo->prepare('DELETE FROM cliente WHERE id = ?');
        return $sql->execute([$id]);
    }
}
