$(function(){
	// 导航菜单
	$('#hNav li').hover(function(){
		
		$(this).addClass('select-1');	
		// var $subMenu = $(this);
		// if(!$subMenu.is(":animated")){//判断动画是否完成
		// 	$subMenu.fadeIn(1000,function(){
		// 		$(this).css('background', '#55acef');
		// 	});
		// }
		// $subMenu.show(1000);
	}, function(){
		
		$(this).removeClass('select-1');
		// var $subMenu = $(this);
		// if(!$subMenu.is(":animated")){
		// 	$subMenu.fadeOut(1000,function(){
		// 		$(this).css('background', 'transparent');
		// 	});
		// }
	});
	$('#hNav li').click(function(){
		var $select = $('.select-1');
		$select.removeClass('select-1');
		$select.addClass('unselect-1');
		$(this).addClass('select-1');
		$(this).removeClass('unselect-1');
		
	});

	$('.wei-logon').hover(function(){
		$(this).css('background-position-x','-287px');
		$(this).css('background-position-y','-117px');				
	}, function(){
		$(this).css('background-position-x','0');
		$(this).css('background-position-y','-117px');
	});
	$('.QQ-logon').hover(function(){
		$(this).css('background-position-x','-337px');
		$(this).css('background-position-y','-115px');				
	}, function(){
		$(this).css('background-position-x','-51px');
		$(this).css('background-position-y','-115px');
	});
	$('.tie-logon').hover(function(){
		$(this).css('background-position-x','-386px');
		$(this).css('background-position-y','-113px');				
	}, function(){
		$(this).css('background-position-x','-100px');
		$(this).css('background-position-y','-113px');
	});
	$('.dou-logon').hover(function(){
		$(this).css('background-position-x','-438px');
		$(this).css('background-position-y','-114px');				
	}, function(){
		$(this).css('background-position-x','-150px');
		$(this).css('background-position-y','-114px');
	});

	$('.hLoginLo').click(function(){
		$('#matteBox').css('display','block');
		$('#login').css('display','block');
	});
	$('.hRe').click(function(){
		$('#matteBox').css('display','block');
		$('#reg').css('display','block');
		$('#yanImg').click();
	});

	$('.Js-pop-close').hover(function(){
		$(this).css('background-position-x','0px');
		$(this).css('background-position-y','-24px');				
	}, function(){
		$(this).css('background-position-x','0px');
		$(this).css('background-position-y','0px');
	});
	$('.Js-pop-close').click(function(){
		$('#matteBox').css('display','none');
		$('#login').css('display','none');
		$('#reg').css('display','none');
		$('.form-error').html('');
		$('.log-reg input').css('border-color','#e4e4e4');
		$('.log-reg input').val('');
	});

	$('#switchLogin').click(function(){
		$('.Js-pop-close').click();
		$('.hLoginLo').click();
	});
	$('#switchRegister').click(function(){
		$('.Js-pop-close').click();
		$('.hRe').click();
	});
	
	$('#userName').hover(function(){
		$(this).css('background','rgb(68, 68, 68)');
		$('.user-list').css('display','block');
	},function(){
		$(this).css('background','none');
		$('.user-list').css('display','none');
	});



	$('#login input').blur(function(){
		if($(this).val()==''){
			$('#login .form-error').html('不能为空');
			$(this).css('border-color','red');
			// alert(1);
		}
		else{
			$('#login .form-error').html('');
			$(this).css('border-color','#e4e4e4');
			// alert(2);
		}
	});
	$('#reg input').blur(function(){
		if($(this).val()==''){
			$('#reg .form-error').html('不能为空');
			$(this).css('border-color','red');
		}
		else{
			$('#reg .form-error').html('');
			$(this).css('border-color','#e4e4e4');
		}
	});
	$('#regPwdA').blur(function(){
		if($(this).val()!=$('#regPwd').val()){
			$('#reg .form-error').html('请保持与所填写内容一致');
			$(this).css('border-color','red');
		}else if($(this).val()==''){
			$('#reg .form-error').html('不能为空');
			$(this).css('border-color','red');
		}else if($(this).val()==$('#regPwdA').val()){
			$('#reg .form-error').html('');
			$(this).css('border-color','#e4e4e4');
			$('#regPwd').css('border-color','#e4e4e4');
		}
		
	});
	$('#regPwd').blur(function(){
		if($(this).val()!=$('#regPwdA').val() && $('#regPwdA').val()!=''){
			$('#reg .form-error').html('请保持与所填写内容一致');
			$(this).css('border-color','red');
		}else if($(this).val()==''){
			$('#reg .form-error').html('不能为空');
			$(this).css('border-color','red');
		}else if($(this).val()==$('#regPwdA').val()){
			$('#reg .form-error').html('');
			$(this).css('border-color','#e4e4e4');
			$('#regPwdA').css('border-color','#e4e4e4');
		}
		
	});
	$('#btnLog').click(function(){
		if($('#login input:text').val()!=''&& $('#login input:password').val()!=''){
			$.post('user/check_login',{
					username:$('#loginUserName').val(),
					pwd:$('#loginPWD').val()
			},function(data){
				if(data=='success'){
					location.reload();
				}else if(data='fail'){
					$('#login .form-error').html('用户名与密码不匹配！');
				}
			},'text');
		}else{
			$('#login .form-error').html('不能为空');
		}
	});
	$('#vCode').blur(function(){
		var a=$('#hid').val();
		var b=$('#vCode').val();
		if(a!=b){
			$('#reg .form-error').html('验证码输入错误，请重新输入');
			$(this).css('border-color','red');
		}
	});
	$('#yanImg').click(function(){
		$.get('user/ajax_yanzhengma',{},function(data){
			$('#yanImg').attr("src","captcha/"+data.time+".jpg");
			$('#hid').val(data.word);
		},'json');
	});
	var flag=1;
	$('#check').change(function(){
		if(flag==1){
			flag=0;
		}else{
			flag=1;
		}
	});
	
	var flag1=0;
	$('#regName').blur(function(){ 
		$.post('user/check_reg_name',{
			regname:$('#regName').val()
		},function(data){
			if(data=='fail'){
				$('#reg .form-error').html('此用户名已存在');
				$('#regName').css('border-color','red');
				flag1=1;
			}else if(data=='success'){
				flag1=0;
			}
		},'text');
	});
	$('#btnReg').click(function(){	
		$('#regPwdA').blur();
		$('#regPwd').blur();
		$('#vCode').blur();
		var error=$('#reg .form-error');
		if(error.html()!='请保持与所填写内容一致'&& error.html()!='验证码输入错误，请重新输入'&& $('#regName').val()!=''&&$('#regPwd').val()!=''&&$('#regPwdA').val()!=''&&$('#vCode').val()!=''&& flag==1&&flag1==0){
			$.post('user/do_reg',{
				regname:$('#regName').val(),
				pwd:$('#regPwd').val()
			},function(data){
				if(data=='success'){
					location.reload();
				}else if(data=='fail'){
					error.html('注册失败请重新注册！');
				}
			},'text');
		}else if(error.html()=='请保持与所填写内容一致'){
			error.html('请保持与所填写内容一致');
		}else if(flag1==1){
			error.html('用户名已存在');
		}else if(error.html()=='验证码输入错误，请重新输入'){
			error.html('验证码输入错误，请重新输入');
		}else{
			error.html('不能为空');
		}
	});
});