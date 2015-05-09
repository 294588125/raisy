$(function(){
	$('.all').hover(function(){
		$('.ul-slide-left').slideDown();
	},function(){
		$('.ul-slide-left').slideUp();

	})
	
	$('.order').hover(function(){
		$('.ul-slide-right').slideDown();
	},function(){
		$('.ul-slide-right').slideUp();
	})



	$('.page-number').on('click',function(){
		$(this).addClass('page-selected').siblings().removeClass('page-selected');
	})

	






})