$(function(){
// 返回个人中心
$('#person-content .header a,#manage-address .return ,#manage-address .add-address').hover(function(){
	$(this).css({'color':'#fff','border':'2px solid #fff','background':'#55acef'});	
},function(){
	$(this).css({'color':'#55acef','border':'2px solid #55acef','background':'#fff'});
});
//保存个人设置按钮
$('.save , .upload-avatar ,.save-again').hover(function(){
if(!$(this).is(':animated')){
		$(this).animate({opacity:1},600);
	}	
	
},function(){	
		$(this).animate({opacity:0.8},600);	
});

// $('.save , .upload-avatar').hover(function(){
// 	$(this).css({'background':'#2d61f5','cursor':'pointer'});	
// },function(){
// 	$(this).css({'background':'#55acef'});
// });
//项目按钮hover
$('.browse').hover(function(){
	if(!$(this).is(':animated')){
		$(this).animate({opacity:1},200);
	}
},function(){		
		$(this).animate({opacity:0.6},200);	
});
// $('#person-message .setting a').hover(function(){
// 	$(this).css({'color':'#000','border':'2px solid #000'});
// },function(){
// 	$(this).css({'color':'#999','border':'2px solid #999'});
// });
//被选中的li
$('.selected').addClass('selected');
//go-top
$('#person-go-top').hide();
$(window).on('scroll',function(){
	var $goTop=$('#person-go-top');
		if($(this).scrollTop()>100){
			$goTop.fadeIn(1000);
		}else{
			$goTop.fadeOut(1000);
		}
	});
$('#person-go-top').on('click',function(){
	$('body').animate({scrollTop:0},150);
});
// $('#person-go-top').on('click',function(){
	// $(window).on('scroll',function(){
		// $(this).scrollTop()==0;;
	// })
	
	// $(window).animate({scrollTop():'0'},800);
		// return false;
// });



$('#oBtn').on('click',function(){
	if($('.person-province').val() == '请选择省份名' || $('.person-city').val() == '请选择城市名'|| $('.person-city').val() == ''){
		alert('请选择城市');
	}else{
		$.post('user/ajax_do_setting',{
			user_name:$('.user-na').val(),
			sex:$('.sex-input:checked').val(),
			province:$('.person-province').val(),
			city:$('.person-city').val(),
			intro:$('#personIntro').val()
			},function(data){
			if(data == 'success'){
				alert('保存成功');
				location.reload();
			}else{
				alert('保存失败');
			}
		},'text');
	}
});





});

