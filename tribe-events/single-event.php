<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function tribe_get_location_evento( $postId = null ) {
	$postId = tribe_get_venue_id( $postId );
	$output = tribe_get_event_meta( $postId, 'local_evento', true );
	return apply_filters( 'tribe_get_location_evento', $output );
}


$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

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


<div class="l3" style="background-color:white; padding-bottom:20px; height:auto;">
	<div class="alinha evento">
		<?php tribe_the_notices() ?>

		<div class="header-evento">
			<div class="data">
				<?php $data_evento = get_field('_EventStartDate'); ?>
				<img src="<?php echo get_template_directory_uri(). '/img/btn-evento-calendario.png' ?>" />
				<label class="hora"><?php echo date_i18n('H\H', strtotime($data_evento )) ?></label><br/>
				<label class="dia"><?php echo date_i18n('d', strtotime($data_evento )) ?></label><br/>
				<label class="semana"><?php echo date_i18n('l', strtotime($data_evento )) ?></label>
			</div>
			<div class="detalhes">
				<h1><?php the_title(); ?></h1>
				<h2><?php echo tribe_get_venue().' | '.tribe_get_city().', '.tribe_get_stateprovince(); ?></h2>
				<div class="mapa">
					<?php
					$venue_id = get_field('_EventVenueID');
					$location = tribe_get_location_evento(get_the_ID());
						if( ! empty($location) ): ?>
							<div id="map" style="width: 100%; height: 74px;"></div>
							<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

							<script type="text/javascript">
							  //<![CDATA[
								var marker;
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
								marker = new google.maps.Marker({
								position: map.getCenter(),
								map: map
							   });
							}
							// call the function
							   load();
								//google.maps.event.addListener(marker, 'click', function() {
								//	alert(marker.map);
							//		window.open(marker.url);
						//			});
							//]]>
							</script>
						<?php  endif; ?>
				</div>
				<div class="botoes">
					<a target="_blank" href="" class="facebook">Oficial</a>
					<a href="#" class="participe">Participar</a>
					<span style="text-align:right;float:right;font-style:italic;">
					 <?php echo tribe_get_address().' / '.tribe_get_phone() ?><br />
						<?php the_excerpt(); ?>
					</span>
				</div>
			</div>

		<div>
		<div class="imagem-evento">
			<img src="<?php echo get_field('banner_secundario'); ?>" alt="Imagem do evento" />
		</div>
		<div class="conteudo-evento">
			<?php the_content(); ?>
		</div>

	</div><!-- #tribe-events-content -->
	</div>
</div>
