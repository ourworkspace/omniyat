//$(document).ready(function() {
//		$('a[href*=#]').bind('click', function(e) {
//				e.preventDefault(); // prevent hard jump, the default behavior
//
//				var target = $(this).attr("href"); // Set the target as variable
//
//				// perform animated scrolling by getting top-position of target-element and set it as scroll target
//				$('html, body').stop().animate({
//						scrollTop: $(target).offset().top
//				}, 600, function() {
//						location.hash = target; //attach the hash (#jumptarget) to the pageurl
//				});
//
//				return false;
//		});
//});
//
//$(window).scroll(function() {
//		var scrollDistance = $(window).scrollTop();
//		$('.page-section').each(function(i) {
//				if ($(this).position().top <= scrollDistance) {
//						$('.navigation a.active').removeClass('active');
//						$('.navigation a').eq(i).addClass('active');
//				}
//		});
//}).scroll();






$(document).ready(function () {
    $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#menu-center a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#menu-center ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}