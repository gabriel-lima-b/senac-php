<?php
session_start();
include '../modelo/usuario.class.php';
include '../util/validacao.class.php';
include '../dao/usuariodao.class.php';

switch ($_GET['op']) {
    case 'cadastrar':

        if (isset($_POST['txtlogin'])
        && isset($_POST['txtsenha'])
        && isset($_POST['seltipo'])
        ) {
            //TODO: validar as paradas
            $erros = array();
            if (!Validacao::testarLogin($_POST['txtlogin'])
            ) {
                $erros[] = 'login inválido.';
            }
            if (!Validacao::testarSenha($_POST['txtsenha'])
            ) {
                $erros[] = 'senha inválida.';
            }
            if (!Validacao::testarTipo($_POST['seltipo'])
            ) {
                $erros[] = 'tipo inválido.';
            }
            if (count($erros) == 0) {
                //Cadastro com validação
                $usuario = new Usuario();
                $usuario->login = $_POST['txtlogin'];
                $usuario->senha = $_POST['txtsenha'];
                $usuario->tipo = $_POST['seltipo'];

                //Enviando o objeto para o bd
                $usuarioDao = new UsuarioDAO();
                $usuarioDao->cadastrarUsuario($usuario);

                $_SESSION['msg'] = 'Usuário Cadastrado!';
                $_SESSION['usuario'] = serialize($usuario);

                header('location:../visao/guiresposta.php');
            }
            else {
                $_SESSION['e'] = serialize($erros);

                header('location:../visao/guierro.php');
            }
        }
        else {
            echo 'Variáveis inválidas!';
        }


        break;

    case 'buscar':
        # code...
        break;

    default:
        echo 'ERRO NO SWITCH';
        break;
}

?>