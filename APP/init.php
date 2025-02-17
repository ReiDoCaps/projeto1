<?php
// Carregar as bibliotecas básicas
require_once 'Libraries/Core.php';
require_once 'Libraries/Controller.php';
require_once 'Libraries/Database.php';

// Carregar os helpers
require_once 'Helpers/url_helper.php';
require_once 'Helpers/sessao_helper.php';

// Carregar o autoload das classes
spl_autoload_register(function ($class_name) {
    require_once 'Libraries/' . $class_name . '.php';
});
?>
