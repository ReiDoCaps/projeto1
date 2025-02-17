<?php
class Sessao {
    public static function criarSessaoUsuario($usuario) {
        session_start();
        $_SESSION['usua_id'] = $usuario->usua_id;
        $_SESSION['usua_nome'] = $usuario->usua_nome;
        $_SESSION['usua_email'] = $usuario->usua_email;
        $_SESSION['usua_login'] = $usuario->usua_login;
        $_SESSION['tius_id'] = $usuario->tius_id;
    }

    public static function destruirSessaoUsuario() {
        session_start();
        session_unset();
        session_destroy();
    }

    public static function mensagem($nome, $mensagem = '', $classe = 'alert alert-success') {
        if (!empty($mensagem)) {
            if (isset($_SESSION[$nome])) {
                unset($_SESSION[$nome]);
            }
            $_SESSION[$nome] = $mensagem;
            $_SESSION[$nome . '_classe'] = $classe;
        } elseif (isset($_SESSION[$nome])) {
            $classe = isset($_SESSION[$nome . '_classe']) ? $_SESSION[$nome . '_classe'] : '';
            echo '<div class="' . $classe . '" id="msg-flash">' . $_SESSION[$nome] . '</div>';
            unset($_SESSION[$nome]);
            unset($_SESSION[$nome . '_classe']);
        }
    }
}
?>
