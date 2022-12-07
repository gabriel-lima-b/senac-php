<?php
	include_once'../dao/usuariodao.class.php';

	class ControleLogin{

		public static function logar($u){
			$uDAO = new UsuarioDAO();
			$usuario = $uDAO->verificarUsuario($u);

			if($usuario && !is_null($usuario) ){

				$_SESSION['privateUser'] = serialize($usuario);

				//Mando o usuário para a página desejada
				header('location:../index.php');
			}else{
				$_SESSION['msg']= 'login/senha inválidos!';
				header('location:../visao/guiresposta.php');
			}//fecha o else
		}//fecha o método logar

		public static function deslogar(){
			unset($_SESSION['privateUser']);
			$_SESSION['msg'] = 'Você foi deslogado!';
			header('location:../visao/guiresposta.php');
		}//fecha o método deslogar


		public static function verificarAcesso(){
			if(!isset($_SESSION['privateUser']) ){
				$_SESSION['msg'] = 'Você não está logado';
				header('location:../visao/guiresposta.php');
			}//fecha o if
		}//fecha o método verificarAcesso

	}//fecha a classe ControleLogin
?>