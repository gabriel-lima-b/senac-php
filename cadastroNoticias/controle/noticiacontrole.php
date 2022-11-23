<?php
session_start();
include '../modelo/noticia.class.php';
include '../dao/noticiadao.class.php';
$noticiaDao = new NoticiaDao();
switch ($_GET['op']) {


    case 'cadastrar':

        if (isset($_POST['titulo'])
        && isset($_POST['texto'])) {

            $tz = 'America/Sao_Paulo';
            $timestamp = time();
            $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
            $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

            $noticia = new Noticia();
            $noticia->titulo = $_POST['titulo'];
            $noticia->texto = $_POST['texto'];
            $noticia->data = $dt->format('Y-m-d');
            $noticia->hora = $dt->format("H:i:s");

            //Enviando o objeto para o bd

            $noticiaDao->cadastrarNoticia($noticia);

            $_SESSION['msg'] = 'Notícia Cadastrado!';
            $_SESSION['noticia'] = serialize($noticia);

            header('location:../visao/guiresposta.php');
        }
        else {
            echo 'Variáveis inválidas!';
        }
        break;

    case 'listar':
        //Criando o objeto do tipo DAO´para fazer consulta no banco
        $array = array();
        $array = $noticiaDao->buscarNoticias();

        //Levar as informações para o GUIconsUsuario para mostrar na tela.
        $_SESSION['noticias'] = serialize($array);
        header("location:../visao/guilistanoticia.php");

    default:
        echo 'ERRO NO SWITCH';
        break;
}

?>