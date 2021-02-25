$(document).ready(function () {
    $(document.body).fadeIn(600).removeClass('hidden');
});

$(function() {

    if(Modernizr.history){

    var newHash      = "",
        $pageWrap    = $("[class^=page-container]"),
        baseHeight   = 0,
        $el;

    
    $("nav").delegate("a", "click", function() {
        _link = $(this).attr("href");
        history.pushState(null, null, _link);
        loadContent(_link);

        $("#nav a").removeClass("active");
        var linkPath=$(this).attr("href");
        var relativePath=window.location.href;

        if(relativePath.includes(linkPath))
            $(this).addClass("active");
        return false;
    });

    $(function(){
		$pageWrap.each(function(){
            $('#head').insertBefore($pageWrap)
		})
    })
      
    function loadContent(href){
				$pageWrap
                .find(' [id^=bloc-]')
                .fadeOut(600, function() {
                    $pageWrap.hide().load(href + ' [id^=bloc]' , function() {
                        $pageWrap.fadeIn(600, function() {
                        });
                        $.getScript( "/js/blocsaddons-markdown.js")
                        $.getScript( "/js/universal-parallax.min.js")
                        $.getScript( "/js/scrollFX.js")
                        $.getScript( "/js/js/baguetteBox.min.js")
                        $.getScript( "/js/blocs.min.js")
                        $.getScript( "/js/bootstrap.bundle.min.js")
                        $.getScript( "/js/macy.js")
                    });
                });
    }
    
    $(window).on('load', function(){
        setTimeout(removeLoader, 1000);
      });
      function removeLoader(){
          $( '.page-preloader' ).fadeOut(500, function() {
            $( '.page-preloader' ).remove(); 
        });  
        
      }

    $(window).bind('popstate', function(){
       _link = location.pathname.replace(/^.*[\\\/]/, '');
       loadContent(_link);
    });

}
    
});

$(document).ready(function () {
        $("#nav a").each(function(){
            $(this).removeClass("active");
            var linkPath=$(this).attr("href");
            var relativePath=window.location.href;

            if(relativePath.includes(linkPath))
                $(this).addClass("active");
        });
});

$(document).ready(function () {
$.getScript( "/js/blocsaddons-markdown.js");
});

