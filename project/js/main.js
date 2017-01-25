var placeSearch, autocomplete;
var componentForm = {
    locality: 'InscripcionesProyectos_ciudad',
    administrative_area_level_1: 'InscripcionesProyectos_departamento',
    administrative_area_level_2: 'InscripcionesProyectos_ciudad',
    country: 'InscripcionesProyectos_pais'
};

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('location__autocomplete')),
        {types: ['geocode']}
    );

    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(componentForm[component]).value = '';
    }

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i]['long_name'];
            document.getElementById(componentForm[addressType]).value = val;
        }
    }
}
jQuery(document).ready(function ($) {

    // MENU RESPONSIVE

        // BOTTOM
    var trigger = $('#hamburger'),
        isClosed = true;

    trigger.click(function () {
      burgerTime();
    });

    function burgerTime() {
      if (isClosed == false) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = true;
        $('.menu').removeClass('active-menu');
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = false;
        $('.menu').addClass('active-menu');
      }
    }

    // SVG
     $('.to-svg').each(function(index, el) {
    if (!$(this).is('[id]')) {
    var idSvg = 'img-toSvg'+ index;
    $(this).attr('id', idSvg);}
        $.imgToSvg($(this));
    });

     // Resizing 

      $('.js-resizing').each(function(index, el) {
        $.resizing($(this));
    });

    // SLIDES
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 8000,
        margin: 15,
        loop: true,
        autoWidth: true,
        items: 3,
        responsiveClass: true
      });

    // SLIDE Index//

    var slideWidth = ($('#slider > section').length);
    var slider = $('#slider');
    slider.css({
        width: slideWidth * 100 + '%',
    });
    var next = $('#btn-next');
    var prev = $('#btn-prev');

    $('#slider section:last').insertBefore('#slider section:first');

    slider.css({
        marginLeft: -100 + '%'
        });

    function moveright() {
        slider.animate({
            marginLeft: -200 + '%'},
            500 , function() {
                $('#slider section:first').insertAfter('#slider section:last');
            slider.css({
               marginLeft: -100 + '%'
            });
        });
    }

    function moveleft() {
        slider.animate({
            marginLeft: 0 + '%'},
            500 , function() {
                $('#slider section:last').insertBefore('#slider section:first');
            slider.css({
               marginLeft: -100 + '%'
            });
        });
    }

    next.on('click', function(){
        moveright();
    })
    prev.on('click', function(){
        moveleft();
    })

    function autoplay(){
        interval = setInterval(function(){
            moveright();
        }, 6000);
    }

    autoplay();

    // team selection
    $('#team_1').on('click', function(event) {
        $('#profile-1').addClass('active');
    });


    $(".fancybox-thumb").fancybox({
      prevEffect  : 'none',
      nextEffect  : 'none',
      padding : 2,
      helpers : {
        title : {
          type: 'outside'
        },
        thumbs  : {
          width : 50,
          height  : 50
        }
      }
  });
    $('.fancybox-media').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        padding : 4,
        helpers : {
            media : {}
        }
    });
////////////////////////////////
    // VIDEO //
//////////////////////////////////
scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });
////////////////////////////////
    //VIDEO//
////////////////////////////////


    if($('#InscripcionesProyectos_integrantes').length){
        $('#InscripcionesProyectos_integrantes').on('change', function(event) {
            event.preventDefault();
            $.adminFormsIntegrante();
        });

        $('#form__inscription').on('submit', function(event) {
            event.preventDefault();

            $.sendInscription();
        });
    }
    $('input[for]').each(function(index, el) {
        $(this).on('focus', function(event) {
            event.preventDefault();
            $($(this).attr('for')).focus();
        });
    });
});

//
// Resizing //
//

$.resizing = function(element){
    $(window).resize(function() {
        var width = element.outerWidth();
        element.css({
            "height": width * eval(element.attr('data-resizing'))
        });
        if(element.hasClass('panel')){
            element.parent().find('.panel').css({
                "height": width * eval(element.attr('data-resizing'))
            });
        }
    }).resize();
}

