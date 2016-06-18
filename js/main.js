jQuery(function($) {
function new_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map( $el[0], args);
	// add a markers reference
	map.markers = [];
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	// center map
	center_map( map );
	// return
	return map;
}

function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});
	// add to array
	map.markers.push( marker );
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open( map, marker );
		});
    }
}

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

    $(document).ready(function() {
        $(function() {
            $('.banner-principal ul')
                .before('<div id="pag">')
                .cycle({
                    fx: 'fade',
                    pager: '#pag',
                    speed: 700,
                    timeout: 8000
                });
        })
    });
    $('#artistas-carosel').scrollbox({
        direction: 'h',
        distance: 235,
    });
    $('#bares-carossel').scrollbox({
        direction: 'h',
        distance: 235,
    });

    /*  Abre e fecha faça parte  */
    $(".fecha-janela").click(function() {
        $(".faca-parte").removeClass('mostra-janela');
        $(".banda-detalhe").removeClass('mostra-janela');
        $(".fundo-escuro").removeClass('mostra-fundo');
        setTimeout(function() {
            $(
                ".faca-parte,.banda-detalhe,.fundo-escuro"
            ).hide('fast');
        }, 100);
    })

    $(".btn03").click(function() {
        $(".faca-parte").addClass('mostra-janela');
        $(".fundo-escuro").addClass('mostra-fundo');
        setTimeout(function() {
            $(".faca-parte,.fundo-escuro").show('fast');
        }, 500);
    })

    $(".btn-contrate-banda").click(function() {
        $(".quero-show").toggle("fast", function() {});
    });
    $('.tooltip').tooltipster({
        theme: 'tooltipster-borderless'
    });
});

function next_artista() {
    jQuery('.artistas').trigger('forward');
}

function next_bar() {
    jQuery('.bares').trigger('forward');
}
