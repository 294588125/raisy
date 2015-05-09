<!DOCTYPE html>
<html lang="en">
<head>
	<base  href="<?php echo site_url();?>"/>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">
	<link rel="stylesheet" href="assets/front/css/message_common.css">
	<link rel="stylesheet" href="assets/front/css/send_topic.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
</head>
<body>
	<?php include"person_header.php"?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">消息中心<a href="user/setting">返回个人中心</a></h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li><a href="message/message_center">私信</a></li>
					<li class="selected"><a href="comment/send_topic">发出的话题</a></li>
					<li><a href="comment/send_comment">发出的评论</a></li>
					<li><a href="comment/receive_comment">收到的评论</a></li>					
				</ul>
			</div>
			<div id="news_content">
				<div class="prompt">
					<p class='prompt-sorry'>很抱歉...这是个荒地！</p>
					<p class='prompt-review'>您可以向站内用户发送私信～～</p>
				</div>
				<div class="send-topic">
					<ul>
						<?php foreach($comments as $comment){?>
						<li>
							<div class="name">
								<?php if(!$login_user->img) {?>
								<a href="user/setting"><img src="assets/front/img/noavatar.gif" alt=""></a>
								<?php }else {?>
								<a href="user/setting"><img src="uploads/<?php echo $login_user->img;?>" alt=""></a>
								<?php }?>
								<div class="content-topic">
									<p><a href="#"><?php echo '我';?></a>&nbsp;评论了&nbsp;<a href="#"><?php echo $comment->name;?></a>&nbsp;|&nbsp;<span>15-01-12 10:33:11</span></p>		
									<p class="topic-detail"><?php echo $comment->content;?></p>					
								</div>
							</div>
							<p class='operate'>								
								<a class="delete-comment" comment-id='<?php echo $comment->comment_id;?>'>删除</a>
							</p>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
						
		</div>
	</div>
	<div id="page-number">
		<a class="p-number selected" href="javascript:;">&nbsp;1&nbsp;</a>
	</div>
	<div class='hide-behind'></div>
	<div class="delete-comment-content">
		<div class="header"><h2>删除评论</h2><span class='close'>X</span></div>
		<div class="content"><p>确定删除？</p></div>
		<div class="btn">
			<a href="javascript:;"  class="cancel" type="submit">取消</a>
			<a href="javascript:;"  comment-id=''class="comm-ensure" type="submit">确定</a>		
		</div>
	</div>
	<?php include"footer.php"?>
	
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/message_common.js"></script>
	<script src="assets/front/js/common.js"></script>
</body>
</html>