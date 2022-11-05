<?php
class Validacao
{
    public static function testarNome($val)
    {
        $exp = '/^[a-zAZáÁéÉíÍóÓúÚçÇãÃõÕêÊ]{2,20}$/';

        return preg_match($exp, $val);
    }

    public static function testarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    public static function testarTelefone($val)
    {

        $exp = '/^[a-zAZáÁéÉíÍóÓúÚçÇãÃõÕêÊ]{2,20}$/';

        return preg_match($exp, $val);
    }
}
?>