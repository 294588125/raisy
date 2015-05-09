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
	//报错
	$('.get-pro-money').blur(function(){
		if($(this).val()==''){
			$('.money-error-text').css('display','block');
		}else{
			var i=Number($(this).val());
			if(i<1){
				$('.money-error-text').css('display','block');
			}
			else{
				$('.money-error-text').hide();
			}
		}
	});
	$('.wx-inputErrBorder').blur(function(){
		if($(this).val()==''){
			$('.content-error-text').css('display','block');
		}else{
			$('.content-error-text').hide();
		}
	});
	$('.save-is').click(function(){
		var j=Number($('.get-pro-money').val());
		if(j<1||$('.get-pro-money').val()=='' || $('.wx-inputErrBoder').val()==''){
			$('body,html').animate({scrollTop:0},150);
			$('#alert-bg').show();
			$('#alert-box').show();	
		}
		if($('.get-pro-money').val()==''||j<1){
			$('.money-error-text').css('display','block');
		}
		if($('.return-intro textarea').val()==''){
			$('.content-error-text').show();
		}
		if(j>=1&&$('.get-pro-money').val()!='' && $('.wx-inputErrBoder').val()!=''){
			$.post('product/pubStepTwo_save',{
				return_money:$('.get-pro-money').val(),
				return_method:$('.return-intro textarea').val(),
				project_id:$('.project-id1').val()
			},function(data){
			    
				$('body,html').animate({scrollTop:0},150);
				$('#alert-bg').show();
				$('#alert-box-ok').show();
				$('#alert-box-ok .alert-title a').click(function(){
					
					location.href="product/pubStepTwo_search/"+data;
				});
				$('#alert-box-ok .alert-sure a').click(function(){
					location.href="product/pubStepTwo_search/"+data;
				});	
			},'text');	
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
	$('.prev').click(function(){
		var project_id=$('.project-id1').val();
		location.href="product/pubStepTwo_prev/"+project_id;
	});
	$('.delete-return').click(function(){
		$('#alert-bg').show();
		$('#alert-box-delete').show();
		$('.no-delete').click(function(){
			$('#alert-bg').hide();
			$('#alert-box-delete').hide();
		});
		isisDelId = $(this).attr('support-id');
		$('.is-delete').click(function(){
			$.post('support/deleteSupportType',{
				support_type_id:isisDelId
			},function(data){
				if(data=='success'){
					location.reload();
				}else if(data=='fail'){
					alert('系统错误');
				}
			},'text');
		});
	});	
	$('.update-return').click(function(){
		support_id=$(this).attr('support-id');
		$.post('support/updateSupportTypeSearch',{
			support_type_id:support_id
		},function(data){
			$('.save-is').css('display','none');
			$('.alter-is').css('display','block');
			$('.get-pro-money').val(data.support_money);
			$('.return-intro textarea').html(data.support_report);
			$('.alter-is').click(function(){
				$.post('support/updateSupportTypeUpdate',{
					support_type_id:support_id,
					support_money:$('.get-pro-money').val(),
					support_report:$('.return-intro textarea').val(),
					project_id:$('.project-id1').val()
				},function(data){
					if(data){
						console.log(data);
						location.href="product/pubStepTwo_search/"+data;
					}
				},'text');
			});
		},'json');
	});	
	$('.next').click(function(){
		if($('.return-num').val()<3){
			$('#alert-bg').show();
			$('#alert-box-typenum').show();
			$('.no-do').click(function(){
				$('#alert-bg').hide();
				$('#alert-box-typenum').hide();
			});
		}else{
			var pro_id=$('.project-id1').val();
			location.href="publisher/pubStepThreeShow/"+pro_id;
		}
	});
});