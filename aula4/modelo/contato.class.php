<?php

class Contato
{
    private $nome;
    private $email;
    private $telefone;


    public function __construct($nome, $email, $telefone)
    {
        $this->$nome = $nome;
        $this->$email = $email;
        $this->$telefone = $telefone;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}
?>