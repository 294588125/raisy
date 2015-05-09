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
</head>
<body>
<?php include"person_project_header.php"?>
	<div id="project-like">
		<div class="type">
			<ul>				
				<li class="unselected"><a href="project/view_project_support">支持的项目<?php echo $support_sum->support_sum; ?></a></li>
				<li class="unselected"><a href="project/view_all_project_launch">发起的项目<?php echo $launch_sum->launch_sum; ?></a></li>
				<li class="selected"><a href="javascript:;">喜欢的项目<?php echo $like_sum; ?></a></li>
			</ul>
		</div>
		<div class="content">			
			<table>
				<colgroup>
	              <col width="50%">
	              <col width="25%">
	              <col width="25%">	              
              </colgroup>
				<tbody>
					<tr class="title">
						<th>项目名称</th>
						<th>日期</th>
						<th>操作</th>						
					</tr>
					<?php foreach($projects as $project) {?>
					<tr>
						<td class='name'>						
								<a href="project/index/<?php echo $project->project_id;?>"><img src="uploads/<?php echo $project->pro_cover;?>" alt=""></a>
								<a href="project/index/<?php echo $project->project_id;?>"><p><?php echo $project->name;?></p></a>					
						</td>
						<td><p><?php echo $project->like_time;?></p></td>						
						<td>							
							<a class="cancel-like" projectId="<?php echo $project->project_id;?>" href="javascript:;">取消喜欢</a>						
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<!-- <?php echo $this->pagination->create_links();?> -->
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
	
</body>
</html>