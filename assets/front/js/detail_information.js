


$(function(){
	var $li = $('.select ul').children('li');
	$li.on('click',function(){
	   $(this).addClass('selected').siblings().removeClass('selected');
	});

	$(window).on('scroll',function(){
		if($(this).scrollTop() > 100){
			$('.select ul').addClass('fixed');
		}
		if($(this).scrollTop() < 100){
			$('.select ul').removeClass('fixed');
		}
		// $('#particulars-right').height()   + $(window).height()
		if($(this).scrollTop()  > 1483){
			//console.log($('#particulars-right').height());
			$('#particulars-right').addClass('fixed3');
		    $('#particulars-right').css('margin-bottom',200);
		}
		if($('#particulars-right') - $(this).scrollTop() <=$(window).height ){
			// $('#particulars-right').addClass('fixed3');
			$('#particulars-right').css('margin-bottom',200);
		} 
		if($(this).scrollTop() < 8700){
			$('#particulars-right').css('margin-bottom',0);
		} 
		if($(this).scrollTop()  < $('#particulars-right').height()){
			console.log($(this).scrollTop() + $(window).height());
			$('#particulars-right').removeClass('fixed3');
			$('#particulars-right').css('margin-bottom',0);
		}
	});

});