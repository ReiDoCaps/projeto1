<?php
// Iniciando a sessão
session_start();

// Incluindo o autoload das classes
require_once '../config/config.php';
require_once '../app/init.php';

// Inicializando a aplicação
$app = new Core();
?>
