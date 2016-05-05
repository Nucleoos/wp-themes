<?php get_header(); ?>

<div class="l1">
	<div class="banner-principal">
		<ul>
			<li>
				<div class="foto-banda">
					<img src="<?php echo get_template_directory_uri(). '/img/banner/banda01/foto.jpg' ?>" alt="">
				</div>
				<div class="tarja-laranja"></div>
			</li>
			<li>
				<div class="foto-banda">
					<img src="<?php echo get_template_directory_uri(). '/img/banner/banda02/foto.jpg' ?>" alt="">
				</div>
				<div class="tarja-laranja"></div>
			</li>
		</ul>
	</div>
</div>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="l2" style="min-height:62em;">
		<div class="alinha">
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
				</header>
				<div class="banda-foto">
					<?php echo wp_get_attachment_image(get_field('banner_principal'), 'full'); ?>
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
		</div>
	</div>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
