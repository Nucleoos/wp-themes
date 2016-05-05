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
        <div class="menu-topo">
            <a href="/home/">
        		<div class="logo-topo">
                    Show Book
        		</div>
            </a>
    		<nav>
    			<ul>
    				<li><a href="/events" class="btn01">Artistas</a></li>
    				<li><a href="/events" class="btn02">Bares e Casas Noturnas</a></li>
    				<li><a href="#" class="btn03">Fa&ccedil;a Parte</a></li>
    				<li><a href="#" class="btn04">Contrate</a></li>
    				<li><a href="#" class="btn05">Facebook</a></li>
    			</ul>
    		</nav>
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
    		<form action="">
    			<div class="campo01">
    				<label>Nome:</label>
    				<input type="text" name="nome">
    			</div>
    			<div class="campo02">
    				<label>RG:</label>
    				<input type="text" name="rg">
    			</div>
    			<div class="campo02">
    				<label class="cpf">CPF:</label>
    				<input type="text" name="cpf" class="campo-cpf">
    			</div>
    			<div class="campo01">
    				<label>Email:</label>
    				<input type="text" name="email">
    			</div>
    			<div class="campo01">
    				<label>Telefone:</label>
    				<input type="text" name="telefone">
    			</div>
    			<div class="campo01">
    				<label>Endere&ccedil;o:</label>
    				<input type="text" name="endereco">
    			</div>
    			<div class="campo02">
    				<label>Atua&ccedil;&atilde;o:</label>
    				<input type="text" name="atuacao">
    			</div>
    			<div class="campo02">
    				<label>Estilo:</label>
    				<input type="text" name="estilo">
    			</div>
    			<div class="campo01">
    				<label>Site:</label>
    				<input type="text" name="site">
    			</div>
    			<div class="campo01">
    				<label>Facebook:</label>
    				<input type="text" name="facebook">
    			</div>
    			<div class="campo03">
    				<label>Modalidade Escolhida:</label>
    				<div>
    					<input type="radio" name="modalidade" value="Modal X"> Modal X
    				</div>
    				<div>
    					<input type="radio" name="modalidade" value="Modal Y"> Modal Y
    				</div>
    				<div>
    					<input type="radio" name="modalidade" value="Modal Z"> Modal Z
    				</div>
    			</div>
    			<div class="campo03">
    				<p><input type="checkbox" name="aceito" value="aceito">Eu li e estou de acordo com o contrato de parceria.</p>
    			</div>
    			<div class="campo03">
    				<input type="submit" type="submit" name="submit" value="QUERO FAZER PARTE!" class="btn-enviar-2">
    			</div>
    		</form>
    	</div>
    </div>
    <div class="fundo-escuro"></div>
    <main style="min-height:40%;">
