<?php get_header(); ?>

<?php $slug_local = get_query_var( 'slug', '' );
    $args=array(
      'post_type' => 'tribe_venue',
      'post_status' => 'publish',
      'showposts' => -1,
	  'name' => $slug_local,
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>

	<div class="l1">
		<div class="banner-secundario">
			<ul>
				<li>
					<div class="foto-banda">
						<?php echo wp_get_attachment_image(get_field('banner_principal'), 'full'); ?>
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

	<div class="l3" style="background-color:white; padding-bottom:80px; padding-top:40px;height:auto;">
		<div class="alinha">
			<header class="local">
				<img src="<?php echo get_template_directory_uri(). '/img/btn-casas-drink.png' ?>" alt="">
				<h2><?php the_title(); ?></h2>
				<h4><?php echo get_field('_VenueCity').', '.get_field('_VenueState'); ?></h4>
			</header>
			<div class="casas">
				<div class="local-conteudo">
					<?php the_content(); ?>
					<div class="artista-botoes" style="float:left;">
						<a target="_blank" href="<?php echo get_field('url_facebook'); ?>" class="btn01" style="width:8em;">Oficial</a>
					</div>
					<div class="local-endereco">
						<label><?php echo get_field('_VenueAddress').' / '.get_field('_VenuePhone'); ?></label>
						<label><?php echo get_field('_VenueCity').','.get_field('_VenueState'); ?></label></br>
						<label>Aberto das 18:00 as 02:00 / Faixa de preço: $$$</label>
					</div>
				</div>
				<div class="local-mapa">
					<div>
					<?php
					$location = get_field('local_evento');
					if( ! empty($location) ):
					?>
					<div id="map" style="width: 100%; height: 250px;"></div>
					<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

					<script type="text/javascript">
					  //<![CDATA[
						function load() {
						var lat = <?php echo $location['lat']; ?>;
						var lng = <?php echo $location['lng']; ?>;
					// coordinates to latLng
						var latlng = new google.maps.LatLng(lat, lng);
					// map Options
						var myOptions = {
						zoom: 14,
						center: latlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					   };
					//draw a map
						var map = new google.maps.Map(document.getElementById("map"), myOptions);
						var marker = new google.maps.Marker({
						position: map.getCenter(),
						map: map
					   });
					}
					// call the function
					   load();
					//]]>
					</script>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="l3" style="background-color:#4f4f4f; padding-bottom:80px; padding-top:40px;">
		<div class="alinha">
			<header class="local">
				<img src="<?php echo get_template_directory_uri(). '/img/btn-agenda.png' ?>" alt="">
			</header>
		</div>
	</div>


<?php endwhile;
} ?>

<?php get_footer(); ?>
