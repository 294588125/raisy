$(function(){
	$('.pl').on('click',function(){
		if($(this).siblings('.pln').css('display')=='none'){
		$(this).siblings('.pln').css('display','block');
	}else if($(this).siblings('.pln').css('display')=='block'){
		$(this).siblings('.pln').css('display','none');
	}
	});
});