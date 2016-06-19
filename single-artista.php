<?php get_header(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		FB.api(
		    "/366192290123608/photos",
		    function (response) {
		      if (response && !response.error) {
		        alert(response)
		      }
		    }
		);
	});
</script>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="l1">
		<div class="artista-banner">
			<ul>
				<li>
					<?php echo wp_get_attachment_image(get_field('banner_principal'), 'full'); ?>
				</li>
			</ul>
		</div>
	</div>

	<div class="l2">
		<div class="alinha">
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
			<div class="artista">
				<div class="artista-logo">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="artista-conteudo">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="artista">
				<div class="artista-video">
					<div class="video-principal">
						<a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-principal.jpg' ?>" alt=""></a>
					</div>
					<ul>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a href="#"><img src="<?php echo get_template_directory_uri(). '/img/artistas/tmp/video-tmp.jpg' ?>" alt=""></a></li>
						<li><a target="_blank" href="<?php echo get_field('url_album_facebook'); ?>" title="Mais V&iacute;deos"><img src="<?php echo get_template_directory_uri(). '/img/mais-videos.png' ?>" alt=""></a></li>
					</ul>
				</div>
				<div class="artista-botoes">
					<a target="_blank" href="<?php echo get_field('url_facebook'); ?>" class="btn01">Oficial</a>
					<div class="btn02">
						<a target="_blank" href="<?php echo get_field('release_tecnico'); ?>">Release</a>
						<a target="_blank" href="<?php echo wp_get_attachment_url( get_field('rider_tecnico') ); ?>">Rider T&eacute;cnico</a>
					</div>
					<div class="btn03">
						<?php $old = $post; $data_evento=null; ?>
						<?php
						$events = get_posts(array(
							'post_type' => 'tribe_events',
							'meta_query' => array(
								array(
									'key' => 'artistas', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));
						foreach( $events as $event ):
							$data_evento = get_field('_EventStartDate', $event->ID);
							$id_evento = $event->ID;
						endforeach; ?>
						<?php
							$post = $old;  // reset the post from the main loop
							$id = $old->ID;
							if(!is_null($data_evento)) { ?>
								<a href="<?php echo get_the_permalink($id_evento); ?>">
									<span> <?php echo date_i18n('d.F /H\H', strtotime($data_evento )) ?> </span>
								</a>
							<?php } else { ?>
								<span>SEM SHOW</span>
							<?php } ?>
						<a class="map" href="#">Local</a>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
