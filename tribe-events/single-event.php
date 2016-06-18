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
				<img src="<?php echo get_template_directory_uri(). '/img/btn-evento-calendario.png' ?>" />
				<label class="hora">20H</label><br/>
				<label class="dia">01</label><br/>
				<label class="semana">Quarta-Feira</label>
			</div>
			<div class="detalhes">
				<h1><?php the_title(); ?></h1>
				<h2>Vila Seu Justino | São Paulo, SP</h2>
				<div class="mapa">
					oi
				</div>
				<div class="botoes">
					<a target="_blank" href="" class="facebook">Oficial</a>
					<a href="#" class="participe">Participar</a>
					<span style="text-align:right;float:right;font-style:italic;">
						Rua Harmonia, 77, Vila Madalena / (11) 3245-0000<br />
						Aberto das 18:00 ás 02:00 / Faixa de preços: $$$
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
