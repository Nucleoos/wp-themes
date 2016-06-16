<?php get_header(); ?>

<div class="l1">
	<div class="banner-secundario">
		<ul>
			<li>
				<div class="foto-banda">
					<img src="<?php echo get_option('showbook_theme_image_banner_casas') ?>" />
				</div>
				<div class="tarja-laranja"></div>
				<div class="alinha">
					<div class="logo-banda">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>


<?php
$alltags = get_terms('regiao');
if ($alltags){
  foreach( $alltags as $tag ) {
    $args=array(
      'post_type' => 'tribe_venue',
      'post_status' => 'publish',
      'showposts' => -1,
	  'tax_query' => array(
	        array(
	            'taxonomy' => 'regiao', //or tag or custom taxonomy
	            'field' => 'id',
	            'terms' => array($tag->term_id)
	        )
	   )
    );
	?>
<div class="l3" style="background-color:white; padding-bottom:80px; height:auto;">
	<div class="alinha">
		<header class="regiao">
			<img src="<?php echo get_template_directory_uri(). '/img/regiao-img.png' ?>" alt="">
			<h2><?php echo $tag->name ?></h2>
		</header>
		<?php
			$contador = 0;
			$my_query = null;
		    $my_query = new WP_Query($args);
		    if( $my_query->have_posts() ) {
		         while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<?php if($contador == 0) { ?>
		<div class="bares">
			<ul> <?php } ?>
				<li>
					<div class="bar-logo">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="bar-img">
						<?php echo wp_get_attachment_image(get_field('secondary_image'), 'events-thumbnail'); ?>
					</div>
					<div class="bar-shows">
						<a href="/local?slug=<?php echo basename(get_permalink()); ?>">
							<span>pr&oacute;ximos shows</span>
						</a>
						<a class="tooltip maps" title="<?php echo get_field('_VenueCity').' - '.get_field('_VenueState') ; ?>" href="#"></a>
					</div>
					<label><?php echo $contador; ?></label>
				</li>
			<?php if($contador == 3) {  $contador = -1; ?>
			</ul>
		</div>
		<?php }
			$contador++;
			endwhile;
 			if($contador != 0) {?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>
       <?php
    }
  }
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>


<?php get_footer(); ?>
