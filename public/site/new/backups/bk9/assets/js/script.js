	function loadVariables() {
		p1bannersectionheight_v = $(".section1").height();
		p1logobgsectionheight_v = $(window).height();	/* $(".section2").height(); */
		p1logoandtextsection_v = p1logobgsectionheight_v + $(".section3").height();
		p1projectplacesdatasection_v = p1logoandtextsection_v + $(".section5").height();
		p1projecttransparentdatasectionprojectanimationdone_part_v = p1projectplacesdatasection_v + $(".section6").height();
			p1projecttransparentdatasectionprojectanimationdone_v = p1projecttransparentdatasectionprojectanimationdone_part_v - $(".section6").height()/3;
			p1projecttransparentdatasectionprojectdatadisplayclear_v = p1projecttransparentdatasectionprojectanimationdone_part_v;
			p1projecttransparentdatasectionzoomingtransparentimageend_v = p1projecttransparentdatasectionprojectanimationdone_part_v + $(".section6").height()/3;
		
		p2bannersectionzoomend_v = p1projecttransparentdatasectionprojectanimationdone_part_v + $(".section6").height()/3 + $(".section7").height() + $(".section7").height()/2;
		p2bannersectionshowtextend_v = p2bannersectionzoomend_v + $(window).height()/2;
		p2logobgsectionend_v = p2bannersectionshowtextend_v + $(window).height()/2 + $(window).height();	/* $(".section8").height() */
		p2bannerhidetransitionstartposition_v = p2bannersectionshowtextend_v + $(window).height() + $(window).height() + $(window).height();
		p2logobgsectionhideposition_v = p2bannerhidetransitionstartposition_v + $(window).height() + $(window).height();	/* $(".section8").height() + $(".section8").height() */
		p2logoandtextsectionend_v = p2logobgsectionhideposition_v + $(".section9").height() + $(".section10").height() + $(window).height();
		p2logoandtextsectionscreenwaitingtimeend_v = p2logoandtextsectionend_v + $(window).height();
		p2projectplacesdatasectionbuildingimagezoominend_v = p2logoandtextsectionscreenwaitingtimeend_v + $(window).height() *2;
		p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v = p2projectplacesdatasectionbuildingimagezoominend_v + $(window).height() + $(window).height();
		p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v = p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v + $(window).height() * 2;
		p2projecttransparantimagebuildingdatasectionendopacitytransitionposition_v = p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v + $(window).height();
		p2projecttransparantimagebuildingdatasectionendzoomintransitionposition_v = p2projecttransparantimagebuildingdatasectionendopacitytransitionposition_v + $(window).height();
		p2projecttransparentimagesectionstaticstillend_part_v = p2projecttransparantimagebuildingdatasectionendzoomintransitionposition_v;
			p2projecttransparentimagesectionstaticstillend_v = p2projecttransparentimagesectionstaticstillend_part_v + $(".section12").height()/3;
			p2projecttransparentimagesectionslightzoominend_v = p2projecttransparentimagesectionstaticstillend_part_v + $(".section12").height() - $(".section12").height()/3;
			p2projecttransparentimagesectionssideimagestransitionend_v = p2projecttransparentimagesectionstaticstillend_part_v + $(".section12").height() + $(".section12").height() - $(".section12").height()/3,
		p2projecttransparentimagesectionsdatahidetransitionend_v = p2projecttransparentimagesectionssideimagestransitionend_v + $(".section12").height();
		p2projecttransparentdatasectionzoomingtransparentimageend_v = p2projecttransparentimagesectionsdatahidetransitionend_v + $(".section12").height()/3;
		
		p3bannersectionzoomend_v = p2projecttransparentdatasectionzoomingtransparentimageend_v + $(".section12").height()/3 + $(window).height() + $(window).height()/2; /* + $(".section13").height() + $(".section13").height()/2 */
		p3bannersectionshowtextend_v = p3bannersectionzoomend_v + $(window).height()/2;
		p3logobgsectionend_v = p3bannersectionshowtextend_v + $(window).height()/2 + $(window).height();	/* $(".section14").height() */
		p3bannerhidetransitionstartposition_v = p3bannersectionshowtextend_v + $(window).height() + $(window).height() + $(window).height();
		p3logobgsectionhideposition_v = p3bannerhidetransitionstartposition_v + $(window).height() + $(window).height();	/* $(".section14").height() + $(".section14").height() */
		p3logoandtextsectionend_v = p3logobgsectionhideposition_v + $(".section15").height() + $(".section16").height() + $(window).height();
		p3logoandtextsectionscreenwaitingtimeend_v = p3logoandtextsectionend_v + $(window).height();
		p3projectplacesdatasectionbuildingimagezoominend_v = p3logoandtextsectionscreenwaitingtimeend_v + $(window).height() *2;
		p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v = p3projectplacesdatasectionbuildingimagezoominend_v + $(window).height() + $(window).height();
		p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v = p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v + $(window).height() * 2;
		p3projecttransparantimagebuildingdatasectionendopacitytransitionposition_v = p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v + $(window).height();
		p3projecttransparantimagebuildingdatasectionendzoomintransitionposition_v = p3projecttransparantimagebuildingdatasectionendopacitytransitionposition_v + $(window).height();
		p3projecttransparentimagesectionstaticstillend_part_v = p3projecttransparantimagebuildingdatasectionendzoomintransitionposition_v;
			p3projecttransparentimagesectionstaticstillend_v = p3projecttransparentimagesectionstaticstillend_part_v + $(".section18").height()/3;
			p3projecttransparentimagesectionslightzoominend_v = p3projecttransparentimagesectionstaticstillend_part_v + $(".section18").height() - $(".section18").height()/3;
			p3projecttransparentimagesectionssideimagestransitionend_v = p3projecttransparentimagesectionstaticstillend_part_v + $(".section18").height() + $(".section18").height() - $(".section18").height()/3,
		p3projecttransparentimagesectionsdatahidetransitionend_v = p3projecttransparentimagesectionssideimagestransitionend_v + $(".section18").height();
		p3projecttransparentdatasectionzoomingtransparentimageend_v = p3projecttransparentimagesectionsdatahidetransitionend_v + $(".section18").height()/3;
		
		aboutbannersectionzoomend_v = p3projecttransparentdatasectionzoomingtransparentimageend_v + $(".section18").height()/3 + $(".section19").height() + $(".section19").height()/2;
		aboutbannersectionshowtextend_v = aboutbannersectionzoomend_v + $(window).height()/2;
		aboutbannersectionhideend_v = aboutbannersectionshowtextend_v + $(window).height();
		
		portfoliosectionshowend_v = aboutbannersectionhideend_v + $(window).height();
		portfoliosectionhideend_v = portfoliosectionshowend_v + $(window).height();
		
		whatsnewsectionshowend_v = portfoliosectionhideend_v + $(window).height();
		whatsnewsectionhideend_v = whatsnewsectionshowend_v + $(window).height();
		
		contactussectionshowend_v = whatsnewsectionhideend_v + $(window).height();
		contactussectionhideend_v = contactussectionshowend_v + $(window).height();
		
		datasectionscontainerstart_v = p3projecttransparentdatasectionzoomingtransparentimageend_v;	// using data section container start as project 3 transparent section zooming transparent end position
		datasectionscontainerheight_v = $(".data-sections-container").height();
		datasectionscontainerend_v = p3projecttransparentimagesectionsdatahidetransitionend_v + datasectionscontainerheight_v;
		
		var s = skrollr.init({
			constants: {
				p1bannersectionheight: p1bannersectionheight_v,
				p1logobgsectionheight: p1logobgsectionheight_v,
				p1logoandtextsection: p1logoandtextsection_v,
				p1projectplacesdatasection: p1projectplacesdatasection_v,
				p1projecttransparentdatasectionprojectanimationdone: p1projecttransparentdatasectionprojectanimationdone_v,
				p1projecttransparentdatasectionprojectdatadisplayclear: p1projecttransparentdatasectionprojectdatadisplayclear_v,
				p1projecttransparentdatasectionzoomingtransparentimageend: p1projecttransparentdatasectionzoomingtransparentimageend_v,
				
				p2bannersectionzoomend: p2bannersectionzoomend_v,
				p2bannersectionshowtextend: p2bannersectionshowtextend_v,
				p2logobgsectionend: p2logobgsectionend_v,
				p2bannerhidetransitionstartposition: p2bannerhidetransitionstartposition_v,
				p2logobgsectionhideposition: p2logobgsectionhideposition_v,
				p2logoandtextsectionend: p2logoandtextsectionend_v,
				p2logoandtextsectionscreenwaitingtimeend: p2logoandtextsectionscreenwaitingtimeend_v,
				p2projectplacesdatasectionbuildingimagezoominend: p2projectplacesdatasectionbuildingimagezoominend_v,
				p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition: p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v,
				p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition: p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v,
				p2projecttransparantimagebuildingdatasectionendopacitytransitionposition: p2projecttransparantimagebuildingdatasectionendopacitytransitionposition_v,
				p2projecttransparantimagebuildingdatasectionendzoomintransitionposition: p2projecttransparantimagebuildingdatasectionendzoomintransitionposition_v,
				p2projecttransparentimagesectionstaticstillend: p2projecttransparentimagesectionstaticstillend_v,
				p2projecttransparentimagesectionslightzoominend: p2projecttransparentimagesectionslightzoominend_v,
				p2projecttransparentimagesectionssideimagestransitionend: p2projecttransparentimagesectionssideimagestransitionend_v,
				p2projecttransparentimagesectionsdatahidetransitionend: p2projecttransparentimagesectionsdatahidetransitionend_v,
				p2projecttransparentdatasectionzoomingtransparentimageend: p2projecttransparentdatasectionzoomingtransparentimageend_v,
				
				p3bannersectionzoomend: p3bannersectionzoomend_v,
				p3bannersectionshowtextend: p3bannersectionshowtextend_v,
				p3logobgsectionend: p3logobgsectionend_v,
				p3bannerhidetransitionstartposition: p3bannerhidetransitionstartposition_v,
				p3logobgsectionhideposition: p3logobgsectionhideposition_v,
				p3logoandtextsectionend: p3logoandtextsectionend_v,
				p3logoandtextsectionscreenwaitingtimeend: p3logoandtextsectionscreenwaitingtimeend_v,
				p3projectplacesdatasectionbuildingimagezoominend: p3projectplacesdatasectionbuildingimagezoominend_v,
				p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition: p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition_v,
				p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition: p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition_v,
				p3projecttransparantimagebuildingdatasectionendopacitytransitionposition: p3projecttransparantimagebuildingdatasectionendopacitytransitionposition_v,
				p3projecttransparantimagebuildingdatasectionendzoomintransitionposition: p3projecttransparantimagebuildingdatasectionendzoomintransitionposition_v,
				p3projecttransparentimagesectionstaticstillend: p3projecttransparentimagesectionstaticstillend_v,
				p3projecttransparentimagesectionslightzoominend: p3projecttransparentimagesectionslightzoominend_v,
				p3projecttransparentimagesectionssideimagestransitionend: p3projecttransparentimagesectionssideimagestransitionend_v,
				p3projecttransparentimagesectionsdatahidetransitionend: p3projecttransparentimagesectionsdatahidetransitionend_v,
				p3projecttransparentdatasectionzoomingtransparentimageend: p3projecttransparentdatasectionzoomingtransparentimageend_v,
				
				aboutbannersectionzoomend: aboutbannersectionzoomend_v,
				aboutbannersectionshowtextend: aboutbannersectionshowtextend_v,
				aboutbannersectionhideend: aboutbannersectionhideend_v,
				
				portfoliosectionshowend: portfoliosectionshowend_v,
				portfoliosectionhideend: portfoliosectionhideend_v,
				
				portfoliosectionanimationstart: datasectionscontainerstart_v + $(".about-us-section-container").innerHeight() - $(window).height() / 2,
				portfoliosectionanimationend: datasectionscontainerstart_v + $(".about-us-section-container").innerHeight(),
				
				whatsnewsectionshowend: whatsnewsectionshowend_v,
				whatsnewsectionhideend: whatsnewsectionhideend_v,
				
				contactussectionshowend: contactussectionshowend_v,
				contactussectionhideend: contactussectionhideend_v,
				
				datasectionscontainerstart: datasectionscontainerstart_v,
				datasectionscontainerheight: datasectionscontainerheight_v,
				datasectionscontainerend: datasectionscontainerend_v
				
				/*
				p2projecttransparentdatasectionprojectanimationdone: $(".section2").height() + $(".section3").height() + $(".section5").height() + $(".section6").height() + $(".section6").height()/3 + $(".section7").height() + $(".section7").height()/2 + $(window).height()/2 + $(".section8").height() + $(".section8").height() + $(".section9").height() + $(".section10").height() + $(window).height() + $(window).height() + $(window).height() *2 + $(window).height() + $(window).height() + $(window).height()/3 * 2 + $(window).height() + $(window).height() + $(".section12").height() - $(".section12").height()/3,
				p2projecttransparentdatasectionprojectdatadisplayclear: $(".section2").height() + $(".section3").height() + $(".section5").height() + $(".section6").height() + $(".section6").height()/3 + $(".section7").height() + $(".section7").height()/2 + $(window).height()/2 + $(".section8").height() + $(".section8").height() + $(".section9").height() + $(".section10").height() + $(window).height() + $(window).height() + $(window).height() *2 + $(window).height() + $(window).height() + $(window).height()/3 * 2 + $(window).height() + $(window).height() + $(".section12").height(),
				p2projecttransparentdatasectionzoomingtransparentimageend: $(".section2").height() + $(".section3").height() + $(".section5").height() + $(".section6").height() + $(".section6").height()/3 + $(".section7").height() + $(".section7").height()/2 + $(window).height()/2 + $(".section8").height() + $(".section8").height() + $(".section9").height() + $(".section10").height() + $(window).height() + $(window).height() + $(window).height() *2 + $(window).height() + $(window).height() + $(window).height()/3 * 2 + $(window).height() + $(window).height() + $(".section12").height() + $(".section12").height()/3,
				*/
			}
		});
	}
	
	// loadVariables();
	
