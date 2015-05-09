<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>SB Admin 2 - Bootstrap Admin Theme</title>
		<base href = "<?php echo site_url(); ?>">
		<!-- Bootstrap Core CSS -->
		<link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="assets/admin/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="assets/admin/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="assets/admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<?php include 'admin_comment.php' ?>
		<div id="page-wrapper">
			<h2>未审核项目列表</h2>
			<li class="sidebar-search">
				<form method="post" action="admin/welcome/search_project">
					<div class="input-group custom-search-form">
						<input type="text" name="Text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i><!-- </button> -->
							</button></span>

					</div>
				</form>
				<!-- /input-group -->
			</li>
			<table>
				<tr>
					<td>项目名称</td>
					<td>项目类型</td>
					<td>筹集金额</td>
					<td>发起人姓名</td>
					<td>发起人类型</td>
					<td>地址</td>
					<td>提交时间</td>
					<td>选项</td>
				</tr>
				<?php foreach($uncheck_projects as $uncheck_project){
				?>
				<tr>
				<td><?php echo $uncheck_project->name?><
				/td>
				<td><?php echo $uncheck_project->pro_type_name?><
				/td>
				<td><?php echo $uncheck_project->raise_money?><
				/td>
				<td><?php echo $uncheck_project->realname?><
				/td>
				<td><?php echo $uncheck_project->type_name?><
				/td>
				<td><?php echo $uncheck_project->province?><
				/td>
				<td><?php echo $uncheck_project->start_time?><
				/td>
				<td><a href="admin/welcome/check_detail/<?php echo $uncheck_project->project_id?>">审核</a></td>
				</tr>
				<?php } ?>
				<table border="0" align="center" width="750" height="50">
					<tr>
						<td> <?php echo $this -> pagination -> create_links(); ?> </td>
					</tr>
				</table>
			</table>
		</div>
		<script src="assets/admin/js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="assets/admin/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="assets/admin/js/plugins/metisMenu/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="assets/admin/js/sb-admin-2.js"></script>

	</body>

</html>
