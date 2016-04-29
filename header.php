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
    <link href='https://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="menu-topo">
    		<div class="logo-topo">
    			Show Book
    		</div>
    		<nav>
    			<ul>
    				<li><a href="#" class="btn01">Artistas</a></li>
    				<li><a href="#" class="btn02">Bares e Casas Noturnas</a></li>
    				<li><a href="#" class="btn03">Fa&ccedil;a Parte</a></li>
    				<li><a href="#" class="btn04">Contrate</a></li>
    				<li><a href="#" class="btn05">Facebook</a></li>
    			</ul>
    		</nav>
    	</div>
    </header>
    <main style="min-height:40%;">
