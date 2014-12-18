var	animSpead = 500;

function resizeSlide(){
	var slidH = $(window).height()-$('.header').height(),
		slidW = $(window).width();
		slidCont = ($(window).width()/2)-480;
	var sc = ($(window).width()/2)-480;
	$('div.slid').css('height',slidH+'px').css('width',slidW+'px');
	//$('div.content').css('margin','0 0 0 '+sc+'px');
}

function nextStep(){
	var eq = $(this).data('eq'),
		scroll = $(window).width()*eq;
	if($('div.slid').length > eq && eq>=0){
		$('div.slid-line').animate({left:'-'+scroll+'px'},animSpead);
	}
}


$(document).ready(function(){
	$('.next-s').click(nextStep);
	resizeSlide();
	$(window).resize(resizeSlide);
	
});