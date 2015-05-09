


$(function(){
	// 导航菜单
	$('#h_nav li').hover(function(){
		$(this).addClass('select_1');	
		// var $subMenu = $(this);
		// if(!$subMenu.is(":animated")){//判断动画是否完成
		// 	$subMenu.fadeIn(1000,function(){
		// 		$(this).css('background', '#55acef');
		// 	});
		// }
		// $subMenu.show(1000);
	}, function(){
		$(this).removeClass('select_1');
		// var $subMenu = $(this);
		// if(!$subMenu.is(":animated")){
		// 	$subMenu.fadeOut(1000,function(){
		// 		$(this).css('background', 'transparent');
		// 	});
		// }
	});
	$('#h_nav li').click(function(){
		var $select = $('.select_1');
		$select.removeClass('select_1');
		$select.addClass('unselect_1');
		$(this).addClass('select_1');
		$(this).removeClass('unselect_1');
		
	});

});


		$('.fill-out img').hover(function(){
			//alert();
			$(this).animate({
					width:'+=20',
					left:'-=10',
					top:'-=10',
					height:'+=20'

				},300);
		},function(){
			$(this).animate({
					width:'-=20',
					left:'+=10',
					top:'+=10',
					height:'-=20'

				},300

			);
		});