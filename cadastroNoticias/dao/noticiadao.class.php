<?php
include '../persistencia/ConexaoBanco.class.php';

class NoticiaDao
{
    private $conexao = null;

    public function __construct()
    {
        $this->conexao = ConexaoBanco::getInstancia();
    } //fecha o construtor

    public function cadastrarNoticia($n)
    {
        try {
            $stat = $this->conexao->prepare("insert into noticia(idNoticia, titulo, texto, data, hora) values (null,?,?,?,?)");

            $stat->bindValue(1, $n->titulo);
            $stat->bindValue(2, $n->texto);
            $stat->bindValue(3, $n->data);
            $stat->bindValue(4, $n->hora);

            $stat->execute();

            //Encerrando a conexão cm o banco
            $this->conexao = null;

        }
        catch (PDOException $e) {
            echo 'Erro ao cadastrar usuário';
        } //fecha o catch
    }

    public function buscarNoticias()
    {
        try {
            $stat = $this->conexao->query("select * from noticia");
            $array = array();
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Noticia');
            $this->conexao = null;
            return $array;
        }
        catch (PDOException $e) {
            echo 'Erro ao buscar as notícias!' . $e;
        } //fecha o catch
    } //fecha p método buscarUsuarios

}
?>