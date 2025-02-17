<?php
class Noticia {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function obterNoticias(){
        $this->db->query("SELECT noti_titulo AS titulo, noti_subtitulo AS subtitulo, noti_imagem AS imagem FROM noticia");
        return $this->db->resultados();
    }
}
?>
