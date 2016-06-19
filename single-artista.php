<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
	$album_id = get_field('facebook_album_id');
	$playlist_id = get_field('youtube_playlist_id');
	if(isset($album_id) && trim($album_id)!=='') {
 ?>

<?php
	$url = 'https://graph.facebook.com/v2.6/oauth/access_token?client_id=1630530173930954&client_secret=90f2d7807ef949002bac93107842991b&grant_type=client_credentials';
	$json = file_get_contents($url);
	$obj = json_decode($json);
	$token = $obj->access_token;
 ?>

<script>
  window.fbAsyncInit = function() {
	FB.init({
	  appId      : '1630530173930954',
	  xfbml      : true,
	  version    : 'v2.6'
	});

	FB.api(
	    "/<?php echo $album_id; ?>/photos",
		"get",
		{'access_token': '<?php echo $token ?>', 'limit': 9},
	    function (response) {
	      if (response && !response.error) {
			var contador = 0;
	        for(var x in response.data){
				var photo = response.data[x];
				FB.api(
				    "/" + photo.id,
					'get',
					{'access_token': '<?php echo $token ?>', 'fields': 'link,picture,images'},
				    function (response) {
				      if (response && !response.error) {
						var li = document.createElement('li');
						li.innerHTML = '<a target="_blank" href="' + response.link + '"><img src="' + response.picture + '" alt=""></a>';
						document.getElementById('videos-fotos').appendChild(li);
						if(contador == 0){
							for(var i in  response.images){
								var imagem = response.images[i];
								if(imagem.height > 300){
									var li = document.createElement('a');
									li.href = response.link;
									li.target = '_blank';
									li.innerHTML = '<img src="' + imagem.source + '" alt="">'
									document.getElementById('video-foto-principal').appendChild(li);
									break;
								}
							}
						}
						contador++;
				      }
				    }
				);
			}
	      }
	    }
	);
  };

  (function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "//connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php }
if(isset($playlist_id) && trim($playlist_id)!=='') {
?>
    <script>
        function onGoogleLoad() {
            gapi.client.setApiKey('AIzaSyAUA2WnCbkxbaqd-mD-ejsmGbBZUfTYn-c');
            gapi.client.load('youtube', 'v3', function() {

                var request = gapi.client.youtube.playlistItems.list({
                    part: 'snippet',
                    playlistId: '<?php echo $playlist_id ?>',
                    maxResults: 9
                });

                request.execute(function(response) {
                    for (var i = 0; i < response.items.length; i++) {
						var video = response.items[i];

						var li = document.createElement('li');
						var youtubeLink = 'https://www.youtube.com/watch?v=' + video.snippet.resourceId.videoId;
						li.innerHTML = '<a target="_blank" href="' + youtubeLink + '"><img src="' + video.snippet.thumbnails.default.url + '" alt=""></a>';
						document.getElementById('videos-fotos').appendChild(li);

						if(i==0){
							var li = document.createElement('a');
							li.href = youtubeLink;
							li.target = '_blank';
							li.innerHTML = '<img src="' + video.snippet.thumbnails.high.url + '" alt="">'
							document.getElementById('video-foto-principal').appendChild(li);
						}
                    }
                });
            });
        }
    </script>
    <script src="https://apis.google.com/js/client.js?onload=onGoogleLoad"></script>
<?php } ?>

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
					<div id="video-foto-principal" class="video-principal">
					</div>
					<ul id="videos-fotos">
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
