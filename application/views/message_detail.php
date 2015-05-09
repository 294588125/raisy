<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">
	<link rel="stylesheet" href="assets/front/css/message_common.css">
	<link rel="stylesheet" href="assets/front/css/message_center.css">
	<link rel="stylesheet" href="assets/front/css/message_detail.css">
</head>
<body>
<?php include'person_header.php'?>
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
				<div class="message-detail">					
					<ul>
						<div class="dialogue">
							<p>与<a href="#">&nbsp;小明&nbsp;</a>的对话<a href="message_center.html"><span class="return">返回</span></a></p>
							
						</div>
						<li>
							<div class="name">
								<a href="#"><img src="assets/front/img/noavatar.gif" alt=""></a>
								<div class="content-mess">
									<p class='reply'><a href="#">182 **** 6016</a>&nbsp;|&nbsp;<span>15-01-12 10:33:11</span></p>
									<p class="content-text">hello！！！</p>					
								</div>
							</div>
							<p class='operate'>								
								<a class='answer-show' href="javascript:;">回复</a>
								<a class='delete-show' href="javascript:;">删除</a>
							</p>
						</li>
					</ul>
				</div>
			</div>
						
		</div>
	</div>
	<div class='hide-behind'></div>
	<div class='answer-content'>	
		<div class="answer-header"><h2>发送信息</h2><span class='close'>X</span></div>
		<form action="" method="post" name="answer">
			<div class="content">
				<h2>收件人:someone</h2>
				<textarea name="answer-detail" id="answer-text" cols="30" rows="10"></textarea>
			</div>
			<div class="btn">
				<a href="javascript:;"  class="cancel" type="submit">取消</a>
				<a href="javascript:;"  class="send" type="submit">发送</a>				
			</div>
		</form>

	</div>
	<div class="delete-content">
		<div class="header"><h2>发送信息</h2><span class='close'>X</span></div>
		<div class="content"><p>确定删除？</p></div>
		<div class="btn">
			<a href="javascript:;"  class="cancel" type="submit">取消</a>
			<a href="javascript:;"  class="ensure" type="submit">确定</a>		
		</div>
	</div>
	<div id="page-number">
		<a class="p-number" href="javascript:;">&nbsp;1&nbsp;</a>
	</div>
		<p id ="go-top" ><a href="#"></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src='assets/front/js/message_center.js'></script>
	<script src="assets/front/js/message_common.js"></script>
	
</body>
</html>