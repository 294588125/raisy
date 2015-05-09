<!DOCTYPE html>
<html lang="en">
<head>
	<base href='<?php echo  site_url();?>'/>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/scan-project.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<script src="assets/front/js/jq.js"></script>
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
	<div style='height:60px;width:100%;'></div>
	
	<div class='m-subnav'>
		<div class='wrap'>
			<div class="m-nav-left">
				<ul>
					<li class="selected"><a href="browse/index" >全部</a></li>
					<li><a href="browse/tech">科技</a></li>
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
	<div class='wrap m-box'>
		<div class="wrap deputy-nav">
				<ul class='m-deputy all'>
					<li class="m-deputy-left-li" href="javascript:;"><a class='browse'href='javascript:;'>所有项目(<?php echo $sum->all_sum;?>)</a></li>
					<li>
						<ul class='ul-slide ul-slide-left'>
							<li><a href="browse/raising">众筹中</a></li>
							<li><a href="browse/successed">已成功</a></li>
							<li><a href="browse/">即将开始</a></li>
						</ul>
					</li>
				</ul>
				<ul class='m-deputy order'>
					<li class="m-deputy-left-li" href="javascript:;"><a class='browse'href='javascript:;'>最新上线</a></li>
					<li>
						<ul class='ul-slide ul-slide-right'>
					
							<li><a href="browse/order_by_raise_money">最多目标金额</a></li>
							<li><a href="browse/order_by_raised_money">最多支持金额</a></li>
						</ul>
					</li>
				</ul>		
		</div>

		<div class="wrap focus-box">
			<ul class="focus-con">
				<?php foreach($projects as $project){?>
				<li class='focus-con-li'>
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
							<div class='z-assist-clearfix'><a class='assist1' project-id='<?php echo $project->project_id ;?>'href="project/index/<?php echo $project->project_id ;?>"><?php echo $project->like_sum->like_sum;?></a><a class='assist2' href="comment/index/<?php echo $project->project_id ;?>"><?php echo $project->comment_sum->comment_sum;?></a></div>
						</div>	
					</div>
				</li>
				<?php }?>
				
			</ul>
		</div>
	</div>
	<div class='pages'>
			<div>
				<a href="javascript:;">首页</a>
				<a href="javascript:;"><</a>
				<a class='page-number page-selected'href="javascript:;">1</a>
				<a class='page-number'href="javascript:;">2</a>
				<a class='page-number'href="javascript:;">3</a>
				<a class='page-number'href="javascript:;">4</a>
				<a class='page-number'href="javascript:;">5</a>
				<a href="javascript:;">...</a>
				<a href="javascript:;">></a>
				<a href="javascript:;">尾页</a>
			</div>
	</div>
	<?php include 'footer.php'; ?>
</div>
<script src="assets/front/js/jq.js"></script>
<script src="assets/front/js/scan-project.js"></script>
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