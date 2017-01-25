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

   //POPUP
   $('#myPopup').click(function(){
        $('#pop_background').fadeIn();
        $('#pop_inscription').fadeIn();
        return false;
    });
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
    console.log(slideWidth);
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