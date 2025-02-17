<?php
class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function cadastrarParcial($dados) {
        $this->db->query("INSERT INTO usuario (usua_nome, usua_senha, usua_email, usua_login, tius_id) VALUES (:nome, :senha, :email, :username, 2)");
        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':senha', $dados['senha']);
        $this->db->bind(':email', $dados['email']);
        $this->db->bind(':username', $dados['username']);

        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $senha) {
        $this->db->query("SELECT * FROM usuario WHERE usua_login = :username");
        $this->db->bind(':username', $username);

        $row = $this->db->resultado();

        if ($row && password_verify($senha, $row->usua_senha)) {
            return $row;
        } else {
            return false;
        }
    }

    public function atualizar($dados) {
        $this->db->query("UPDATE usuario SET usua_telefone = :telefone, usua_dt_nascimento = :data_nascimento, usua_endereco = :endereco WHERE usua_id = :usua_id");
        $this->db->bind(':telefone', $dados['telefone']);
        $this->db->bind(':data_nascimento', $dados['data_nascimento']);
        $this->db->bind(':endereco', $dados['endereco']);
        $this->db->bind(':usua_id', $dados['usua_id']);

        if ($this->db->executa()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
