jQuery(function($) {
    $(document).ready(function(){
        $(function() {
            $('.banner-principal ul')
            .before('<div id="pag">')
            .cycle({
                fx:    'fade',
                pager: '#pag',
                speed:  700,
                timeout:  8000
            });
        })
    });
});
