//    Adds data-lightbox attribute for each link in the gallery, as required by lightbox plugin
//    data-lightbox attr is set to unique gallery id

(function($) {
	
	$('.gallery').each(function() {
        $name = $(this).attr('id');
        console.log($name);
        $(this).find('a').attr('data-lightbox',$name);
    });
	
})( jQuery );