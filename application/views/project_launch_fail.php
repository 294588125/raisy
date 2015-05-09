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
	<link rel="stylesheet" href="assets/front/css/project_launch.css">
</head>
<body>
<?php include"person_project_header.php"?>
	<div id="project-launch">
		<div class="type">
			<ul>				
				<li class="unselected"><a href="project/view_project_support">支持的项目<?php echo $support_sum->support_sum; ?></a></li>
				<li class="selected" ><a href="javascript:;">发起的项目<?php echo $launch_sum->launch_sum; ?></a></li>
				<li class="unselected"><a href="project/view_project_like">喜欢的项目<?php echo $like_sum->like_sum; ?></a></li>
			</ul>
		</div>
		<div class="content">
			<ul class="status">
				<li><a href="project/view_all_project_launch">所有</a></li>
				<li><a href="project/view_project_launching">众筹中</a></li>
				<li><a href="project/view_project_success">已成功</a></li>
				<li class="selected" ><a href="javascript:;">已失败</a></li>
			</ul>
			<table>
				<colgroup>
	              <col width="41%">
	              <col width="16%">
	              <col width="16%">
	              <col width="7%">
	              <col width="11%">
              </colgroup>
				<tbody>
					<tr class="title">
						<th>项目名称</th>
						<th>发布日期</th>
						<th>截止日期</th>
						<th>目标</th>
						<th>进度</th>
						<th>状态</th>
					</tr>
					<?php foreach($projects as $project) {?>
					<tr>
						<td>							
							<div class="name">
								<a href="#"><img src="uploads/<?php echo $project->pro_cover;?>" alt=""></a>
								<a href="#"><p><?php echo $project->name;?></p></a>								
							</div>
						</td>
						<td><p><?php echo $project->start_time;?></p></td>
						<td><p><?php echo $project->end_time;?></p></td>
						<td><?php echo $project->raise_money;?></td>
						<td><?php echo $project->raised_money;?>元<br><br><?php echo ceil(($project -> raised_money / $project -> raise_money) * 100) ?>%</td>
						<td>
							<a href="#">预览</a>						
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
	<script src="assets/front/js/project_launch.js"></script>
	
</body>
</html>