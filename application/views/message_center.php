<!DOCTYPE html>
<html lang="en">
<head>
	<base  href="<?php echo site_url();?>"/>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/personal_common.css">
	<link rel="stylesheet" href="assets/front/css/message_common.css">
	<link rel="stylesheet" href="assets/front/css/message_center.css">
</head>
<body>	
	<?php include"person_header.php"?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">消息中心<a href="user/setting">返回个人中心</a></h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li class="selected"><a href="javascript:;">私信</a></li>
					<li><a href="comment/send_topic">发出的话题</a></li>
					<li><a href="comment/send_comment">发出的评论</a></li>
					<li><a href="comment/receive_comment">收到的评论</a></li>					
				</ul>
			</div>
			<div id="news_content">
				<div class="prompt">
					<p class='prompt-sorry'>很抱歉...这是个荒地！</p>
					<p class='prompt-review'>您可以向站内用户发送私信～～</p>
				</div>
				<div class="message">
					<ul>
						<?php foreach($messages as $message){?>
						<li>
							<div class="name">
								<a href="#"><img src="assets/front/img/noavatar.gif" alt=""></a>
								<div class="content-mess">
									<p class='reply'><a href="#"><?php echo $message->account;?></a>&nbsp;|&nbsp;<span><?php echo $message->add_time;?></span></p>
									<p class="content-text"><?php echo $message->content;?></p>					
								</div>
							</div>
							<p class='operate'>
								<a href="message/message_detail"></a>
								<a class='answer-show' href="javascript:;">回复</a>
								<a class ="delete-show" message-id='<?php echo $message->message_id;?>'href="javascript:;">删除</a>
							</p>
						</li>
						<?php };?>
					</ul>
				</div>
			</div>
						
		</div>
	</div>
	<!-- <div id="page-number">
		<p><?php echo $this->pagination->create_links();?></p>
	</div> -->
	<div class='hide-behind'></div>
	<?php foreach($messages as $message){?>
	<div class='answer-content'>	
		<div class="answer-header"><h2>发送信息</h2><span class='close'>X</span></div>
		<form action="message/reply_message/<?php echo $message->sender;?>" method="post" name="answer">
			<div class="content">
				<h2>收件人:<?php echo $message->account;?></h2>
				<textarea name="answer-detail" id="answer-text" cols="30" rows="10"></textarea>
			</div>
			<div class="btn">
				<a href="javascript:;"  class="cancel" type="submit">取消</a>
				<input  class="send" type="submit" value='发送' />				
			</div>
		</form>

	</div>
	<?php };?>
	<div class="delete-content" >
		<div class="header"><h2>删除私信</h2><span class='close'>X</span></div>
		<div class="content"><p>确定删除？</p></div>
		<div class="btn">
			<a href="javascript:;"  class="cancel" type="submit">取消</a>
			<a href="javascript:;" message-id='1' class="ensure" type="submit">确定</a>		
		</div>
	</div>
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/message_common.js"></script>
	<script src="assets/front/js/message_center.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/comm.js"></script>
	<script>
		
	</script>
</body>
</html>