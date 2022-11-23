<?php
session_start();
session_unset(); //Removendo as sessões anteriores

include_once'../modelo/usuario.class.php';
include_once'../util/validacao.class.php';
include_once'../dao/usuariodao.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){

		case 'cadastrar':
			//Cadastro COM Validação, verificando se existem as variáveis de post
			if( isset($_POST['txtlogin']) &&
				isset($_POST['txtsenha']) &&
				isset($_POST['seltipo']) ) {

				//Criando as variáveis para receber os valor do Array
				$login = $_POST['txtlogin'];
				$senha = $_POST['txtsenha'];
				$tipo  = $_POST['seltipo'];
				//Fazendo a validação
				$erros = array();

				if(!Validacao::testarLogin($login)){
					$erros[] = 'Login inválido!';
				}

				if(!Validacao::testarSenha($senha)){
					$erros[] = 'Senha inválida!';
				}

				if(!Validacao::testarTipo($tipo)){
					$erros[] = 'Tipo inválido!';
				}

				if( count($erros) == 0 ){

					$u = new Usuario();

					$u->login = $login;
					$u->senha = $senha;
					$u->tipo  = $tipo;

					//Enviando o objeto $u para o banco de dados
					$uDAO = new UsuarioDAO();

					$uDAO->cadastrarUsuario($u);

					$_SESSION['msg'] = 'Usuário Cadastrado!';
					$_SESSION['usuario'] = serialize($u);

					header("location:../visao/guiresposta.php");
				}else{
					$_SESSION['e'] = serialize($erros);

					header("location:../visao/guierro.php");
				}//fim if count

			}else{
				echo 'Variáveis Inválidas!';
			}//fecha o if isset

			break;

		case 'consultar':
			
			//Criando o objeto do tipo DAO´para fazer consulta no banco
			$uDAO = new UsuarioDAO();
			$array = array();
			$array = $uDAO->buscarUsuarios();

			//Levar as informações para o GUIconsUsuario para mostrar na tela.
			$_SESSION['usuarios'] = serialize($array);
			header("location:../visao/guiconsusuario.php");

			break;//fecha case buscar

		default: //echo 'Erro no switch';
			break;//fecha o default
	}//fecha o switch
}else{
	echo'Variável op não existe!';
}//fecha else ISSET op
?>