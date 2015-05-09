<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">	
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/setting_pwd.css">	
</head>
<body>
 <?php include'person_header.php'?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">个人设置</h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li><a href="user/setting">资料修改</a></li>
					<li class="selected" ><a href="javascript:;">密码修改</a></li>
					<li><a href="user/view_avatar">头像修改</a></li>
					<li><a href="message/message_center">消息中心</a></li>
					<li><a href="accept_add/manage_address">收件地址管理</a></li>
				</ul>	
			</div>
			<div id="pwd-content">
				<!-- <form action="" method="post"> -->
					<div class="pwd">
						<label>原始密码</label>
						<input class="memory-original-pwd" type='hidden' value="<?php echo $login_user->password;?>" />
						<input id="original-pwd" type="password">
					</div>
					<div class="pwd">
						<label>新密码</label>
						<input id ="new-pwd" type="password">
					</div>
					<div class="pwd">
						<label>确认密码</label>
						<input id="ensure-pwd" type="password">
					</div>
					<input type="button" class="save save-pwd" value="保存">
				<!-- </form> -->
			</div>						
		</div>
	</div>
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/setting_pwd.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/comm.js"></script>
</body>
</html>