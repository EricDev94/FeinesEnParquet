var top_menu_height = 0;


jQuery(function($) {
		$(window).load( function() {
			$('.external-link').unbind('click');


		});

        $(document).ready( function() {

					/**
					* funció per carregar la traducció
					*
					*
					*/


					initLenguaje(function(){
						console.log("idioma cargado!");
					});



        top_menu_height = $('.top-menu').height();



        // funció que fa scroll a dalt de tot de la web
        $('#btn-back-to-top').click(function(e){
            e.preventDefault();
            scrollTo('#top');
        });

        // funció que fa el scroll a cualsevol opció que triem del menú
        $('.top-menu .navbar-nav a').click(function(e){
            e.preventDefault();
            var linkId = $(this).attr('href');
            scrollTo(linkId);
            if($('.navbar-toggle').is(":visible") == true){
                $('.navbar-collapse').collapse('toggle');
            }
            $(this).blur();
            return false;
        });





    });
});


// animació del scroll quant puja o baixa
function scrollTo(selectors)
{

    if(!$(selectors).size()) return;
    var selector_top = $(selectors).offset().top - top_menu_height;
    $('html,body').animate({ scrollTop: selector_top }, 'slow');

}
