<?php
class Core {
    protected $controllerAtual = 'Paginas';
    protected $metodoAtual = 'index';
    protected $parametros = [];

    public function __construct(){
        $url = $this->getUrl();

        // Verifica se $url não é null antes de acessar $url[0]
        if(isset($url[0]) && file_exists('../APP/Controllers/'.ucwords($url[0]).'.php')){
            $this->controllerAtual = ucwords($url[0]);
            unset($url[0]);
        }

            require_once '../APP/Controllers/'.$this->controllerAtual.'.php';
        $this->controllerAtual = new $this->controllerAtual;

        if(isset($url[1])){
            if(method_exists($this->controllerAtual, $url[1])){
                $this->metodoAtual = $url[1];
                unset($url[1]);
            }
        }

        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controllerAtual, $this->metodoAtual], $this->parametros);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
?>
