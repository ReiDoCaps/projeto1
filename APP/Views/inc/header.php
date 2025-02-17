<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleHeader.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleFooter.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleIndex.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo URLROOT; ?>/js/menu.js" defer></script>
</head>
<body>
<header id="header">
    <div class="interface">
        <section class="logo">
            <a href="<?php echo URLROOT; ?>"> <img src="<?php echo URLROOT; ?>/imgs/InfoEsporte logo.png" alt="InfoEsporte"> InfoEsporte</a>
        </section>
        <section class="menu-desktop">
            <nav>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/noticias">Notícias</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Esporte</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URLROOT; ?>/noticias#futebol">Futebol</a></li>
                            <li><a href="<?php echo URLROOT; ?>/noticias#basquete">Basquete</a></li>
                            <li><a href="<?php echo URLROOT; ?>/noticias#volei">Vôlei</a></li>
                            <li><a href="<?php echo URLROOT; ?>/noticias#outro">Outros</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo URLROOT; ?>/sobre">Desenvolvedores</a></li>
                    <li><a href="https://portal.ifro.edu.br/guajara-mirim">IFRO</a></li>
                </ul>
            </nav>
        </section>
        <section class="btn-contato">
            <a href="<?php echo URLROOT; ?>/usuarios/index"><button>Login</button></a>
        </section>
    </div>
</header>
