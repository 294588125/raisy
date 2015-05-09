$(function(){
	$('.message').hover(function(){
        $(this).css('background','#55acef').css({opacity: '1'},1000);
        $(this).children('p').css('color','#fff');
	},function(){
		$(this).css('background','#fff');
		$(this).children('p').css('color','#55acef');
	});
});