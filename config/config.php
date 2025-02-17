<?php
// Configurações do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'infoesporte');

// URL raiz
define('URLROOT', 'http://localhost/projeto1');

// Nome do site
define('SITENAME', 'InfoEsporte');

// Caminho para o diretório raiz da aplicação
define('APPROOT', dirname(dirname(__FILE__)));

// Função de autoload para carregar classes automaticamente
spl_autoload_register(function ($class_name) {
    $directories = [
        '../app/Libraries/',
        '../app/Controllers/',
        '../app/Models/',
        '../app/Helpers/',
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>
