<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>众筹网-发布项目-step-one</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/productreturnAdd.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/common.css">
	<meta charset="UTF-8">
</head>
<body>
	<?php include 'header.php'?>
	<div id="kong"></div>
	<div class="progress"><span></span>
	</div>
	<div class="content">
		<p class="infor-title">项目信息</p>
		<table id="return">
			<tr class="table-title">
				<td style="width: 40px">回报</td>
				<td style="width: 80px">支持金额</td>
				<td style="width: 290px">回报内容</td>
				<td style="width: 60px">操作</td>
			</tr>
			
		</table>
		<p class="infor-return">支持回报选项02</p>
		<form class="product-information" action="" method="">
			<div class="all-infor">
				<label class="infor-name">支持金额：</label>
				<input name="money" class="get-pro-money" type="text">元
				<span class="money-error-text error-text" style="display:none">不能为空</span>
			</div>
			<div class="all-infor return-intro">
				<label class="infor-name">汇报内容：</label>
				<textarea class="wx-inputErrBorder" name="description" wx-validator-rule="required|maxLength" wx-validator-param="|500" wx-validator-placeholder="请填写关于回报或任何你希望项目发起人知道的信息,不多于500字" maxlength="500" placeholder="请填写关于回报或任何你希望项目发起人知道的信息,不多于500字"></textarea>
				<span class="content-error-text error-text" style="display:none">不能为空</span>
			</div>
			<div class="all-infor return-pro-id">
				<label class="infor-name">项目编号：</label>
				<input class="project-id1" value="<?php echo $project_id;?>" />
				<span class="content-error-text error-text" style="display:none">不能为空</span>
			</div>
			<div class="all-infor return-number">
				<label class="infor-name">回报编号：</label>
				<input class="return-num" value="<?php echo 0;?>" />
			</div>
			<div class="all-infor">
				<span class="save">
					<a class="save-is" href="javascript:;">保存</a>
				</span>
				<span class="step">
					<a  class="prev" href="javascript:;">上一步</a>
					<a  class="next" href="javascript:;">下一步</a>
				</span>
			</div>
		</form>
		<div id="preview">
			<div>
				<h3>温馨提示</h3>
				<p class="hint">3个以上的回报</p>
				<p class="hint-content">多些选择能提高项目的支持率。</p>
				<p class="hint">几十、几百、上千元的支持</p>
				<p class="hint-content">3个不同档次的回报，能让你的项目 更快成功。</p>
				<p class="hint">回报最好是项目的衍生品</p>
				<p class="hint-content">与项目内容有关的回报更能吸引到大家的支持。</p>

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
			<a href="javascript">X</a>
		</span>
		<span class="alert-content"> &nbsp 保存成功！</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script type="text/javascript" src="assets/front/js/productreturnAdd.js"></script>
</body>
</html>