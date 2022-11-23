
<?php
class Noticia
{
    private $idNoticia;
    private $titulo;
    private $texto;
    private $data;
    private $hora;

    public function __construct()
    {

    } //fecha construtor

    public function Noticia()
    {

    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public function __set($atrib, $valor)
    {
        $this->$atrib = $valor;
    }

    public function __toString()
    {
        return '<br> Código: ' . $this->idNoticia .
            '<br> titulo: ' . $this->titulo .
            '<br> texto: ' . $this->texto .
            '<br> data: ' . $this->data .
            '<br> hora: ' . $this->hora;
    } //fecha o toString

}
?>
