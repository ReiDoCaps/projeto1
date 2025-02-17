<?php
class Noticias extends Controller
{
    private $noticiaModel;

    public function __construct()
    {
        $this->noticiaModel = $this->model('Noticia');
    }

    public function index()
    {
        $dados = $this->noticiaModel->getNoticias();
        $this->view('noticias/index', $dados);
    }
}
?>
