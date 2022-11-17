<?php
class Usuario
{
    private $idUsuario;
    private $login;
    private $senha;
    private $tipo;

    public function __construct()
    {

    }

    public function Usuario()
    {

    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __toString()
    {
        return '<br> Código: ' . $this->idUsuario .
            '<br> Login: ' . $this->login .
            '<br> Senha: ' . $this->senha .
            '<br> Tipo: ' . $this->tipo;
    }
}
?>