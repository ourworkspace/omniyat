$(document).ready(function(){
	var s = skrollr.init({
		constants: {
			p1bannersectionheight: $(".section1").height(),
			p1logobgsectionheight: $(".section2").height(),
			p1logoandtextsection: $(".section2").height() + $(".section3").height(),
			p1projectplacesdatasection: $(".section2").height() + $(".section3").height() + $(".section5").height(),
			p1projecttransparentdatasection: $(".section2").height() + $(".section3").height() + $(".section5").height() + $(".section6").height()
		}
	});
});
