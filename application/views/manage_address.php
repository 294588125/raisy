<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">	
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/manage_address.css">	
</head>
<body> <!-- onload="init()" -->
<?php include'person_header.php'?>
	<div id="person-content">
		<div class="setting">			
			<h1 class="header">个人设置</h1>
			<div class="sidebar">
				<ul class='setting-list'>
					<li><a href="user/setting">资料修改</a></li>
					<li><a href="user/view_change_pwd">密码修改</a></li>
					<li><a href="user/view_avatar">头像修改</a></li>
					<li><a href="message/message_center">消息中心</a></li>
					<li  class="selected"><a href="javascript:;">收件地址管理</a></li>
				</ul>	
			</div>
			<div id="manage-address">				
				<h3>收件地址管理</h3>
				<p>可添加管理多个收件地址，以便收取回报时使用</p>
				<a class='add-address' href="javascript:;">添加地址</a>
				<a class='return none' href="javascript:;">返回</a>
				<!-- <form action="accept_add/ajax_manage_address" method="post" name="creator" >					 -->
					<div  class="new-address none">						
						<div class="address-information">
							<label>收件人:</label>
							<input class="addressee required"  type="text">
						</div>
						<div class="address-information">
							<label>手机:</label>
							<input class ="addressee-tel required" name='addressee-tel' type="text">
						</div>
						<div class="address-information location">
							<label>所在地:</label>
							<input class="address-province " name="province" type="text" />
							<input class="address-city required" name="city" type="text" />
						</div>
						<div class="address-information">
							<label>详细地址:</label>
							<input class="address-detail required" type="text">
						</div>
						<div class="address-information">
							<label>邮编:</label>
							<input class ="postalcode required"  type="text">
						</div>
						<input class="save-address save"  type="button" value="保存">
						<input class="save-address save-again" addId='' type="button" value="保存again">
					</div>

				<!-- </form>  -->
				
				<div class="exist-address">
					<table border="0" >
						<colgroup>
	                        <col width="8%">
	                        <col width="25%">
	                        <col width="25%">
	                        <col width="10%">
	                        <col width="17%">
	                        <col width="15%">
                   		 </colgroup>
						<tr>
							<th>收件人</th>
							<th>所在地区</th>
							<th>详细地区</th>
							<th>邮编</th>
							<th>电话或手机</th>
							<th>操作</th>
						</tr>
						<?php foreach ($addresses as $address){ ?>
						<tr>
							<th><?php echo $address->addressee;?></th>
							<td><?php echo $address->province;?><?php echo $address->city;?></td>
							<td><?php echo $address->address_detail;?></td>
							<td><?php echo $address->postalcode;?></td>
							<td><?php echo $address->accept_tel;?></td>
							<td><a addId='<?php echo $address->add_id;?>' class="edit" href="javascript:;" type="button">编辑</a><a addId='<?php echo $address->add_id;?>' class="del" href="javascript:;" typt="button">删除</a></td>
						</tr>
						<?php }?>
					</table>
					
				
			</div>
			</div>						
		</div>
	</div>
	
	<div id="page-number">
			<p><?php echo $this->pagination->create_links();?></p>
	</div>
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/manage_address.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/comm.js"></script>
	
</body>
</html>