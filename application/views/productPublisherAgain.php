<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>众筹网-中国最具影响力的众筹平台</title>
	<base href="<?php echo site_url();?>" >
	<meta name="keywords" content="众筹 创业 项目 投资 支持">      
	<link rel="stylesheet" type="text/css" href="assets/front/css/project.css">
	<link rel="stylesheet" type="text/css" href="assets/front/css/launch.css">     
	<link rel="stylesheet" type="text/css" href="assets/front/css/common.css">                                  
</head>
<body onload="init()">
	<?php include 'header.php'?>
	<div id="kong"></div>
	<div class="process">
		<div class="project-edit-nav"><h3 class="steps-3">发起人信息</h3></div>
	</div>
	<div class="main clearfix">
	    <form id="project_auth" name="creator" action="javascript:;" method="post" >
		<div class="process-wrap clearfix">
				<div class="tit-wrap">
					<h3>发起人信息</h3>
				</div>
				<div class="project-box">
					<div class="project-con fl w760">					
						<div class="project-msg">
							<div class="form-item clearfix">
								<label>项目编号：</label>
								<input type="text" class="w198 wx-inputErrBorder project_id" value="<?php echo $project_id;?>">
							</div>		
							<div class="form-item clearfix">
								<label>发起人编号：</label>
								<input type="text" class="w198 wx-inputErrBorder publisher_id" value="<?php echo $publisher->publisher_id;?>">
							</div>					
							<div class="form-item clearfix">
								<label>真实姓名：</label>
								<input type="text" class="w198 wx-inputErrBorder publisher-name" value="<?php echo $publisher->pub_name?>" >
								<span class="error-text name-error-text" style="">不能为空</span>
							</div>
							<div class="form-item clearfix">
								<label>所在地：</label>
								<div class="option-box">
								<select class="province"  name="province" onChange = "select()" value="">
									</select>
									<select class="city"  name="city" onChange = "select()"  value="">
									</select><span class="error-text place-error-text">请选择地点</span>
									</div>
								
							</div>
							<div class="form-item clearfix">
								<label>移动电话：</label>
								<input type="text" class="w198 publisher-tel" value="<?php echo $publisher->pub_tel;?>" name="ex_contact" wx-validator-rule="required|mobile">
								<span class="error-text tel-error-text" style="">不能为空</span>
							</div>
							<div class="form-item-tit">补充打款信息</div>
							
							<div class="form-item clearfix">
								<label>银行名称：</label>
								<input class="inp-418 bank-name" type="text" value="<?php echo $publisher->bank_name;?>" name="bank_name" wx-validator-rule="required">
								<span class="error-text bank-name-error-text" style="">不能为空</span>
							</div>
							<div class="form-item clearfix">
								<label>开户支行：</label>
								<input class="inp-418 part-bank" type="text" value="<?php echo $publisher->bank_add;?>" name="bank" wx-validator-rule="required">
								<span class="error-text part-bank-error-text" style="">不能为空</span>
							</div>
							<div class="form-item clearfix">
								<label>开户名称：</label>
								<input class="inp-418 open-name" type="text" value="<?php echo $publisher->bank_person_name;?>" name="bank_user_name" wx-validator-rule="required">
								<span class="error-text open-name-error-text" style="">不能为空</span>
							</div>
							<div class="form-item clearfix">
								<label>银行账号：</label>
								<input class="inp-418 bank-count" type="text" value="<?php echo $publisher->bank_account;?>" name="bank_card" wx-validator-rule="required">
								<span class="error-text bank-count-error-text" style="">不能为空</span>
							</div>
							<div class="action tc">
								<a class="btn-effect-blue btn-sub w170 prev-return" href="javascript:;">上一步</a>
								<a id="Js-save" href="javascript:void(0);" class="btn-effect-blue btn-sub w170 alter-publisher">保存修改</a>
								<a id="Js-send" href="javascript:void(0);" class="btn-effect-blue btn-sub w170 pub-product">提交审核</a>
							</div>
						</div>
					</div>
					
					<input type="hidden" name="savenext" value="1">
					<input type="hidden" value="1" name="ajax">
					<input type="hidden" name="id" value="70411">
					<input id="submit_check" type="hidden" name="submit_check" value="0">
						
				</div>
			<div class="sidebar w413 fr">
				<div class="reminder fs14">
						<h3>温馨提示</h3>
						<p>请仔细填写本页信息，确保项目成功后能快速并准确的为您打款。</p>
				</div>

			</div>
		</div>
	</form>
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
	<div id="alert-box-pub">
		<span class="alert-title">&nbsp &nbsp提示
			<a href="javascript:;">X</a>
		</span>
		<span class="alert-content"> &nbsp 请保存修改！</span>
		<span class="alert-sure">
			<a href="javascript:;">确定</a>
		</span>
	</div>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script type="text/javascript" src="assets/front/js/productPublisher.js"></script>
	<script src='assets/front/js/setting.js'></script>
</body>
</html>