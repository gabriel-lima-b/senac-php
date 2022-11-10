<?php
class Pessoa
{
    private $nome;
    private $idade;

    public function __get($att)
    {
        return $this->$att;
    }

    public function __set($att, $valor)
    {
        $this->$att = $valor;
    }



}

?>