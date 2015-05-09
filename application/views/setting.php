<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>

	<link rel="stylesheet" href="assets/front/css/personal_common.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/setting.css">
	
	
</head>

<body onload="init()">      
    <?php include'person_header.php'?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">个人设置</h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li class="selected"><a href="javascript:;">资料修改</a></li>
					<li><a href="user/view_change_pwd">密码修改</a></li>
					<li><a href="user/view_avatar">头像修改</a></li>
					<li><a href="message/message_center">消息中心</a></li>
					<li><a href="accept_add/manage_address">收件地址管理</a></li>
				</ul>
			</div>
			<div id="setting-content">
				<form  action="user/do_setting" method="post" name="creator" >
					<div class="basic-information">
						<label for="tel">手机:</label>
						<span><?php echo $login_user->account;?></span>
					</div>
					<div class="basic-information">
						<label for="name">用户名:</label>
						<input name="user_na" type="text" class="user-na" value="<?php if(!$login_user->realname){echo $login_user -> account;}else{echo $login_user->realname;} ?>">
					</div>
					<div class="basic-information">
						<label for="gender">性别:</label>						
						<label><input class="sex-input" type="radio" name='sex' value="男" <?php if($login_user->sex == '男' || $login_user->sex == ''){echo "checked='checked'";} ?> value="男"> 男</label>
						<label><input class="sex-input" name='sex' type="radio" <?php if($login_user->sex == '女'){echo "checked='checked'";}?> value="女"> 女</label>
						<label><input id='secret' class="sex-input" name='sex' type="radio" <?php if($login_user->sex == '保密'){echo "checked='checked'";}?> value="保密"> 保密</label>
					</div>
					<div class="basic-information">
						<label for="location">所在地:</label>
						<select class='person-province' name="province" onChange = "select()">
						<?php if($login_user->province){?>
							<option selected='selected' value="<?php echo $login_user->province?>">
								<?php echo $login_user->province; ?>
							</option>
							<?php }?>
						</select>
	                    <select class='person-city' name="city" onChange = "select()">
	                    <?php if($login_user->city){?>
	                    	<option selected='selected' value="<?php echo $login_user->city?>">
	                    		<?php echo $login_user->city; ?>
	                    	</option>
	                    <?php }?>
	                    </select>
					</div>
					<div class="basic-information-intro">
						<label for="intro">个人说明</label>
						<textarea name="intro" id='personIntro' class="introduce" cols="30" rows="10" placeholder="您的介绍将更有效的帮助支持者了解您和您项目的背景"><?php echo $login_user->mark?></textarea>
					</div>	
					<input id='oBtn' type="button" value="保存" class='save'>				
				</form>
			</div>			
		</div>
	</div>
	
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/setting.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/comm.js"></script>
</body>
</html>