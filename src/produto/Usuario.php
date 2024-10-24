<?php
include_once 'Conectar.php';

class Usuario 
{
    private $nome;
    private $senha;
    private $conn;

    public function getNome() 
    {
        return $this->nome;
    }

    public function setNome($nome) 
    {
        $this->nome = $nome;
    }

    public function getSenha() 
    {
        return $this->senha;
    }

    public function setSenha($senha) 
    {
        $this->senha = $senha;
    }

    function logar () 
    {
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE nome LIKE ? AND senha LIKE ?"); 
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sql->execute();
            $this->conn = null;
            return $sql->fetchAll();
        }
        catch (PDOException $exc) 
        {
            echo "<span class='text-green-200'>Erro ao executar consulta.</span>" . $exc->getMessage();
        } 
    }

    // Encerramento da classe usuario
}
?>
