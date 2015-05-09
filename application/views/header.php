<?php
	$current = $this -> uri -> segment(1);
?>
<div id="header">
	<div class="wrap">
		<img src="assets/front/img/shengdan_logo.png" alt="">
		<ul id="hNav">
			<li class="<?php echo $current=="welcome"?"main-current":"";?>">
				<a href="welcome/index"><span id="shouLogon"class="s-bg"></span>首页</a>
			</li>
			<li class="<?php echo $current=="browse"?"main-current":"";?>">
				<a href="browse/index"><span id="liuLogon"class="s-bg"></span>浏览项目</a>
			</li>
			<li class="">
				<a href="javascript:;"><span id="yuanLogon"class="s-bg"></span>原始会</a>
			</li>
			<li class="<?php echo $current=="product"?"main-current":"";?>">
				<a href="product/pubProduct"><span id="faLogon"class="s-bg"></span>发布项目</a>
			</li>
			<li class="">
				<a href="javascript:;"><span id="jiLogon"class="s-bg"></span>手机众筹</a>
			</li>
		</ul>
		<span id="hSearch">
			<form id="h_search" action='browse/search' method="post">
				<input name="search" wx-validator-placeholder="输入关键词" wx-validator-rule="required" type="text" wx-validator-notip="" placeholder="输入关键词" >
				<input class='sub'type="submit" value=" " ></input>
			</form>
		</span>
		<ul id="hLogin">
			<?php
				$login_user=$this->session->userdata('login_user');
				if(!$login_user){
			?>
			<li class="hRe">
				<a class="hLogin-re" href="javascript:;">注册</a>
			</li>
			<li class="hLoginLo">
				<a href="javascript:;">登录</a>
			</li>
			<?php 
				}else{
			?>
			<li id="userName">
			<?php echo $login_user->account;?><span class="user-img0"></span>
			<ul class='user-list'>
			<li><a href="project/view_all_project_launch"><span class="user-img1"></span>&nbsp项目管理</a></li>
			<li><a href="message/message_center"><span class="user-img2"></span>&nbsp消息中心</a></li>
			<li><a href="user/setting"><span class="user-img3"></span>&nbsp个人设置</a></li>
			<li><a href="user/logout"><span class="user-img4"></span>&nbsp退出</a></li>
			</ul>
			</li>
			<?php
			 	}
			?>
		</ul>
	</div>
</div>
<div id="matteBox"></div>
<div id="login" class="log-reg">
	<div class="inner">
		<p>
			<a class="shut-down-icon Js-pop-close"></a>
		</p>
		<h2>登录</h2>
		<div class="form-item">
			<form action="#" method="post">

				<span class="form-error"></span>
				<div class="row-clearfix">
					<input id="loginUserName" type="text" name="username" wx-validator-rule="required" wx-validator-username-required="用户名不能为空" wx-validator-placeholder="请输入用户名／邮箱／手机号" placeholder="请输入用户名／邮箱／手机号" >
				</div>
				<div class="row-clearfix">
					<input id="loginPWD" type="password" name="user_pwd" wx-validator-rule="required|rangelength" wx-validator-param="|6-16" wx-validator-placeholder="请输入密码" placeholder="请输入密码">
				</div>
				<div class="row-clearfix">
					<p class="p-checked">
						<a class="blue-color  fine-tuning" href="javascript:;">忘记密码?</a>
					</p>
				</div>
				<p class="p-btn">
					<a id="btnLog" class="a-btn" type="submit" href="javascript:;">登录</a>
				</p>
				<p class="p-login">
					使用合作帐号登录
				</p>
				<p class="p-login">
					<a class="weixin" href="#"></a><a class="weibo" href="#"></a>
				</p>
			</form>
		</div>
		<p class="bottom-style">
			还没有帐号？ <a id="switchRegister" href="javascript:;">立即注册</a>
		</p>
	</div>
</div>



<div id="reg" class="log-reg">
	<div class="inner">
		<p>
			<a href="javascript:;"class="shut-down-icon Js-pop-close"></a>
		</p>
		<h2>注册</h2>
		<div class="form-item">
			<form action="#" method="post">

				<span class="form-error"></span>
				<div class="row-clearfix">
					<input id="regName" type="text" name="username" wx-validator-rule="required" wx-validator-username-required="用户名不能为空" wx-validator-placeholder="请输入用户名／邮箱／手机号" placeholder="请输入用户名／邮箱／手机号" >
				</div>
				<div class="row-clearfix">
					<input id="regPwd" type="password" name="user_pwd" wx-validator-rule="required|rangelength" wx-validator-param="|6-16" wx-validator-placeholder="请输入6-16位密码" placeholder="请输入6-16位密码">
				</div>
				<div class="row-clearfix">
					<input id="regPwdA" type="password" name="user_pwd" wx-validator-rule="required|rangelength" wx-validator-param="|6-16" wx-validator-placeholder="请再次输入6-16位密码" placeholder="请再次输入6-16位密码">
				</div>
				<div class="row-clearfix">
					<input id="vCode" name="yanzhengma" wx-validator-rule="required" type="text" class="verification-code" wx-validator-placeholder="请输入图片中的数字" placeholder="请输入图片中的数字">
					<img id="yanImg" src=""   style="border:1px solid #E4E4E4;padding:0;width:140px;cursor:pointer;height:44px;margin-left:20px;float:left;" class="get-verification-code">
					<input id="hid" type="hidden" name="yzm" value="">
				</div>
				<div id="checkBox"class="row-clearfix">
					<p class="p-checked">
						<span id="sb">
							<input id="check"name="article" type="checkbox" checked="" wx-validator-article-nocheck="请阅读协议并勾选同意">
							阅读并同意众筹网的 </span>
						<a id="service"target="_blank" href="#">《服务协议》 </a>
					</p>
				</div>
				<p class="p-btn">
					<a id="btnReg" class="a-btn" type="submit" href="javascript:;">注册</a>
				</p>

			</form>
		</div>
		<p class="bottom-style">
			已有帐号？立即 <a id="switchLogin" href="javascript:;">登录</a>
		</p>
	</div>
</div>