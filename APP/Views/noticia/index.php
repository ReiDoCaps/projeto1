<?php require APPROOT . '/Views/inc/header.php'; ?>

<section class="hero-site">
    <div class="interface">
        <div class="txt-hero">
            <h1>Saiba mais sobre <span>os esportes <span>do IFRO</span> </span></h1>
            <p>Descubra todas as novidades e atualizações sobre os esportes no IFRO! 
                <span>Esteja sempre informado sobre os eventos, competições, e</span>
                <span>conquistas dos nossos talentosos atletas.</span>
            </p>
        </div>
    </div>
</section>
<section class="vantagens">
    <div class="interface">
        <?php foreach($dados as $noticia) : ?>
        <article class="itens-conteiner">
            <div class="img-itens">
                <img src="<?php echo $noticia->imagem; ?>" class="img-fluid" alt="Descrição da imagem">
            </div>
            <div class="txt-itens">
                <a href="#"><h3><?php echo $noticia->titulo; ?></h3><p><?php echo $noticia->subtitulo; ?></p></a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require APPROOT . '/Views/inc/footer.php'; ?>
