<?php
get_header(); ?>

<div class="l1">

</div>

<div class="l2">
	<div class="alinha">
		<header>
			<h2>Artistas</h2>
			<a href="#" class="exibir-todos">Exibir Todos</a>
		</header>
		<div class="artistas">
			<a href="#" class="plus">+</a>
			<ul>
				<?php $loop = new WP_Query( array( 'post_type' => 'artista', 'posts_per_page' => 4 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php $old = $post; ?>
					<li>
						<div class="artista-img">
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
							foreach( $events as $doctor ):
								echo get_the_post_thumbnail( $doctor->ID );
							endforeach; ?>
							<?php
								$post = $old;  // reset the post from the main loop
                                $id = $old->ID; ?>
						</div>
						<div class="artista-logo">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="artista-data">
							<span> <?php the_title(); ?> </span>
							<a href="#">Local</a>
						</div>
						<a href="#" class="artista-contrate">Contrate</a>
					</li>
				<?php endwhile; wp_reset_query();  ?>
			</ul>
		</div>
	</div>
</div>
<div class="l3">
	<div class="alinha">
		<div class="bares">
			<h3>Bares e casas noturnas</h3>
			<a href="#" class="exibir-todos">Exibir Todos</a>
			<div class="exibe-bares">

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
