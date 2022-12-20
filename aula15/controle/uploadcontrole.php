<?php

include '../util/controlesessao.class.php';
include '../modelo/upload.class.php';
include '../util/validacao.class.php';


ControleSessao::abrirSessao();

$erros = array();
if (!empty($_FILES['arquivo']['name'])) {
    $up = new Upload($_FILES['arquivo']);
    $up->diretorio = '../arquivos';

    $aceitos = array('application/pdf', 'application/msword');
    $up->formatos = $aceitos;


    if ($up->erro != 0) {
        $erro[] = $up->obterErro();
    }

    if (!$up->verificarTamanho()) {
        $erros[] = 'Tamanho Inválido';
    }

    if (!$up->verificarTipo()) {
        $erros[] = 'Formato de arquivo não permitido' . $up->tipo;
    }

}
?>