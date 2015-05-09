<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="assets/front/css/personal_common.css">
	<link rel="stylesheet" href="assets/front/css/project_common.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/project_like.css">
	<link rel="stylesheet" href="assets/front/css/project_support.css">
	
</head>
<body>
<?php include"person_project_header.php"?>
	<div id="project-like">
		<div class="type">
			<ul>				
				<li class="selected" ><a href="javascript:;">支持的项目<?php echo $support_sum->support_sum; ?></a></li>
				<li class="unselected"><a href="project/view_all_project_launch">发起的项目<?php echo $launch_sum->launch_sum; ?></a></li>
				<li class="unselected"><a href="project/view_project_like">喜欢的项目<?php echo $like_sum; ?></a></li>
			</ul>
		</div>
		<div class="content">			
			<table>
				<colgroup>
	              <col width="40%">
	              <col width="16%">
	              <col width="16%">
	              <col width="15%">
	             </colgroup>
				<tbody>
					<tr class="title">
						<th>项目名称</th>
						<th>支持时间</th>
						<th>支持金额</th>	
						<th>操作</th>						
					</tr>
					<?php foreach($projects as $project) {?>
					<tr>
						<td class='name'>						
								<a href="project/index/<?php echo $project->project_id;?>"><img src="uploads/<?php echo $project->pro_cover;?>" alt=""></a>
								<a href="project/index/<?php echo $project->project_id;?>"><p><?php echo $project->name;?></p></a>
								<br/><br/>	
								<span>发起人:&nbsp;</span><span class="launcher-information" ><?php if(!$project->realname){echo $project->account;}else{echo $project->realname;}?></span>
								<div class="launcher-information-detail" >
									<i class="launcher-information-shrill"></i>
									<p>昵称：&nbsp;<?php if(!$project->realname){echo $project->account;}else{echo $project->realname;}?></p>
									<p>地区：&nbsp;<?php echo $project->province;?>&nbsp;<?php echo $project->city;?></p>
									<p>电话：&nbsp;<?php echo $project->account;?></p>
								</div>
						</td>
						<td><p><?php echo $project->add_time;?></p></td>
						<td><p><?php echo $project->support_money;?></p></td>						
						<td class ="support-operate">	
							<a class="repay-detail" >回报内容</a>&nbsp;						
							<div class = "repay-detail-information" >
								<i class="repay-detail-shrill"></i>
								<h4 class="repay-detail-title">回报内容</h4>
								<p><?php echo $project->support_report;?></p>
							</div>
							<a class="take-good-address">收货地址</a>	
							<div class = "take-good-address-detail" >
								<i class="take-good-address-shrill"></i>
								<h4 class="take-good-address-title">收货地址</h4>
								<p>收件人：&nbsp;<?php echo $project->addressee;?></p>
								<p>手机号：&nbsp;<?php echo $project->accept_tel;?></p>
								<p>地址：&nbsp;<?php echo $project->address_detail;?></p>
								<p>邮编：&nbsp;<?php echo $project->postalcode;?></p>
							</div>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		
	</div>
	<div id="page-number">
		<p><?php echo $this->pagination->create_links();?></p>
	</div>
	<?php include'footer.php';?>
	<p><a href="javascript:;" id ="person-go-top" ></a></p>
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/personal_common.js"></script>
	<script src="assets/front/js/project_common.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/comm.js"></script>
	<script src="assets/front/js/project_support.js"></script>
</body>
</html>