//
// Convert to SVG //
//
$.imgToSvg = function(image){
    var $img = image;
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function(data) {
        var $svg = jQuery(data).find('svg');
        if(typeof imgID !== 'undefined') {
           $svg.attr('id', imgID);
        }
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        $svg = $svg.removeAttr('xmlns:a');
        $img.replaceWith($svg);

        if($img.hasClass('svg-slide'))
            $.createAnimationSvg($svg);

        if($img.attr('id') == 'svg__team')
            $.createFunciontTeamSvg($svg);


    }, 'xml');
}

  // Grid Pinteres Galeria
var grids = $('.image');

var cont = 0;
grids.each(function(){
    var contenedor = $(this).parents('.grid-item');
    contenedor.css({
    width: $(this).width(),
    height: $(this).height()
    });
    cont++;
    if(cont >= (grids.length - 1)){
    $('.grid-pinteres').masonry({
        itemSelector: '.grid-item',
        columnWidth: 125
    });
    }
});

// FUNCTIONS VIDEO //
//////////////////////
function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}
// FUNCTIONS VIDEO //
//////////////////////

// --SERGIO--
//SVG QUIENES SOMOS 
$.createFunciontTeamSvg = function(){
    if($('#svg__team').length > 0){
        var profiles = $('#items__team').find('.profile');
        var svgItems = $('#svg__team').find('.item__element');
        $.each(profiles, function(index, val) {
            $(this).attr('id', ('team__item-'+index));
        });
        $.each(svgItems, function(index, val) {
            var svgItem = $(this);
            if(index < profiles.length){
                $.each(profiles, function(i, value) {
                    if(index == i){
                        svgItem.attr('data-profile', $(this).attr('id'));
                        if(index == 0){
                            $.setProfileActive(svgItem);
                        }
                        svgItem.on('click', function(event) {
                            event.preventDefault();
                            $.setProfileActive(svgItem);
                        });
                    }
                });
            }
        });
    }
}
$.setProfileActive = function(item){
    var profiles = $('#items__team').find('.profile');
    var profile = $('#'+item.attr('data-profile'));
    profiles.removeClass('active');
    profile.addClass('active');

    var moveLeftArrow = item.position().left - $('#items__svg').offset().left;

    $('#items__team .before').css('left', (moveLeftArrow + 20));
}

//FORM INSCRIPCIONES
$.adminFormsIntegrante = function(){
    var integrantes = $('#InscripcionesProyectos_integrantes');
    if(integrantes.val() == '' || integrantes.val() < 1)
        integrantes.val(1);

    var forms = $('.form__ins__integrantes');
    if(forms.length < integrantes.val()){
        var more = integrantes.val() - forms.length;
        for(i = 0; i < more; i++){
            var formRef = $('.form__reference').clone();
            formRef.removeClass('form__reference');
            formRef.find('input').val('');
            formRef.find('label span').text(forms.length + 1);
            forms.last().after(formRef);
            forms = $('.form__ins__integrantes');
        }
    }
    else if(forms.length > integrantes.val()){
        while(forms.length > integrantes.val()){
            forms.last().remove();
            forms = $('.form__ins__integrantes');
        }
    }
}
$.sendInscription = function(){
    var form = $('#form__inscription');
    $('#pop_background').fadeIn();

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        dataType: 'json',
        data: form.serialize(),
    })
    .done(function(data) {
        if(data.status)
            $.showPopUp();
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        $('#pop_background').fadeOut();
    });
    
}


//POPUP
$.showPopUp = function(){
    $('#pop_background').fadeIn();
    $('#pop_inscription').fadeIn();
}
$.hiddenPopUp = function(){
    $('#pop_background').fadeOut();
    $('#pop_inscription').fadeOut();
}