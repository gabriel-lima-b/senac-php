<?php

include '..\persistencia\conexaobanco.class.php';

class UsuarioDao
{
    private $conexao = null;
    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstance();
    }

    public function cadastrarUsuario($usuario)
    {
        try {
            $statement = $this->conexao->prepare('INSERT INTO usuario(idusuario,login,senha,tipo) values (null,?,?,?);');
            $statement->bindValue(1, $usuario->login);
            $statement->bindValue(2, $usuario->senha);
            $statement->bindValue(3, $usuario->tipo);

            $statement->execute();

            $this->conexao = null;
        }
        catch (PDOException $err) {
            echo 'Erro ao cadastrar usuário: ' . $err->getMessage;
        }
    }
}
?>