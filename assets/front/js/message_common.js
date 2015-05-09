$(function(){
	var $windowHeight = $(window).height();
	$('.hide-behind').height($windowHeight);

	$('.close,.cancel').click(function(){
		$('.hide-behind').fadeOut();
		$('.delete-content').fadeOut();
		$('.delete-comment-content').fadeOut();
		$('.delete-send').fadeOut();
		$('.delete-receive').fadeOut();
	});
		
		var alw=0;
	$('.delete-show').on('click',function(){//删除私信
		
		$('.hide-behind').fadeIn();
		$('.delete-content').fadeIn();
		$id=$(this).attr('message-id');
		$('.ensure').attr('message-id',$id)
		//alert($('.ensure').attr('message-id'));
	})
	$('.ensure').on('click',function(){
		$('.hide-behind').fadeOut();
		$('.delete-content').fadeOut();
 	 	$.get('message/del_message',{id:$(this).attr('message-id')},
 		function(data){if(data=='success'){location.reload()}},'text')
		});
				
				
				
			$('.delete-comment').on('click',function(){//删除发出的话题
				$('.comm-ensure').attr('comment-id',$(this).attr('comment-id'));
				$('.hide-behind').fadeIn();
				 $('.delete-comment-content').fadeIn();
			})
			$('.comm-ensure').click(function(){
					$('.hide-behind').fadeOut();
					$('.delete-comment-content').fadeOut();
					//alert($(this).attr('comment-id'))
 					$.get('comment/del_comment',{id:$(this).attr('comment-id')},
 					function(data){if(data=='success'){location.reload()}},'text')
				});
				
			$('.delete').on('click',function(){//删除发出的评论
				$('.send-ensure').attr('comment-id',$(this).attr('comment-id'));
				$('.hide-behind').fadeIn();
				 $('.delete-send').fadeIn();
			})
			$('.send-ensure').click(function(){
					$('.hide-behind').fadeOut();
					$('.delete-send').fadeOut();
					//alert($(this).attr('comment-id'))
 					$.get('comment/del_comment',{id:$(this).attr('comment-id')},
 					function(data){if(data=='success'){location.reload()}},'text')
				});
				
	

		$('.delete-re').on('click',function(){//删除收到的评论
				$('.receive-ensure').attr('comment-id',$(this).attr('comment-id'));
				$('.hide-behind').fadeIn();
				 $('.delete-receive').fadeIn();
			})
			$('.receive-ensure').click(function(){
					$('.hide-behind').fadeOut();
					$('.delete-receive').fadeOut();
					//alert($(this).attr('comment-id'))
 					$.get('comment/del_comment',{id:$(this).attr('comment-id')},
 					function(data){if(data=='success'){location.reload()}},'text')
				});
				









	
});