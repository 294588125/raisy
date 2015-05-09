<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>众筹网-发布项目-step-one</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/productnewAdd.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/common.css">
	<meta charset="UTF-8">
	<script src="../../../zhongchou/datepicker/WdatePicker.js" ></script> 
</head>
<body onload="init()">
	<?php include 'header.php'?>
	<div id="kong"></div>
	<div class="progress"><span></span>
	</div>
	<div class="content">
		<p class="infor-title">项目信息</p>
		<form class="product-information" name='creator' action="" method="">
			<div class="all-infor pro-id">
				<label class="infor-name">项目编号：</label>
				<input name="name" class="get-pro-id" type="text" value="<?php echo $project->project_id;?>">
			</div>
			<div class="all-infor">
				<label class="infor-name">项目名称：</label>
				<input name="name" class="get-pro-name" type="text" value="<?php echo $project->name;?>"   maxlength="40" placeholder="项目名称不能超过40个字">
				<span class="error-text name-error-text" style="">不能为空</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">筹集金额：</label>
				<input name="money" class="get-pro-money" type="text" value="<?php echo $project->raise_money;?>" placeholder="不少于500元"><em>元</em><span class="error-text money-error-text" >不少于500元</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">开始日期：</label>
				<input name="start-time" class="get-pro-start-time" type="text" onclick="WdatePicker();"  value="<?php echo $project->start_time;?>">
				<span class="error-text start-error-text" >请选择正确日期</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">结束日期：</label>
				<input name="end-time" class="get-pro-end-time" type="text" onclick="WdatePicker();"  value="<?php echo $project->end_time;?>">
				<span class="error-text end-error-text" >筹金期限为10-90天</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">类别：</label>
				<ul class="pro-type-box">
					
					<li class="<?php if($project -> pro_type_id == 2){echo 'current-type';} ?>" value="2" >科技</li>
					<li class="<?php if($project -> pro_type_id == 4){echo 'current-type';} ?>" value="4" >公益</li>
					<li class="<?php if($project -> pro_type_id == 6){echo 'current-type';} ?>" value="6" >出版</li>
					<li class="<?php if($project -> pro_type_id == 5){echo 'current-type';} ?>" value="5" >娱乐</li>
					<li class="<?php if($project -> pro_type_id == 1){echo 'current-type';} ?>" value="1" >艺术</li>
					<li class="<?php if($project -> pro_type_id == 3){echo 'current-type';} ?>" value="3" >农业</li>
					<li class="<?php if($project -> pro_type_id == 7){echo 'current-type';} ?>" value="7" >商铺</li>
					<li class="<?php if($project -> pro_type_id == 9){echo 'current-type';} ?>" value="9" >地方站</li>
					<li class="<?php if($project -> pro_type_id == 10){echo 'current-type';} ?>" value="10" >众筹制造</li>
					<li class="<?php if($project -> pro_type_id == 8){echo 'current-type';} ?>" value="8" >其他</li>
				</ul>
			</div>
			<div class="all-infor">
				<label class="infor-name">项目地点：</label>
				<select class="province"  name="province" onChange = "select()" value="">
				<option ></option>
				
				</select>
				<select class="city"  name="city" onChange = "select()"  value="">
				<option ></option>
				
				</select>
				<span class="error-text place-error-text">请选择地点</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">项目封面：</label>
				<div class="pro-cover">
					<input class="product-cover" type="file" style="">
					<a>上传封面</a>
				</div>
				<span class="cover-rule">支持jpg、jpeg、png，大小不超过5M。建议尺寸：640 x</span>
			</div>
			<div class="all-infor">
				<label class="infor-name">视频：</label>
				<input class="vedio" value="<?php echo $project_intro->pro_video;?>" placeholder="请输入优酷视频的播放页地址">
			</div>
			<div class="all-infor pro-intro">
				<label class="infor-name">项目简介：</label>
				<textarea placeholder="不超过75个字"><?php echo $project_intro->intro;?></textarea>
				<span class="error-text content-error-text">不能为空</span>
			</div>
			<div class="all-infor pro-clearfix">
				<label class="infor-name">项目详情：</label>
				<textarea>
					<?php echo $project_intro->detail;?>
				</textarea>
			</div>
			<div class="all-infor">
				<a class="next" href="javascript:;">下一步</a>
			</div>
		</form>
		<div id="preview">
			<p>预览区域</p>
			<div>
				<a class="preview-cover" href=""><img src="assets/front/img/no-cover.jpg"></a>
				<h3 class="show-pro-name"><a class="pro-name"  href="#"><span  value=""><?php echo $project->name;?></span></a></h3>
				<div class="show-pro-infor">目标时间：
					<span class="start"  value=""><?php echo $project->start_time;?></span>&nbsp &nbsp至<br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<span class="end"  value=""><?php echo $project->end_time;?></span><br>
					目标筹金：<span class="pro-money" ><?php echo $project->raise_money;?></span>元
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
		<span class="alert-content"> &nbsp 修改成功！</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script type="text/javascript" src="assets/front/js/productReturnPrev.js"></script>
	<script src='assets/front/js/setting.js'></script>
</body>
</html>