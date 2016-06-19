<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="img/favicon.ico" rel="shortcut icon" />
    <meta name="description" content="" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="rating" content="General" />
    <meta name="author" content="Trustcode" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500|Ubuntu Condensed' rel='stylesheet' type='text/css'>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="menu-topo menu-interno">
            <div class="alinha">
                <a href="/home/">
            		<div class="logo-topo">
                        Show Book
            		</div>
                </a>
        		<nav>
        			<ul>
        				<li><a href="/artistas" class="btn01">Artistas</a></li>
        				<li><a href="/casas" class="btn02">Bares e Casas Noturnas</a></li>
        				<li><a href="#" id="btn-faca-parte-menu" class="btn03">Fa&ccedil;a Parte</a></li>
        				<li><a href="/artistas" class="btn04">Contrate</a></li>
        				<li><a href="https://www.facebook.com/showbookagencia/" target="_blank" class="btn05">Facebook</a></li>
        			</ul>
        		</nav>
            </div>
    	</div>
    </header>


    <div class="faca-parte">
        <header>
            <h3>Fa&ccedil;a Parte</h3>
            <div class="fecha-janela">
                Fechar
            </div>
            <a href="#" class="btn-modalidades"> Modalidades de Parceria</a>
        </header>
        <div class="content-faca-parte">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, iste! Aspernatur natus quis cumque molestias harum facilis pariatur, ducimus placeat. Quis minima facilis nihil amet minus consectetur alias nisi aliquam.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis minus facere consequatur molestiae velit eos esse cum autem ea eius.</p>
            <div class="logo-faca-parte"></div>
        </div>
        <div class="form-faca-parte">
        	<?php $formulario = get_option('showbook_theme_faca_parte_form_shortcode');
                  echo do_shortcode($formulario); ?>
        </div>
    </div>

    <div class="fundo-escuro"></div>
    <main style="min-height:40%;">
