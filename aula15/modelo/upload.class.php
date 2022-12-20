<?php
class Upload
{
    private $tamanho;
    private $tipo;
    private $nome;
    private $nomeTemporario;
    private $erro;
    private $diretorio;
    private $formatos;
    private $tamanhoMaximo;



    public function __construct($arquivo)
    {
        $this->nome = $arquivo['name'];
        $this->tamanho = $arquivo['size'];
        $this->nomeTemporario = $arquivo['tamp_name'];
        $this->tipo = $arquivo['type'];
        $this->erro = $arquivo['error'];
        $this->tamanhoMaximo = 2097152;
        $this->formatos = array();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function verificarTamanho()
    {
        return $this->tamanho <= $this->tamanhoMaximo;
    }

    public function verificarTipo()
    {
        return in_array($this->tipo, $this->formatos);
    }

    public function obterErro()
    {
        switch ($this->erro) {
            case 1:
                return 'Ultrapassou limite de tamanho do servidor';

            case 2:
                return 'Ultrapassou limite de arquivo do formulário';

            case 3:
                return 'Upload não foi concluído';
            case 4:
                return 'O upload não foi feito';
        }
    }

    public function upload($novonome)
    {
        $ponto = strpos($this->nome, ".");
        $ext = substr($this->nome, $ponto);
        $destino = $this->diretorio . "/" . $novonome . $ext;
        move_uploaded_file($this->nomeTemporario, $destino);
    }
}
?>