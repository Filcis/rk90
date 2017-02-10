(function($) {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
        if( scroll === 0){
        $('html, body').animate({
        scrollTop: $("#content").offset().top
    }, 500);
        }
    });
})(jQuery);

