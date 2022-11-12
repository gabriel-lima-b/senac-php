<?php
class Validacao
{
    public static function testarLogin($valor)
    {
        $exp = '/^[a-z@_]{3,20}$/';

        return preg_match($exp, $valor);
    }
    public static function testarSenha($valor)
    {
        $exp = '/^[0-9]{6,12}$/';

        return preg_match($exp, $valor);
    }

    public static function testarTipo($valor)
    {
        $exp = '/^(adm|visitante)$/';

        return preg_match($exp, $valor);
    }


}


?>