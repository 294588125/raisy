$(function(){
	$('.type .unselected a').hover(function(){
		$(this).css({'color':'#55acef'});
	},function(){
		$(this).css({'color':'#333'});
	});
	
	
	
	$('.cancel-like').on('click',function(){
		$.get('project/cancel_like_project',{
			project_id:$(this).attr('projectId')
		},function(data){
			if(data=='success'){
				alert('取消成功');
				location.reload();
			}
		},'text');
	})

	
});