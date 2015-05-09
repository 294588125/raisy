<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>众筹网-发布项目-step-one</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/productnewAdd.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/common.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/newAddProCity.css" />
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="../../../zhongchou/datepicker/WdatePicker.js" ></script> 
	<meta charset="UTF-8">
</head>
<body onload="init()">
	<?php include 'header.php'?>
	<div id="kong"></div>
	<div class="progress"><span></span>
	</div>
	<div class="content">
		<p class="infor-title">项目信息</p>
		<form class="product-information" action="" method="" name="creator">
			<div class="all-infor">
				<label class="infor-name">项目名称：</label>
				<input name="name" class="get-pro-name" type="text" wx-validator-rule="required|maxLength" wx-validator-param="|40" wx-validator-placeholder="项目名称不能超过40个字" wx-validator-name-maxlength="项目名称不能超过40个字" value="" maxlength="40" placeholder="项目名称不能超过40个字">
				<span class="error-text name-error-text" style="">不能为空</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">筹集金额：</label>
				<input name="money" class="get-pro-money" type="text" placeholder="不少于500元"><em>元</em><span class="error-text money-error-text" >不少于500元</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">开始日期：</label>
				<input name="start-time" class="get-pro-start-time" onclick="WdatePicker();" type="text">
				<span class="error-text start-error-text" >请选择正确日期</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">结束日期：</label>
				<input name="end-time" class="get-pro-end-time" onclick="WdatePicker();" type="text">
				<span class="error-text end-error-text" >筹金期限为10-90天</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">类别：</label>
				<ul class="pro-type-box">
					<li class="current-type" value="2" >科技</li>
					<li  value="4" >公益</li>
					<li  value="6" >出版</li>
					<li  value="5" >娱乐</li>
					<li  value="1" >艺术</li>
					<li  value="3" >农业</li>
					<li  value="7" >商铺</li>
					<li  value="9" >地方站</li>
					<li  value="10" >众筹制造</li>
					<li  value="8" >其他</li>
				</ul>
			</div>
			<div class="all-infor">
				<label class="infor-name">项目地点：</label>
				<select class='province' name="province" onChange = "select()"></select>
	    		<select class='city' name="city" onChange = "select()"></select>
				<span class="error-text place-error-text">请选择地点</span>
			</div>
			<iframe id="upiframe" scrolling="no" src="product/up_picture" frameborder="0" height="55px" width="100%"></iframe>
			<div class="all-infor">
				<label class="infor-name">视频：</label>
				<input class="vedio" placeholder="请输入优酷视频的播放页地址">
			</div>
			<div class="all-infor pro-intro">
				<label class="infor-name">项目简介：</label>
				<textarea placeholder="不超过75个字"></textarea>
				<span class="error-text content-error-text">不能为空</span>
			</div>
			<div class="all-infor pro-clearfix">
				<label class="infor-name">项目详情：</label>
				<textarea>
					&lt;p&gt;向支持者介绍你自己或你的团队，并详细说明你与所发起的项目之间的背景，让支持者能够在最短时间内了解你，以拉近彼此之间的距离。&lt;/p&gt;
					&lt;h2&gt;我想要做什么（也可使用个性化小标题）&lt;/h2&gt;
					&lt;p&gt;这是项目介绍中最关键的部分，建议上传5张以上高清图片（宽700、高不限），配合文字来简洁生动地说明你的项目，让支持者对你要做的事情一目了然并充满兴趣。&lt;/p&gt;
					&lt;h2&gt;为什么我需要你的支持及资金用途（也可使用个性化小标题）&lt;/h2&gt;
					&lt;p&gt;请在这一部分说明你的项目不同寻常的特色，为什么需要大家的支持以及详细的资金用途，这会增加你项目的可信度并由此提高筹资的成功率。&lt;/p&gt;
					&lt;h2&gt;可能存在的风险（也可使用个性化小标题）&lt;/h2&gt;
					&lt;p&gt;请在此标注你的项目在实施过程中可能存在的风险，让支持者对你的项目有全面而清晰的认识。&lt;/p&gt;
				</textarea>
			</div>
			
			<div class="all-infor pro-agreement" >
				<input class='check-box' type="checkbox" >
				<span class="agreement-intro">项目成功后，筹资金额的1.5%将被扣除，作为第三方支付平台的手续费。</span>
				<a href="">《服务协议》</a>
				<span class="agreement-error">请阅读协议并勾选同意</span>
			</div>
			<div class="all-infor">
				<a class="next" href="javascript:;">下一步</a>
			</div>
		</form>
		<div id="preview">
			<p>预览区域</p>
			<div>
				<iframe id="ifra" scrolling="no" src="product/pre_picture" frameborder="0"  height="175px" width="230px"></iframe>
				<!-- <a class="preview-cover" href=""><img id="up_img" src="assets/front/img/no-cover.jpg"></a> -->
				<h3 class="show-pro-name"><a class="pro-name" href="#"><span></span></a></h3>
				<div class="show-pro-infor">目标时间：
					<span class="start"></span>&nbsp &nbsp至
					<span class="end"></span><br>
					目标筹金：<span class="pro-money"></span>元
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'?>
	<div id="toplogo"></div>
	<div id="alert-bg"></div>
	<div id="alert-box">
		<span class="alert-title">&nbsp &nbsp提示
			<a href="javascript:;">X</a>
		</span>
		<span class="alert-content"> &nbsp 您填写的部分内容不符合规范</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<div id="alert-box-ok">
		<span class="alert-title">&nbsp &nbsp提示
			<a href="javascript:;">X</a>
		</span>
		<span class="alert-content"> &nbsp 保存成功！</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<script>
	// alert($('#upiframe').attr('data-num'));
	$('#upiframe').load(function(){
		// $(this).attr('data-num','2');
		$('#ifra').attr('src',$('#ifra').attr('src'));
	});
	// alert($('#upiframe').attr('data-num'));
		
	</script>
	<script src="assets/front/js/common.js"></script>
	<script type="text/javascript" src="assets/front/js/productnewAdd.js"></script>
	<script type="text/javascript" src="assets/front/js/up_picture.js"></script>
	<script src='assets/front/js/setting.js'></script>
</body>
</html>