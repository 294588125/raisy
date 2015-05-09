<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">	
	<link rel="stylesheet" href="assets/front/css/receive_comment.css">
	<link rel="stylesheet" href="assets/front/css/message_common.css">
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
					<li><a href="comment/send_topic">发出的话题</a></li>
					<li><a href="comment/send_comment">发出的评论</a></li>
					<li class="selected"><a href="comment/receive_comment">收到的评论</a></li>					
				</ul>
			</div>
			<div id="news_content">
				<div class="prompt">
					<p class='prompt-sorry'>很抱歉...这是个荒地！</p>
					<p class='prompt-review'>您可以向站内用户发送私信～～</p>
				</div>
				<div class="receive-comment">
					<ul>
						<?php foreach($comments as $comment){?>
						<li>
							<div class="name">
								<a href="javascript:;"><img src="assets/front/img/noavatar.gif" alt=""></a>
								<div class="content-comment">
									<p><span><?php echo $comment->account;?></span>&nbsp;|&nbsp;<span></span>回复评论<a href="javascript:;">&nbsp;"呵呵哒"</a></span><?php echo $comment->add_time;?><span></p>
									<p class="comment-detail"><?php echo $comment->content;?></p>						
								</div>
							</div>
							<p class='operate'>								
								<a class="delete-re" comment-id='<?php echo $comment->comment_id;?>'href="javascript:;">删除</a>
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
	<div class="delete-receive">
		<div class="header"><h2>发送信息</h2><span class='close'>X</span></div>
		<div class="content"><p>确定删除？</p></div>
		<div class="btn">
			<a href="javascript:;"  class="cancel" type="submit">取消</a>
			<a href="javascript:;" comment-id='' class="receive-ensure" type="submit">确定</a>		
		</div>
	</div>
	<?php include"footer.php"?>
	
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/message_common.js"></script>
	<script src="assets/front/js/common.js"></script>
</body>
</html>