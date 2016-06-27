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
    $('#agenda-carossel').scrollbox({
        direction: 'h',
        distance: 480,
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
    setTimeout(next_agenda, 2000, true);
    $('.exibe-agenda').mouseenter(function() {
        parar = true;
    })
    $('.exibe-agenda').mouseleave(function() {
        parar = false;
    })
});

function next_artista() {
    jQuery('#artistas-carossel').trigger('forward');
}

function next_bar() {
    jQuery('#bares-carossel').trigger('forward');
}

var indo_esquerda = false;
var margin_agenda = 0;
var parar = false;
function next_agenda(loop) {
    if(!parar || !loop){
        var dias = jQuery('#agenda-carossel .dia-a').size();
        dias += jQuery('#agenda-carossel .dia-b').size();
        var tamanhoTotal = dias * 240;
        if((Math.abs(margin_agenda) + 720)>=tamanhoTotal || margin_agenda == 0)
            indo_esquerda = !indo_esquerda;
        if(indo_esquerda)
            margin_agenda -= 240;
        else
            margin_agenda += 240;
        jQuery('#agenda-carossel').animate({'margin-left': margin_agenda.toString() + 'px'});
    }
    if(loop)
        setTimeout(next_agenda, 2000, true);
}
