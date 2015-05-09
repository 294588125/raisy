	<?php include'header.php';?>
	<div id="project-header-behind"></div>  <!-- 占位 header定位空间释放 -->
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
				<h2><?php if(!$login_user->realname){echo $login_user->account;}else{echo $login_user->realname;}?></h2>
				<div class="setting">					
					<a href="user/setting" class="browse">返回个人中心</a>
				</div>			
			</div>
			<span><?php echo $login_user->mark;?></span>
			<div class="location">				
				<p class="lo-01"><i></i><?php echo $login_user->province;?>&nbsp;<?php echo $login_user->city;?></p>
				<!-- <p class="lo-02"><i></i>一天前加入</p> -->
			</div>
		</div>
	</div>