$(function(){
	$('.launcher-information').hover(function(){
		if(!$(this).siblings().is(':animated')){
			$(this).siblings('.launcher-information-detail').fadeIn();
		}
		
	},function(){
		$(this).siblings('.launcher-information-detail').fadeOut();
	});
	
	$('.repay-detail').hover(function(){
		if(!$(this).siblings().is(':animated')){
			$(this).siblings('.repay-detail-information').fadeIn();
		}
	},function(){
		$(this).siblings('.repay-detail-information').fadeOut();
	});
	
	$('.take-good-address').hover(function(){
		if(!$(this).siblings().is(':animated')){
			$(this).siblings('.take-good-address-detail').fadeIn();
		}
	},function(){
		$(this).siblings('.take-good-address-detail').fadeOut();
	});
	
	
	
	
	

	
});