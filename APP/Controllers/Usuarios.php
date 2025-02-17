<?php
class Usuarios extends Controller {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index() {
        // Redirecionar para a página de login ou exibir uma mensagem básica
        $this->view('usuarios/login');
    }

    public function cadastrar() {
        $dados = [
            'nome' => '',
            'email' => '',
            'username' => '',
            'senha' => '',
            'confirma_senha' => '',
            'nome_erro' => '',
            'email_erro' => '',
            'username_erro' => '',
            'senha_erro' => '',
            'confirma_senha_erro' => ''
        ];
        $this->view('usuarios/cadastrar', $dados);
    }

    public function login() {
        $dados = [
            'username' => '',
            'senha' => '',
            'username_erro' => '',
            'senha_erro' => ''
        ];
        $this->view('usuarios/login', $dados);
    }

    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $dados = [
                'username' => trim($_POST['username']),
                'senha' => trim($_POST['senha']),
                'username_erro' => '',
                'senha_erro' => ''
            ];

            if (empty($dados['username'])) {
                $dados['username_erro'] = 'Por favor, preencha o campo usuário';
            }

            if (empty($dados['senha'])) {
                $dados['senha_erro'] = 'Por favor, preencha o campo senha';
            }

            if (empty($dados['username_erro']) && empty($dados['senha_erro'])) {
                $usuario = $this->usuarioModel->login($dados['username'], $dados['senha']);

                if ($usuario) {
                    Sessao::criarSessaoUsuario($usuario);
                    Url::redirecionar('paginas/index');
                } else {
                    $dados['senha_erro'] = 'Senha ou usuário incorretos';
                    $this->view('usuarios/login', $dados);
                }
            } else {
                $this->view('usuarios/login', $dados);
            }
        } else {
            $dados = [
                'username' => '',
                'senha' => '',
                'username_erro' => '',
                'senha_erro' => ''
            ];
            $this->view('usuarios/login', $dados);
        }
    }

    public function processCadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $dados = [
                'nome' => trim($_POST['nome']),
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'senha' => trim($_POST['senha']),
                'confirma_senha' => trim($_POST['confirmSenha']),
                'nome_erro' => '',
                'email_erro' => '',
                'username_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => ''
            ];

            if (empty($dados['nome'])) {
                $dados['nome_erro'] = 'Por favor, preencha o campo nome';
            }

            if (empty($dados['email'])) {
                $dados['email_erro'] = 'Por favor, preencha o campo email';
            } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
                $dados['email_erro'] = 'Email inválido';
            }

            if (empty($dados['username'])) {
                $dados['username_erro'] = 'Por favor, preencha o campo usuário';
            }

            if (empty($dados['senha'])) {
                $dados['senha_erro'] = 'Por favor, preencha o campo senha';
            } elseif (strlen($dados['senha']) < 8) {
                $dados['senha_erro'] = 'A senha deve ter pelo menos 8 caracteres';
            }

            if ($dados['senha'] !== $dados['confirma_senha']) {
                $dados['confirma_senha_erro'] = 'As senhas não coincidem';
            }

            if (empty($dados['nome_erro']) && empty($dados['email_erro']) && empty($dados['username_erro']) && empty($dados['senha_erro']) && empty($dados['confirma_senha_erro'])) {
                $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

                if ($this->usuarioModel->cadastrarParcial($dados)) {
                    Sessao::mensagem('usuario', 'Cadastro realizado com sucesso');
                    Url::redirecionar('usuarios/login');
                } else {
                    die("Erro ao armazenar o usuário no banco de dados");
                }
            } else {
                $this->view('usuarios/cadastrar', $dados);
            }
        } else {
            $dados = [
                'nome' => '',
                'email' => '',
                'username' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'username_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => ''
            ];
            $this->view('usuarios/cadastrar', $dados);
        }
    }

    public function atualizar() {
        $dados = [
            'telefone' => '',
            'data_nascimento' => '',
            'endereco' => '',
            'telefone_erro' => '',
            'data_nascimento_erro' => '',
            'endereco_erro' => ''
        ];
        $this->view('usuarios/atualizar', $dados);
    }

    public function processAtualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $dados = [
                'telefone' => trim($_POST['telefone']),
                'data_nascimento' => trim($_POST['data_nascimento']),
                'endereco' => trim($_POST['endereco']),
                'usua_id' => $_SESSION['usua_id'], // Assumindo que o ID do usuário está salvo na sessão
                'telefone_erro' => '',
                'data_nascimento_erro' => '',
                'endereco_erro' => ''
            ];

            if (empty($dados['telefone'])) {
                $dados['telefone_erro'] = 'Por favor, preencha o campo telefone';
            }

            if (empty($dados['data_nascimento'])) {
                $dados['data_nascimento_erro'] = 'Por favor, preencha o campo data de nascimento';
            }

            if (empty($dados['endereco'])) {
                $dados['endereco_erro'] = 'Por favor, preencha o campo endereço';
            }

            if (empty($dados['telefone_erro']) && empty($dados['data_nascimento_erro']) && empty($dados['endereco_erro'])) {
                if ($this->usuarioModel->atualizar($dados)) {
                    Sessao::mensagem('usuario', 'Dados atualizados com sucesso');
                    Url::redirecionar('usuarios/atualizar');
                } else {
                    die("Erro ao atualizar o usuário no banco de dados");
                }
            } else {
                $this->view('usuarios/atualizar', $dados);
            }
        } else {
            $dados = [
                'telefone' => '',
                'data_nascimento' => '',
                'endereco' => '',
                'telefone_erro' => '',
                'data_nascimento_erro' => '',
                'endereco_erro' => ''
            ];
            $this->view('usuarios/atualizar', $dados);
        }
    }
}