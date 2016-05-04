jQuery(function($) {
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

    $('.artistas').scrollbox({
        direction: 'h',
        distance: 235,
    });
    $('.bares').scrollbox({
        direction: 'h',
        distance: 235,
    });
    $(".btn-contrate-banda").click(function() {
        $(".quero-show").toggle("fast", function() {});
    });
    $('#open-artista').nicemodal({
        width: '900px'
    });
});

function next_artista() {
    jQuery('.artistas').trigger('forward');
}

function next_bar() {
    jQuery('.bares').trigger('forward');
}
