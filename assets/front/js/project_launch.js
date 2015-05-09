$(function(){	

	$('.content li a').hover(function(){
		$(this).css({'color':'#55acef'});		
		$('.content li').css({'border-color':'#55acef'});
	},function(){
		$(this).css({'color':'#333'});
		$('.content li').css({'border-color':'#e5e5e5'})
	});



});




