
/* 特效五 省，市 */
$(function(){
	/* 特效一 回到顶部*/
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
	/* 特效二 点击变蓝*/
	$('.pro-type-box li').click(function(){
		$('.pro-type-box li').removeClass('current-type');
		$(this).addClass('current-type');
	});
	/* 特效三 报错 */
	/* 特效四 离开事件，出现在预览中 */
	$('.get-pro-name').blur(function(){
		if($(this).val()==''){
			$('.name-error-text').css('display','block');
		}else{
			$('.name-error-text').hide();
			$('.pro-name span').html($(this).val());
		}
	});
	$('.get-pro-money').blur(function(){
		if($(this).val()==''){
			$('.money-error-text').css('display','block');
			$('.all-infor em').hide();
		}else{
			var i=Number($(this).val());
		    //alert(typeof(i));
		    if(i>=500){
		    	$('.pro-money').html($(this).val());
				$('.money-error-text').hide();
				$('.all-infor em').show();
			}
			else{
				$('.money-error-text').css('display','block');
				$('.all-infor em').hide();
				}
		}
	});
	$('.get-pro-start-time').blur(function(){
		if($(this).val()==''){
			$('.start-error-text').css('display','block');
		}else{
			$('.start-error-text').hide();
			$('.start').html($(this).val());
		}
	});
	$('.get-pro-end-time').blur(function(){
		if($(this).val()==''){
			$('.end-error-text').css('display','block');
		}else{
			$('.end-error-text').hide();
			$('.end').html($(this).val());
		}
	});
	$('.city').blur(function(){
		if($('this').val()!=''&&$('this').val()!='请选择城市名'){
			$('.place-error-text').css('display','none');
		}
	});
	$('.pro-intro textarea').blur(function(){
		if($(this).val()==''){
			$('.content-error-text').css('display','block');
		}else{
			$('.content-error-text').hide();
		}
	});
	
	
	/* 特效五 弹层并且报错 */
	/* 验证是否同意协议 */
	var flag = 0;
	$('.check-box').change(function(){
		if(flag== 0){
			flag = 1;
			//alert('xuanzhong');
		}else{
			flag = 0;
			//alert('quxiao');
		}
	});

	$('.next').click(function(){
		var j=Number($('.get-pro-money').val());
		
		if(j<500||$('.get-pro-name').val()=='' || $('.get-pro-money').val()=='' || $('.get-pro-start-time').val()=='' || $('.get-pro-end-time').val()=='' || $('.pro-intro textarea').val()==''||$('.city').val()=='请选择城市名'||$('.city').val()==''){
			$('body,html').animate({scrollTop:0},150);
			$('#alert-bg').show();
			$('#alert-box').show();	
		}
		if($('.get-pro-name').val()==''){
			$('.name-error-text').css('display','block');
		}
		if($('.get-pro-money').val()==''||j<=0){
			$('.all-infor em').hide();
			$('.money-error-text').css('display','block');
		}
		if($('.city').val()=='请选择城市名'||$('.city').val()==''){
			$('.place-error-text').css('display','block');
		}
		if($('.get-pro-start-time').val()==''){
			$('.start-error-text').css('display','block');
		}
		if($('.get-pro-end-time').val()==''){
			$('.end-error-text').css('display','block');
		}
		if($('.pro-intro textarea').val()==''){
			$('.content-error-text').css('display','block');
		}
		if(j>=500&&$('.get-pro-name').val()!='' && $('.get-pro-money').val()!='' && $('.get-pro-start-time').val()!='' && $('.get-pro-end-time').val()!='' && $('.pro-intro textarea').val()!=''&&$('.city').val()!='请选择城市名'&&$('.city').val()!=''){
			$.post('product/pubStepOne_alter',{
					pro_id:$('.get-pro-id').val(),
					pro_name:$('.get-pro-name').val(),
					pro_money:$('.get-pro-money').val(),
					pro_start_time:$('.get-pro-start-time').val(),
					pro_end_time:$('.get-pro-end-time').val(),
					pro_type:$('.current-type').val(),
					pro_province:$('.province').val(),
					pro_city:$('.city').val(),
					//'pro_cover':$('product-cover').val(),
					pro_video:$('.vedio').val(),
					pro_intro:$('.pro-intro textarea').val(),
					pro_clearfix:$('.pro-clearfix textarea').val()
				},function(data){
					
					$('#alert-bg').show();
					$('#alert-box-ok').show();	
					$('#alert-box-ok .alert-title a').click(function(){
						location.href="product/pubStepTwo_search/"+data;
					});
					$('#alert-box-ok .alert-sure a').click(function(){
						location.href="product/pubStepTwo_search/"+data;
					});
				},'text');
			
			//$('body,html').animate({scrollTop:0},150);
			//$('#alert-bg').show();
			//$('#alert-box-ok').show();	
		}
		return false;
	});
	$('#alert-box .alert-title a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box').hide();
	});
	$('#alert-box .alert-sure a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box').hide();
	});
	/*$('#alert-box-ok .alert-title a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box-ok').hide();
	});
	$('#alert-box-ok .alert-sure a').click(function(){
		$('#alert-bg').hide();
		$('#alert-box-ok').hide();
	});*/
});