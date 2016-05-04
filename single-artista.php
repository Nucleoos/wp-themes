<?php while ( have_posts() ) : the_post(); ?>

<!-- Detalhe Banda -->
    <div class="banda-detalhe">
        <header>
            <h3><?php the_title(); ?></h3>
            <div class="btn-contrate-banda"></div>
                <div class="quero-show">
                    <div class="btn-dia">Dia</div>
                    <div class="btn-local">Local</div>
                    <div class="form-dados">
                        <form action="">
                            <div class="campo01">
                                <label>Nome:</label>
                                <input type="text" name="nome">
                            </div>
                            <div class="campo01">
                                <label>E-mail:</label>
                                <input type="text" name="email">
                            </div>
                            <div class="campo01">
                                <label>Telefone:</label>
                                <input type="text" name="telefone">
                            </div>
                            <div class="campo01"><input type="submit"  name="submit" value="QUERO ESSE SHOW"  class="btn-quero-show"></div>
                        </form>
                    </div>
                </div>
            <div class="fecha-janela">Fechar</div>
        </header>
        <div class="banda-foto">
            <img src="img/banner/banda01/foto.jpg" alt="">
        </div>
        <div class="banda-conteudo">
            <div class="banda-logo">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="banda-texto">
                <p><?php the_content(); ?></p>
            </div>
        </div>
        <div class="banda-conteudo">
            <div class="banda-video">

            </div>
            <div class="banda-botoes">
                <a href="#" class="btn01">Oficial</a>
                <div class="btn02">
                    <a href="#">Release</a>
                    <a href="#">Rider T&eacute;cnico</a>
                </div>
                <div class="btn03">
                    <span>27/SETEMBRO/22H</span>
                    <a href="#">Local</a>
                </div>
            </div>
        </div>
    </div>


<?php endwhile; // end of the loop. ?>
