$(function(){
	
	$('.return').hide();
	$('.add-address').on('click',function(){		
		$('.new-address').removeClass('none');
		$(this).hide();
		$('.return').show();
		$('.exist-address, .save-again').hide();
	});
	$('.return').on('click',function(){
		$('.new-address').addClass('none');
		$(this).hide();
		$('.add-address').show();
		$('.exist-address').show();
	});

	$(":input.required").each(function(){
	var $required=$('<strong class="required-mark">*</strong>');
	$(this).parent().append($required);	}).blur(function(){
	$(this).nextAll(".formtips").remove();
	//收件人验证
	if($(this).is('.addressee')){		
		if(this.value==""){
			var errorMsg = '&nbsp;输入不能为空';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}
	//手机验证
	if($(this).is('.addressee-tel')){
		if(this.value==""||this.value.length!=11){
			var errorMsg = '&nbsp;请输入正确的11为手机号';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');		
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}
	if($(this).is('.address-province')){
		if(this.value==''){
			var errorMsg = '&nbsp;省份不能为空';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');		
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}
	if($(this).is('.address-city')){
		if(this.value==''){
			var errorMsg = '&nbsp;城市不能为空';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');		
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}
	//地址验证
	if($(this).is('.address-detail')){
		if(this.value==''){
			var errorMsg = '&nbsp;地址不能为空';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');		
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}

	//邮编验证
	if($(this).is('.postalcode')){
		if(this.value==''||this.value.length!=6){
			var errorMsg = '&nbsp;请输入正确的邮编';
			$(this).next().after('<span  class="formtips onError" >'+errorMsg+'</span>');		
		}else{
			var okMsg="&nbsp;OK";
			$(this).next().after("<span class='formtips onSuccess'>"+okMsg+"</span>");
		}
	}
	})

$('.save').on('click',function(){
	if($( '.address-province').val()==''||$('.address-city').val()==''){
		alert('请选择城市');
	}else if($('.addressee').val()==''){
		alert('选择收件人');
	}else if($('.addressee-tel').val()==''||$('.addressee-tel').val().length!=11){
		alert('请选择电话');
	}else if($('.address-detail').val()==''){
		alert('选择详细');
	}else if($('.postalcode').val()==''||$('.postalcode').val().length!=6){
		alert('选择邮编');
	}else{
		$.post('accept_add/ajax_manage_address',{
			addressee:$('.addressee').val(),
			addressee_tel:$('.addressee-tel').val(),
			address_province:$('.address-province').val(),
			address_city:$('.address-city').val(),
			address_detail:$('.address-detail').val(),
			postalcode:$('.postalcode').val()			
		},function(data){
			if(data=="success"){
				alert('保存成功');
				location.reload();
			}else{
				alert('保存失败');
			}
		},'text')
		
	}
});
$('.del').on('click',function(){
	 $.get('accept_add/ajax_del',{
		add_id:$(this).attr('addId')
	},function(data){
		if(data=='success'){
			alert('删除成功');
			location.reload();
		}else{
			alert('删除失败');
		}
	},'text');
	
});

$('.edit').on('click',function(){
		$.post('accept_add/ajax_edit_address',{
		add_id:$(this).attr('addId')
	},function(data){
		$('.save-again').attr('addId',data.add_id);
		$('.addressee').val(data.addressee);
		$('.addressee-tel').val(data.accept_tel);
		$('.address-province').val(data.province);
		$('.address-city').val(data.city);
		$('.address-detail').val(data.address_detail);
		$('.postalcode').val(data.postalcode);
		$('.new-address').removeClass('none');
		$('.exist-address').hide();
		$('.save').addClass('none');
		$('.add-address').hide();
		$('.save-again').show();
	},'json');
	
});
$('.save-again').on('click',function(){
	if($( '.address-province').val()==''||$('.address-city').val()==''){
		alert('请选择城市');
	}else if($('.addressee').val()==''){
		alert('选择收件人');
	}else if($('.addressee-tel').val()==''||$('.addressee-tel').val().length!=11){
		alert('请选择电话');
	}else if($('.address-detail').val()==''){
		alert('选择详细');
	}else if($('.postalcode').val()==''||$('.postalcode').val().length!=6){
		alert('选择邮编');
	}else{
	$.post('accept_add/ajax_save_address_again',{
		add_id:$(this).attr('addId'),
		addressee:$('.addressee').val(),
		addressee_tel:$('.addressee-tel').val(),
		address_province:$('.address-province').val(),
		address_city:$('.address-city').val(),
		address_detail:$('.address-detail').val(),
		postalcode:$('.postalcode').val()	
	},function(data){
		if(data=='success'){
			alert('保存成功');
			location.reload();
		}else if(data=='fail'){
			alert('保存失败');
		}
	},'text');
	}
});









});

