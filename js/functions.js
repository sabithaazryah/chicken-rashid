(function () {
    
    "use strict";

    jQuery(document).ready( function( $ ){

        /**********************************************************************
        * Login Ajax
        **********************************************************************/
        $('#opallostpasswordform').hide();
        $('#modalLoginForm form .btn-cancel').on('click', function(){  
            $('#modalLoginForm').modal( 'hide' ); 
            $('#modalLoginForm .alert').remove();
        } );

        // sign in proccess
        $('form.login-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: burgerslapAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxlogin"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-warning">'+data.message+'</div>' );
                    }
                });
                return false; 
         } );


        $('form#opalrgtRegisterForm').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: burgerslapAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxregister"
                }).done(function(data) {
                    if ( data.status == 1 ) {
                        $this.prepend( '<div class="alert alert-info">'+data.msg+'</div>' );
                        location.reload();
                    } else {
                        $this.prepend( '<div class="alert alert-warning">'+data.msg+'</div>' );
                    }
                });
                return false;
        } );


        $('form .toggle-links').on('click', function(){
            $('.form-wrapper').hide();
            $($(this).attr('href')).show(); 
            return false;
        } );

         // sign in proccess
        $('form.lostpassword-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: burgerslapAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=opalajaxlostpass"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-warning">'+data.message+'</div>' );
                    }
                });
                return false; 
        } );


        //fix map
        if( $('.wpb_map_wraper').length > 0 ){
            $('.wpb_map_wraper').on('click', function () {
                $('.wpb_map_wraper iframe').css("pointer-events", "auto");
            });

            $( ".wpb_map_wraper" ).mouseleave(function() {
              $('.wpb_map_wraper iframe').css("pointer-events", "none"); 
            });
        }
        
        /**
         * Scroll To Top
         */
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        }); 

        jQuery('.scrollup').on('click', function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        //Offcanvas Menu

        $('[data-toggle="offcanvas"], .btn-offcanvas').on('click', function () { 
            $('.row-offcanvas').toggleClass('active')           
        });

        //mobile click
        $('#main-menu-offcanvas .caret').on('click', function () {
            if( jQuery(this).parent().children().hasClass('show') ){
                jQuery(this).parent().children().removeClass('show');
            }else
                jQuery(this).parent().children().addClass('show');
        });

        $('.showright').on('click', function(){
             $('.offcanvas-showright').toggleClass('active');   
        } );

        //Gallery photo
        $("a[rel^='prettyPhoto[pp_gal]']").prettyPhoto({
            animation_speed:'normal',
            theme:'light_square',
            social_tools: false,
        });

        //Gallery photo
        $("a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed:'normal',
            theme:'light_square',
            social_tools: false,
        });


        //video popup
        $("a[rel^='prettyPhoto[video]']").prettyPhoto({
            animation_speed:'normal',
            theme:'light_square',
            social_tools: false,
            default_width: 800, //I have tried playing with these values
            default_height: 500, //I have tried playing with these values
        });
        //char-report js
        if( $('.list-label-chart li').length > 0 ){
            var id = $('.list-label-chart ul').data('id');
            var data = [];
            $('.list-label-chart li').each( function(){
                data.push({
                    title: $(this).data('title'),
                    value: $(this).data('value'),   
                    color: $(this).data('color'),
                });
            });
            $("#kc-give-chart-holder"+id).drawDoughnutChart(data);
        }
            
            
        /*---------------------------------------------- 
         *    Apply Filter        
         *----------------------------------------------*/
        jQuery('.isotope-filter li a').click(function(){
           
            var parentul = jQuery(this).parents('ul.isotope-filter').data('related-grid');
            jQuery(this).parents('ul.isotope-filter').find('li a').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-option-value');  
            jQuery('#'+parentul).isotope({ filter: selector }, function(){ });
            
            return(false);
        });


        $( '.portfolio_filter a' ).click( function() {
            var id =  $(this).data('id');
            $('.portfolio-all'+id).hide();
            $( '.'+$(this).data('target') ).show();
        } );

        /**
         *
         */
        $(".dropdown-toggle-overlay").on('click', function(){ 
               $($(this).data( 'target' )).addClass("active"); 
        } ); 

         $(".dropdown-toggle-button").on('click', function(){ 
               $($(this).data( 'target' )).removeClass("active"); 
               return false;
        } ); 
 
	    /** 
         * 
         * Automatic apply  OWL carousel
         */
        $(".owl-carousel-play .owl-carousel").each( function(){
            var config = {
                navigation: $(this).data('navigation'), // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                pagination: $(this).data('pagination'),
                autoHeight: false,
            };

            var owl = $(this);
            if( $(this).data('slide') == 1 ){
                config.singleItem = true;
            }else {
                config.items = $(this).data( 'slide' );
            }
            if ($(this).data('desktop')) {
                config.itemsDesktop = $(this).data('desktop');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsDesktopSmall = $(this).data('desktopsmall');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsTablet = $(this).data('tablet');
            }
            if ($(this).data('tabletsmall')) {
                config.itemsTabletSmall = $(this).data('tabletsmall');
            }
            if ($(this).data('mobile')) {
                config.itemsMobile = $(this).data('mobile');
            }
            $(this).owlCarousel( config );
             if( $(this).data('jumpto') ){
                owl.trigger('owl.jumpTo', $(this).data('jumpto') )
            }
            $('.left',$(this).parent()).on('click', function(){
                  owl.trigger('owl.prev');
                  return false; 
            });
            $('.right',$(this).parent()).on('click', function(){
                owl.trigger('owl.next');
                return false; 
            });
         } ); 

            /**
             *
             */
            if( $('.page-static-left') ){
                $('.page-static-left .button-action').on('click', function(){
                    $('.page-static-left').toggleClass('active');
                } );
            }
            
            // menu home 3
            $('.menu-button').on( 'click', function(){
                $(this).toggleClass('menu-close');
                $('.wrapper').toggleClass('active');
            });

        /*---------------------------------------------- 
         * Set Time picker 
        *----------------------------------------------*/ 
        $('.time_picker').each(function(){
            $(this).datetimepicker({
                datepicker:false,
                format:'H:i'
            });
        });

        //Google map

        var opalMap = $( '.opal-kc-google-maps' );
        for ( var i = 0; i < opalMap.length; i++ ) {
            var mapElement = $( opalMap[i] );
            opal_kc_render_map( opalMap[i], mapElement.data() );
        }
        
    } );    
} )( jQuery );

function opal_kc_render_map( ele, options ) {
    var defaults = {
        // How zoomed in you want the map to start at (always required)
        zoom: 11,
        scrollwheel: false,

        // The latitude and longitude to center the map (always required)
        // center: new google.maps.LatLng(code), // New York

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
         styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"saturation":"-100"},{"color":"#ef9797"}]},{"featureType":"administrative","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"saturation":"-100"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e5e5e5"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"off"},{"color":"#c0e8e8"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"},{"weight":"0.50"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels.text.fill","stylers":[{"lightness":"100"},{"weight":"1.41"},{"saturation":"-100"}]},{"featureType":"transit.station.airport","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"29"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"lightness":"48"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"lightness":"84"},{"color":"#e7e7e7"}]}]
    };
    options = jQuery.extend( {}, defaults, options );

    options.center = new google.maps.LatLng( parseFloat( options.lat ), parseFloat( options.lng ) );
    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(ele, options);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
        position: options.center,
        map: map,
    });
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}