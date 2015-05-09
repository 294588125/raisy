
$(function(){
	$('.save-pwd').on('click',function(){
		if($('.memory-original-pwd').val()!=$('#original-pwd').val()){
			alert('与原密码不一致');
		}else{
		$.post('user/change_pwd',{
			new_pwd:$('#new-pwd').val(),
			},function(data){
				if(data=='success'){
					alert('保存成功')
					location.reload();
				}
			},'text');
		}
	});
	
	
	// $('#original-pwd').blur(function(){
		// $(this).nextAll(".formtips").remove();
		// if(this.value==""){
			// var errorMsg="密码输入不正确";
			// $(this).after('<span class="formtips onError">'+errorMsg+'</span>');
		// }else{
			// var okMsg="OK";
			// $(this).after('<span class="formtips onSuccess">'+okMsg+'</span>');
		// }
	// });

	$('#new-pwd').blur(function(){
		$(this).nextAll(".formtips").remove();
		if(this.value==""||this.value.length<6){
			var errorMsg="密码不符合";
			$(this).after('<span class="onError formtips">'+errorMsg+'</span>');
		}else{
			var okMsg="OK";
			$(this).after('<span class="onSuccess formtips">'+okMsg+'</span>');
		}
	});

	$('#ensure-pwd').blur(function(){
		$(this).nextAll('.formtips').remove();
		if($(this).val() != $('#new-pwd').val() ){
			var errorMsg="两次输入不同";
			$(this).after('<span class="onError formtips">'+errorMsg+'</span>');
		}else{
			var okMsg="OK";
			$(this).after('<span class="onSuccess formtips">'+okMsg+'</span>');
		}

	});





});