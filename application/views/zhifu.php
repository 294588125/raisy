<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支付网页</title>
	<base href = "<?php echo site_url(); ?>">
	<link rel="stylesheet" href="assets/front/css/zhifu.css">
	<link rel="stylesheet" href="assets/front/css/tanceng.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<!-- <link rel="stylesheet" href="assets/front/css/common.css"> -->
</head>
<body>
	<!-- <?php $login_user=$this->session->userdata('login_user');?> -->
	<!-- <?php include 'header.php'?> -->
	<!-- <div id="kb"></div> -->
	<?php include "header.php" ?>
	<div style="height: 60px;width: 100%;"></div>
	<div id="matteBox"></div>
	<div id="kuang"> 
		<div class="tit">
			<h3>添加新地址</h3>
			<a class="shut-down-icon close Js-pop-close" style="position: absolute;top: 10px;right: 10px;"></a>
		</div>
		<form class="form-content" action="user/save_personal_information" method="post">
			<div class="form-hang">
				<label>收件人：</label>
				<input type="text" name="consignee" wx-validator-rule="required" value="">
			</div>
			<div class="form-hang">
				<label>手机：</label>
				<input type="text" name="mobile" wx-validator-rule="required|mobile" wx-validator-mobile-mobile="号码不正确" value="">
			</div>
			<div class="form-hang">
				<label>所在地：</label>
				<div class="option-box"> 
					<select name="province" class="fl" wx-validator-error-value="请选择"> 
						<option data-id="-1" value="请选择">请选择</option>
						<option data-id="3" value="安徽">安徽</option>
						<option data-id="396" value="澳门">澳门</option>
						<option data-id="52" value="北京">北京</option>
						<option data-id="4" value="福建">福建</option>
						<option data-id="5" value="甘肃">甘肃</option>
						<option data-id="6" value="广东">广东</option>
						<option data-id="7" value="广西">广西</option>
						<option data-id="8" value="贵州">贵州</option>
						<option data-id="9" value="海南">海南</option>
						<option data-id="10" value="河北">河北</option>
						<option data-id="12" value="黑龙江">黑龙江</option>
						<option data-id="11" value="河南">河南</option>
						<option data-id="13" value="湖北">湖北</option>
						<option data-id="14" value="湖南">湖南</option>
						<option data-id="16" value="江苏">江苏</option>
						<option data-id="17" value="江西">江西</option>
						<option data-id="15" value="吉林">吉林</option>
						<option data-id="18" value="辽宁">辽宁</option>
						<option data-id="19" value="内蒙古">内蒙古</option>
						<option data-id="20" value="宁夏">宁夏</option>
						<option data-id="21" value="青海">青海</option>
						<option data-id="22" value="山东">山东</option>
						<option data-id="321" value="上海">上海</option>
						<option data-id="23" value="山西">山西</option>
						<option data-id="24" value="陕西">陕西</option>
						<option data-id="26" value="四川">四川</option>
						<option data-id="397" value="台湾">台湾</option>
						<option data-id="343" value="天津">天津</option>
						<option data-id="395" value="香港">香港</option>
						<option data-id="28" value="西藏">西藏</option>
						<option data-id="29" value="新疆">新疆</option>
						<option data-id="30" value="云南">云南</option>
						<option data-id="31" value="浙江">浙江</option>
						<option data-id="394" value="重庆">重庆</option>
					</select>
					<select name="city" class="fl" wx-validator-error-value="请选择"> 
						<option data-id="-1" value="请选择">请选择</option> 
					</select> 
					<span id="wx-validator-province-error" class="error-text" style="display:none">请选择</span> 
					<span id="wx-validator-city-error" class="error-text" style="display:none">请选择</span> 
				</div>
			</div>
			<div class="form-hang">
				<label>详细地址：</label>
				<input type="text" class="ads-ipt" name="address" wx-validator-rule="required" value="">
			</div>
			<div class="form-hang">
				<label>邮编：</label>
				<input type="text" name="zip" wx-validator-rule="post" value="">
			</div>
			<div class="form-hang">
				<label>设置为默认：</label>
				<input type="radio" name="is_def" value="1" checked="">
				是 
				<input type="radio" name="is_def" value="0">
				否
			</div>
			<div class="btn">
				<a class="cancel close" href="javascript:;"> 取消 </a>
				<a class="save" href="javascript:;" type="submit"> 保存 </a>
			</div>
		</form>
	</div>
	
	<div id="head" class="wrap">
		<p>确认收货地址</p>
	</div>
	<div id="new" class="wrap">
		<div id="newadress"></div>
	    <a href="javascript:;" class="newad" >添加新地址</a>
	</div>
	<div id="pay_detail" class="wrap">
		<p>确认支付详情</p>
	</div>

    <div id="supdtl-head" class="wrap">
			<span class="pos1">项目名称</span>
            <span class="pos2">回报内容</span>
            <span class="pos3">支持金额</span>
            <span class="pos4">配送费用</span>
            <span class="pos5">预计回报发送时间</span>
		</div>
	<div id="supdtl" class="wrap">
		

		<div class="supdtl-cont">
            <div class="supdtl-cont-tp">
                <span class="pos1">昔木小学浴室计划 给孩子一个清爽的夏天</span>
                <span class="pos2">支持1000元，您将收到学生精心准备的抽象画作及感谢明信片及学校照片​。</span>
                <span class="pos3" style="color:red">￥1,000</span>
                <span class="pos4">免费</span>
                <span class="pos5">项目成功结束后立即发送</span>
             </div>
             <div class="supdtl-cont-bot">          给项目发起人留言
             	 <textarea name="memo"></textarea>
             </div>
        </div>
	</div>
	<div id="fangshi" class="wrap">
		<button>
			<p>确认支付</p>
		</button>
	</div>

		
	</div>
	<?php include "footer.php" ?>
    <script src = "assets/front/js/jquery-1.10.2.min.js"></script>
    <!-- <script src = "assets/front/js/tanceng.js"></script> -->
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/zhifu.js"></script>
	<script>
		$(function(){
			$('.ok').on('click',function(){
				$.get('user/save_personal_information',{
					mobile:$('#mobile').val(),
					province:$('#province').val(),
					city:$('#province').val(),
					detail:$('#detail').val(),
					youbian:$('#youbian').val(),
					addressee:$('#addressee').val()
				},function(data){
					if(data=='success'){
						alert('信息保存成功');
						$('#new').val($data);
						location.reload();
					}else if(data=='fail'){
						alert('信息保存失败');
					}
				},"text");
			});
		});
	</script>
</body>
</html>