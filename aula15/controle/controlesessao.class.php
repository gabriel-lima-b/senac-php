<?php
class ControleSessao
{
    public static function abrirSessao()
    {
        session_start();
    }

    public static function destruirSessao()
    {
        session_destroy();
    }

    public static function destruirVariavel($nome)
    {
        unset($_SESSION[$nome]);
    }

    public static function inserirVariavel($nome, $valor)
    {
        $_SESSION[$nome] = $valor;
    }

    public static function buscarVariavel($nome)
    {
        return $_SESSION[$nome];
    }

    public static function inserirObjeto($nome, $obj)
    {
        $_SESSION[$nome] = serialize($obj);
    }

    public static function buscarObjeto($obj)
    {
        return unserialize($_SESSION[$obj]);
    }
}
?>