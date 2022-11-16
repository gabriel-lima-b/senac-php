<?php
class Validacao{
	public static function testarNome($val){
		$exp='/^[a-zA-ZáÁéÉíÍóÓúÚçÇãÃõÕ]{2,20}$/';
		if(preg_match($exp,$val)){
			return true;
		}else{
			return false;
		}//fecha o else
	}//fecha o método

	public static function testarEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}//fecha o else
	}//fecha o método

	public static function testarFone($val){
		$exp = '/^[0-9]{8,16}$/';
		if(preg_match($exp, $val)){
			return true;
		}else{
			return false;
		}//fecha o else
	}//fecha o método
}//fecha a classe Validacao
?>