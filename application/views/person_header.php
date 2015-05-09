 <div id="header-contain"></div>      
		<?php include'header.php';?>
	<div id="person-message">
		<div class="avatar">
			<?php if(!$login_user->img) {?>
			<a href="user/setting"><img class='avatar-img' src="assets/front/img/noavatar.gif" alt=""></a>
			<?php }else {?>
			<a href="user/setting"><img class='avatar-img' src="uploads/<?php echo $login_user->img;?>" alt=""></a>
			<?php }?>
		</div>				
		<div class="introduce">
			<div class="information-setting">
				<h2><?php if(!$login_user->realname){ echo $login_user->account;}else{ echo $login_user->realname;};?></h2>
				<div class="setting">
					<a href="project/view_project_support" class="browse">支持的项目</a>				
					<a href="project/view_all_project_launch" class="browse">发起的项目</a>
					<a href="project/view_project_like" class="browse">喜欢的项目</a>
				</div>			
			</div>
			<span><?php echo $login_user->mark;?></span>
			<div class="location">				
				<p class="lo-01"><i></i><?php echo $login_user->province;?>&nbsp;<?php echo $login_user->city;?></p>
				<!-- <p class="lo-02"><i></i>一天前加入</p> -->
			</div>
		</div>
	</div>