<?php get_header(); ?>


<div class="l1">
	<div class="artista-banner">
		<ul>
			<li>
				<img src="<?php echo get_option('showbook_theme_image_banner_artistas') ?>" />
			</li>
		</ul>
	</div>
</div>

<?php
$alltags = get_terms('post_tag');
if ($alltags){
  foreach( $alltags as $tag ) {
    $args=array(
      'tag__in' => array($tag->term_id),
      'post_type' => 'artista',
      'post_status' => 'publish',
      'showposts' => -1,
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>

<div class="l2">
	<div class="alinha">
		<header>
			<h2><?php echo $tag->name ?></h2>
		</header>
		<div class="artistas">
			<ul>
				<?php $loop = new WP_Query( array( 'post_type' => 'artista', 'posts_per_page' => 30 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php $old = $post; $data_evento=null; ?>
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
							foreach( $events as $event ):
								$data_evento = get_field('_EventStartDate', $event->ID);
								echo get_the_post_thumbnail($event->ID );
							endforeach; ?>
							<?php
								$post = $old;  // reset the post from the main loop
                                $id = $old->ID; ?>
						</div>
						<div class="artista-logo">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="artista-data">
							<?php if(!is_null($data_evento)) { ?>
								<span> <?php echo date_i18n('d.F /H\H', strtotime($data_evento )) ?> </span>
							<?php } else { ?>
								<span>Sem show</span>
							<?php } ?>
							<a href="#">Local</a>
						</div>
						<a href="<?php the_permalink(); ?>" class="artista-contrate">Contrate</a>
					</li>
				<?php endwhile; wp_reset_query();  ?>
			</ul>
		</div>
	</div>
</div>

       <?php
      endwhile;
    }
  }
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>

<?php get_footer(); ?>
