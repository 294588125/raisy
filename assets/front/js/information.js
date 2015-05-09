$(function(){
	var $li = $('.select ul').children('li');
	$li.on('click',function(){
	   $(this).addClass('selected').siblings().removeClass('selected');
	});

	$(window).on('scroll',function(){
		if($(this).scrollTop() > 200){
			$('.select ul').addClass('fixed');
		}
		if($(this).scrollTop() < 200){
			$('.select ul').removeClass('fixed');
		}
	});

});