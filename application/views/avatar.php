<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">	
	<link rel="stylesheet" href="assets/front/css/personal_common.css">	
	<link rel="stylesheet" href="assets/front/css/setting_avatar.css">	
</head>
<body>	
	<?php include'person_header.php';?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">个人设置</h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li><a href="user/setting">资料修改</a></li>
					<li><a href="user/view_change_pwd">密码修改</a></li>
					<li class="selected" ><a href="javascript:;">头像修改</a></li>
					<li><a href="message/message_center">消息中心</a></li>
					<li><a href="accept_add/manage_address">收件地址管理</a></li>
				</ul>	
			</div>
			<div id="avatar-content">
				<form action="user/upload_avatar"  method="post"  enctype="multipart/form-data" accept-charset="utf-8">
					<?php if(!$login_user->img) {?>
					<img class='change-avatar-img' src = " assets/front/img/noavatar.gif" >
					<?php }else {?>
					<img class='change-avatar-img' src = " uploads/<?php echo $login_user -> img;?>" >
					<?php }?>
					<input class="choose-file" name='userfile' type="file"   >
					<input class='upload-avatar' value="上传" type="submit" />	
					<span>只能上传jpg、jpeg、png格式的图片</span>					
				</form>
			</div>						
		</div>
	</div>
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/comm.js"></script>
	
</body>
</html>