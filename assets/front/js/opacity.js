$(function(){
	$('.pay_prv').hover(
        function(){
           	$(this).animate({opacity: '1'},1000);
       	},function(){
            $(this).animate({opacity: '0.6'},1000);
		});
});