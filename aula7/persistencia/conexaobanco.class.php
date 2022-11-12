<?php

class ConexaoBanco extends PDO
{
    private static $instance = null;

    public function ConexaoBanco($dsn, $usuario, $senha)
    {
        parent::__construct($dsn, $usuario, $senha);
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new ConexaoBanco("mysql:dbname=noite;host=localhost", "root", "");
            }
            catch (Exception $err) {
                echo 'Erro ao conectar com o banco.';
                exit();
            }
        }
        return self::$instance;
    }
}
?>