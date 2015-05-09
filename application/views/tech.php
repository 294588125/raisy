<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo site_url();?>" />
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="assets/front/css/tech.css">
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<script>
		function jiadou(htm){
			htm = htm + '';
			var odometer=htm.length/3;
			var yu=htm.length%3;
			var num=Math.floor(Number(odometer));
			var i,last;  
			if(num==0){
				return htm;
			}else{
				last=htm.substring(0,yu)+',';
				for(i=1;i<=num;i++){
					var jie=htm.substr(yu+(i-1)*3,3);
					last=last+jie+',';
				}
				last=last.slice(0,-1);
			}
			if(yu==0){
				last=last.substring(1);
			}	
			return last;
		}
	</script>
</head>
<body>
	<?php include 'header.php'; ?>
		<div style='height:60px;width:100%;'>
	  
		</div>
	<div class='m-subnav'>
		<div class='wrap'>
			<div class="m-nav-left">
				<ul>
					<li><a href="browse/index" >全部</a></li>
					<li class="selected"><a href="browse/tech">科技</a></li>
					<li><a href="browse/benefit" >公益</a></li>
					<li><a href="browse/publish" >出版</a></li>
					<li><a href="browse/entertainment" >娱乐</a></li>
					<li><a href="browse/art" >艺术</a></li>
					<li><a href="browse/farm" >农业</a></li>
					<li><a href="browse/store" >商铺</a></li>
					<li><a href="browse/others" >其他</a></li>	
				</ul>
			</div>
			<div class="m-nav-right">
				<ul>
					<li><a href="browse/product">众筹制造</a></li>
					<li><a href="browse/local" >地方站</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class='wrap'>
		<div class="publish-wrap">
			<ul>
				<li><a class='pic1 fill-out'href='javascript:;'><img src="assets/front/img/a.jpg" alt=""></a></li>
				<li><a class='pic2 fill-out'href='javascript:;'><img src="assets/front/img/b.jpg" alt=""></a></li>
				<li><a class='pic3 fill-out'href='javascript:;'><img src="assets/front/img/c.jpg" alt=""></a></li>
			</ul>
			<ul>
				<li><a class='pic4 fill-out'href='javascript:;'><img src="assets/front/img/d.jpg" alt=""></a></li>
				<li><a class='pic5 fill-out'href='javascript:;'><img src="assets/front/img/e.jpg" alt=""></a></li>
			</ul>
		</div>
	</div>
	<div class='commn wrap'>
		<div class='wrap m-headline'>
				<div class='pro-title'>热门项目</div>
				<!-- <a class='z-browse' href="javascrpt:;">浏览全部</a> -->
		</div>
		
		<div class="wrap hot-box">
			<ul class="hot-con">
				<?php foreach($projects as $project) {?>
				<li class='hot-con-li'>
					<div class="list-item">
						<a href="" class="item-figure fill-out">
							<img src="uploads/<?php echo $project->pro_cover;?>" alt="">
						</a>
						<div class='z-lump'>
							<h2><a href='javascript:;'><?php echo $project->name;?></a></h2>
							<p class='z-raising'>"已筹资"<em>￥</em><i><script>document.write(jiadou(<?php echo $project->raised_money;?>));</script></i></p>
							<div class='progress' ><div style="width:<?php echo ceil(($project->raised_money/$project->raise_money)*100);?>%;"></div></div>
							<div class='item-rate'><?php $raised=$project->raised_money;$raising=$project->raise_money;$result=ceil($raised/$raising*100);echo $result."%";?><span>剩余<?php echo ceil((strtotime($project->end_time)-strtotime($project->start_time)) /60/60/24); ?>天</span></div>
						</div>	
						<div class='z-assist'>
							<div class='z-assist-clearfix'><a class='assist1' project-id='<?php echo $project->project_id ;?>' href="project/index/<?php echo $project->project_id ;?>"><?php echo $project->like_sum->like_sum;?></a><a class='assist2' href="comment/index/<?php echo $project->project_id ;?>"><?php echo $project->comment_sum->comment_sum;?></a></div>
						</div>	
					</div>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class='commn wrap'>
		<div class='wrap m-headline'>
				<div class='pro-title'>项目推荐</div>
		</div>
		
		<div class="wrap focus-box">
			<ul class="focus-con">
				<?php foreach($tech_projects as $tech_project){?>
				<li class='focus-con-li'>
					<div class="list-item">
						<a href="" class="item-figure fill-out">
							<img src="uploads/<?php echo $tech_project->pro_cover;?>" alt="">
						</a>
						<div class='z-lump'>
							<h2><a href='javascript:;'><?php echo $tech_project->name;?></a></h2>
							<p class='z-raising'>"已筹资"<em>￥</em><i><script>document.write(jiadou(<?php echo $project->raised_money;?>));</script></i></p>
							<div class='progress' ><div style="width:<?php echo ceil(($project->raised_money/$project->raise_money)*100);?>%;"></div></div>
							<div class='item-rate'><?php $raised=$tech_project->raised_money;$raising=$tech_project->raise_money;$result=ceil($raised/$raising*100);echo $result."%";?><span>剩余<?php echo ceil((strtotime($tech_project->end_time)-strtotime($tech_project->start_time)) /60/60/24); ?>天</span></div>
						</div>	
						<div class='z-assist'>
							<div class='z-assist-clearfix'><a class='assist1'project-id='<?php echo $tech_project->project_id ;?>' href="project/index/<?php echo $tech_project->project_id ;?>"><?php echo $tech_project->like_sum->like_sum;?></a><a class='assist2' href="comment/index/<?php echo $tech_project->project_id ;?>"><?php echo $tech_project->comment_sum->comment_sum;?></a></div>
						</div>	
					</div>
				</li>
				<?php }?>
		
				
			</ul>
		</div>
	</div>
	<div class='m-box-footer wrap'><div><a class='more-project'href="">查看更多</a></div></div>
<!-- 	footer开始 -->
	<?php include 'footer.php'; ?>
	</div>
	<script src="assets/front/js/jq.js"></script>
	<script src="assets/front/js/comm.js"></script>
	<script>
		// $(function(){
			// $('.assist1').on('click',function(){
				// $.post('like/add_like',{id:$(this).attr('project-id')},function(data){
					// if(data=='success'){
						// location.reload();
					// }
				// },'text')	
			// })
		// })
	</script>
</body>
</html>