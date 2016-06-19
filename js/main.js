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
    $('#artistas-carossel').scrollbox({
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

    $("#btn-faca-parte-menu").click(function() {
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