$(document).ready(function(){
	
	
});
$(window).load(function(){
	$(".loader-container").hide(); // hide loader on window load event
	// setDataSectionContainerTopPosition();
	loadVariables();
	
	// scroll to related section
	// whats new
	$(".whats-new-menu-link").click(function(){
		let scrollAmount = datasectionscontainerstart_v + $(".about-us-section-container").innerHeight() + $(".portfolio-container").innerHeight();
		$('html, body').animate({
		   scrollTop: scrollAmount
		});
	});
	// contact us
	$(".contactus-menu-link").click(function(){
		let scrollAmount = datasectionscontainerstart_v + $(".about-us-section-container").innerHeight() + $(".portfolio-container").innerHeight() + $(".whatsnew-container").innerHeight();
		$('html, body').animate({
		   scrollTop: scrollAmount
		});
	});
	// portfolio
	$(".portfolio-menu-link").click(function(){
		let scrollAmount = datasectionscontainerstart_v + $(".about-us-section-container").innerHeight();
		$('html, body').animate({
		   scrollTop: scrollAmount
		});
	});
	// about
	$(".about-menu-link").click(function(){
		let scrollAmount = datasectionscontainerstart_v;
		$('html, body').animate({
		   scrollTop: scrollAmount
		});
	});
	
	// set top position to data-sections-container based on scroll event
	function setDataSectionContainerTopPosition() {
		// let scrollTop = $(window).height() + p3projecttransparentimagesectionsdatahidetransitionend_v+'px';
		let topPosition = p3projecttransparentdatasectionzoomingtransparentimageend_v+'px';
		$(".data-sections-container").css("top",topPosition);
	}
	setDataSectionContainerTopPosition();
	$(window).scroll(function(){
		// let scrollTopPx = $(window).scrollTop()+"px";
		//$(".data-sections-container").css("top",scrollTopPx);
	});
	$(window).resize(function(){
		setDataSectionContainerTopPosition();
	});
});




			/*
			p1projecttransparentdatasectiongettingnextproject: $(".section2").height() + $(".section3").height() + $(".section5").height() + $(".section6").height() + $(".section6").height()/3,
			*/
