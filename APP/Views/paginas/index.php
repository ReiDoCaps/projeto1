<?php require APPROOT . '/app/Views/inc/header.php'; ?>
<div class="container mt-5">
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
            <?php 
                if (!empty($dados['noticias'])) {
                    foreach($dados['noticias'] as $noticia) {
                        echo '
                        <article class="itens-conteiner">
                            <div class="img-itens">
                                <img src="'.$noticia->imagem.'" class="img-fluid" alt="Descrição da imagem">
                            </div>
                            <div class="txt-itens">
                                <a href="#"><h3>' . $noticia->titulo .'</h3><p>' . $noticia->subtitulo . '</p></a>
                            </div>
                        </article>';
                    }
                } else {
                    echo "0 resultados";
                }
            ?>
        </div>
    </section>
</div>
<?php require APPROOT . '/app/Views/inc/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/menu.js"></script>
