$(function(){
	var $windowHeight = $(window).height();
	$('.hide-behind').height($windowHeight);
	$('.answer-show').click(function(){
		$('.hide-behind').fadeIn();
		$('.answer-content').fadeIn();
	});
	$('.close,.cancel,.send').click(function(){
		$('.hide-behind').fadeOut();
		$('.answer-content').fadeOut();
	});




	
});