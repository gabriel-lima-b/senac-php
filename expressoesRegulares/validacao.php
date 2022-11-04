<?php
class Validacao{
    public static function testaExpressaoRegular($expressao,$valor)
    {
        if(preg_match($expressao,$valor)){
            return "Valor validado com sucesso!";
        }
        else{
            return "Valor incorreto.";
        }
    }

    
}

$expressao='/^[a-z]{2,5}$/';
$valor = '5ag';

echo 'Resultado teste: '.Validacao::testaExpressaoRegular($expressao,$valor);
?>