<?php
class Validacao
{
    public static function validarNome($nome)
    {
        $nome = trim($nome);

        return strlen($nome) >= 3 && !is_numeric($nome);

    }

    public static function retirarEspacos($valor)
    {
        return str_replace(" ", "", $valor);
    }

    public static function validarNumero($numero)
    {
        return is_numeric($numero) && $numero > 0;
    }
}
?>