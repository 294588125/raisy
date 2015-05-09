$(function(){
	/*  轮播图开始  */
	var $timer;
	$('#lunbo').hover(function(){
		$(".prev").css('display','block');
		$(".next").css('display','block');	
		clearInterval($timer);			
	}, function(){
		$(".prev").css('display','none');
		$(".next").css('display','none');
		$timer=setInterval("$('#lunbo .next').click()",2000);
	});

	$(".prev").hover(function(){
		$(this).css('background-position-x','-112px');
		$(this).css('background-position-y','-51px');				
	}, function(){
		$(this).css('background-position-x','-1px');
		$(this).css('background-position-y','-51px');
	});
	$(".next").hover(function(){
		$(this).css('background-position-x','-172px');
		$(this).css('background-position-y','-51px');				
	}, function(){
		$(this).css('background-position-x','-61px');
		$(this).css('background-position-y','-51px');
	});


	//0.缓存必要的变量
	var $ul = $('#lunbo .image'),
		$li = $ul.children('li'),
		iWinWidth = $( window ).width();

	//1.设置每一个图片li的宽度为屏幕的宽度
	$li.width( iWinWidth );
	//2.让所有的图片水平分布
	$ul.css('left', -iWinWidth).width( $li.length * iWinWidth );
	//3.左右箭头事件
	$('#lunbo .next').on('click', function(){
		//当图片到达最后一个时
		var pos = $ul.position();
		if( pos.left <= -($li.length - 1) * iWinWidth ){
			$ul.css('left', -iWinWidth);
		}
		if(!$ul.is(":animated")){
			$ul.animate({ 
				left: "-="+iWinWidth
			});
			
		}
	});
	$('#lunbo .prev').on('click', function(){
		var pos = $ul.position();
		if(pos.left >= 0){
			$ul.css('left', -($li.length - 2) * iWinWidth);
		}
		if(!$ul.is(":animated")){
			$ul.animate({
				left: "+="+iWinWidth
			});
		}
	});

	$timer=setInterval("$('#lunbo .next').click()",2000);

	/*  轮播图结束  */
	/*	添加分类导航栏*/ 
	$(window).scroll(function(){
		if($(document).scrollTop()>=360){
			$('#direct').css('display','block');
		}
		else if($(document).scrollTop()<360){
			$('#direct').css('display','none');
		}
	});

	$(window).scroll(function(){
		if($(document).scrollTop()>=61){
			$('#backTop').show();

		}
		else if($(document).scrollTop()<61){
			$('#backTop').hide();
		}
	});
	$('#backTop span').hover(function(){
		$(this).css('background-position-x','0px');
		$(this).css('background-position-y','-75px');				
	}, function(){
		$(this).css('background-position-x','0');
		$(this).css('background-position-y','0');
	});
	$('#backTop span').click(function(){
		$('body,html').animate({scrollTop:0},150);
	});

	$('.focus-box img,.make-box img').hover(function(){
		// var $picW=$(this).width();
		// if(!$(this).is(":animated")){
			$(this).animate({
						width:'+=20',
						left:'-=10',
						top:'-=10',
						height:'+=20'

					},300

					);
		// }
	},function(){
		// if(!$(this).is(":animated")){
			$(this).animate({
						width:'-=20',
						left:'+=10',
						top:'+=10',
						height:'-=20'

					},300

					);
		// }
	});

});

