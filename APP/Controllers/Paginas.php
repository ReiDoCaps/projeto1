<?php
class Paginas extends Controller {
    private $noticiaModel;

    public function __construct(){
        $this->noticiaModel = $this->model('Noticia');
    }

    public function index() {
        $noticias = $this->noticiaModel->obterNoticias();

        $dados = [
            'titulo' => 'Bem-vindo ao InfoEsporte',
            'noticias' => $noticias
        ];

        $this->view('paginas/index', $dados);
    }
}
?>
    