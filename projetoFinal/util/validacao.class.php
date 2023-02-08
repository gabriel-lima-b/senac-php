<?php
class Validacao
{

	public static function testarLogin($valor)
	{
		$exp = '/^[a-z@_]{3,20}$/';
		if (preg_match($exp, $valor)) {
			return true;
		}
		else {
			return false;
		} //fecha o else
	} //fecha o método

	public static function testarSenha($valor)
	{
		$exp = '/^[0-9]{6,12}$/';
		if (preg_match($exp, $valor)) {
			return true;
		}
		else {
			return false;
		} //fecha o else
	} //fecha o método

	public static function testarTipo($valor)
	{
		$exp = '/^(admin|visitante)$/';
		if (preg_match($exp, $valor)) {
			return true;
		}
		else {
			return false;
		} //fecha o else
	} //fecha o método

	public static function retirarEspacos($valor)
	{
		return trim($valor);
	} //fech o método retirarEspacos


	public static function escaparAspas($valor)
	{
		return addslashes($valor);
	} //fecha o método escaparAspas



} //fecha a classe validação
?>