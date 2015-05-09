
$(function(){
	$(window).scroll(function(){
		if($(document).scrollTop()>=50){
			$('#toplogo').show();
		}
		else if($(document).scrollTop()<50){
			$('#toplogo').hide();
		}
	});
	$('#toplogo').click(function(){
		$('body,html').animate({scrollTop:0},150);
	});
	/* 验证是否同意协议 */
	var flag = 0;
	$('#agree').change(function(){
		if(flag== 0){
			flag = 1;
			//alert('xuanzhong');
		}else{
			flag = 0;
			//alert('quxiao');
		}
	});

	$('#start-dream').click(function(){
		if(flag==0){
			$('body,html').animate({scrollTop:0},150);
			$('#alert-bg').show();
			$('#alert-box').show();
			
		}else if(flag==1){
			if($('.login_sign').val()==0){
				$('.hLoginLo').click();
			}else if($('.login_sign').val()==1){
				location.href="product/productnewAdd";
			}
		}
		return false;
	});
	$('.alert-title a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box').hide();
	});
	$('.alert-sure a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box').hide();
	});
});