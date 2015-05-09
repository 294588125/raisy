<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>众筹网-发布项目</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/pub-product.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/common.css">
	<meta charset="UTF-8">
	
</head>
<body>
	<?php include 'header.php'?>
	<div class="dream-tree">
		<p class="text-1">如果你有一颗真诚的心<br>那么请在这里<span>发起你的梦想</span></p>
		<p class="text-2">众筹网是一家可以帮助您实现梦想的网站，在这里您可以发布您的梦想、创意和创业计划，并通过网络平台面对公众集资，<br>让有创造力的人可能获得他们所需要的资金，以便使他们的梦想有可能实现。</p>
		<p class="agreement"> <input id="agree" name="agree" type="checkbox" >阅读并同意众筹网的<a href="">《服务协议》</a><a href="">《众筹公告》</a></p>
		<p>
			<?php
				$login_user=$this->session->userdata("login_user");
				if($login_user){
					$i=1;
				}else{
					$i=0;
				}
			?>
			<input class="login_sign" value="<?php echo $i;?>" style="display: none"/>
			<a id="start-dream" href="product/productnewAdd">发起我的梦想</a>
		</p>
		<div class="tree"><span></span></div>
	</div>
	<?php include 'footer.php'?>
	<div id="toplogo"></div>
	<div id="alert-bg"></div>
	<div id="alert-box">
		<span class="alert-title">&nbsp &nbsp提示
			<a href="javascript:;">X</a>
		</span>
		<span class="alert-content"> &nbsp 您还没有同意众筹网服务协议。</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script type="text/javascript" src="assets/front/js/pub-product.js"></script>
</body>
</html>