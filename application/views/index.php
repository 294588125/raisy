<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>raisy</title>
	<base href="<?php echo site_url(); ?>"/>
	<link rel="stylesheet" href="assets/front/css/comm.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
	<link rel="stylesheet" href="assets/front/css/index.css">
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
	<?php include "header.php" ?>
	<div id="direct">
		<div class="wrap">
			<ul>
				<li><a href="browse/index">全部</a></li>
				<li><a href="browse/tech">科技</a></li>
				<li><a href="browse/benefit">公益</a></li>
				<li><a href="browse/publish">出版</a></li>
				<li><a href="browse/entertainment">娱乐</a></li>
				<li><a href="browse/art">艺术</a></li>
				<li><a href="browse/farm">农业</a></li>
				<li><a href="browse/store">商铺</a></li>
				<li><a href="browse/others">其他</a></li>
			</ul>
			<ul class="direct-right">
				<li><a href="browse/local">地方站</a></li>
				<li><a href="browse/produce">众筹制造</a></li>
				<li class="he-special"><a href="#">合作专区</a></li>
			</ul>
		</div>
	</div>
	<div id="backTop">
		<span></span>
	</div>
	<div id="lunbo">
		<!-- <div class=""> -->
		<ul class="image">
			<li><img src="assets/front/img/1421230571.jpg" alt=""></li>

			<li><img src="assets/front/img/1421033195.jpg" alt=""></li>
			<li><img src="assets/front/img/1421033141.png" alt=""></li>
			<li><img src="assets/front/img/1421033379.jpg" alt=""></li>
			<li><img src="assets/front/img/1421046366.jpg" alt=""></li>
			<li><img src="assets/front/img/1421046200.jpg" alt=""></li>
			<li><img src="assets/front/img/1421230571.jpg" alt=""></li>

			<li><img src="assets/front/img/1421033195.jpg" alt=""></li>
			
			<!-- <li><img src="assets/front/img/1421033379.jpg" alt=""></li>
			<li><img src="assets/front/img/1421046366.jpg" alt=""></li>
			<li><img src="assets/front/img/1421046200.jpg" alt=""></li>
			<li><img src="assets/front/img/1421230571.jpg" alt=""></li> -->
		</ul>		
		<span class="prev"></span>
		<span class="next"></span>	
		<!-- <ul class="circle">
			<li class="blue-color"></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>	 -->
	</div>
	<div id="subNav">
		<div class="wrap">
			<ul>
				<li><a href="browse/index">全部</a></li>
				<li><a href="browse/tech">科技</a></li>
				<li><a href="browse/benefit">公益</a></li>
				<li><a href="browse/publish">出版</a></li>
				<li><a href="browse/entertainment">娱乐</a></li>
				<li><a href="browse/art">艺术</a></li>
				<li><a href="browse/farm">农业</a></li>
				<li><a href="browse/store">商铺</a></li>
				<li><a href="browse/others">其他</a></li>
			</ul>
			<ul class="fu-nav">
				<li><a href="browse/local">地方站</a></li>
				<li><a href="browse/produce">众筹制造</a></li>
				<li class="he-special"><a href="javascript:;">合作专区</a></li>
			</ul>
		</div>
	</div>
	<div id="hot" class="wrap">
		<div class="style-title">
			<span>热门项目</span>
			<a href="#">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($projects as $project) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $project->project_id?>">
							<img src="uploads/<?php echo $project->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $project->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $project->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($project->raised_money/$project->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($project->raised_money/$project->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($project->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $project->project_id;?>"><?php echo $project->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $project->project_id;?>"><?php echo $project->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
			</ul>
		</div>
		<div class="style-title">
			<span>众筹制造</span>
			<!-- <a href="#">浏览全部</a> -->
		</div>
		<div class="make-box wrap">
			<a class="make-a1" href="#"><img class="make-img1"src="assets/front/img/1421294161.jpg"></a>
			<a class="make-a2" href="#"><img class="make-img2"src="assets/front/img/1421116800.jpg"></a>
			<a class="make-a3" href="#"><img class="make-img3"src="assets/front/img/1421116814.jpg"></a>
			<a class="make-a4" href="#"><img class="make-img4"src="assets/front/img/1421117142.jpg"></a>
			<a class="make-a5" href="#"><img class="make-img5"src="assets/front/img/1421117151.jpg"></a>
		</div>
		<div class="style-title">
			<span>科技</span>
			<a href="browse/tech">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($sciences as $science) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $science->project_id;?>">
							<img src="uploads/<?php echo $science->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $science->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $science->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($science->raised_money/$science->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($science->raised_money/$science->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($science->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $science->project_id;?>"><?php echo $science->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $science->project_id;?>"><?php echo $science->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
			</ul>
		</div>
		<div class="style-title">
			<span>公益</span>
			<a href="browse/benefit">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($gongyis as $gongyi) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $gongyi->project_id;?>">
							<img src="uploads/<?php echo $gongyi->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $gongyi->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $gongyi->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($gongyi->raised_money/$gongyi->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($gongyi->raised_money/$gongyi->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($gongyi->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $gongyi->project_id;?>"><?php echo $gongyi->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $gongyi->project_id;?>"><?php echo $gongyi->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
			
			</ul>
		</div>
		<div class="style-title">
			<span>出版</span>
			<a href="browse/publish">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($publishs as $publish) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $publish->project_id;?>">
							<img src="uploads/<?php echo $publish->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $publish->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $publish->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($publish->raised_money/$publish->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($publish->raised_money/$publish->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($publish->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $publish->project_id;?>"><?php echo $publish->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $publish->project_id;?>"><?php echo $publish->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
				
				
			</ul>
		</div>
		<div class="style-title">
			<span>娱乐</span>
			<a href="browse/entertainment">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($entertainments as $entertainment) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $entertainment->project_id;?>">
							<img src="uploads/<?php echo $entertainment->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $entertainment->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $entertainment->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($entertainment->raised_money/$entertainment->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($entertainment->raised_money/$entertainment->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($entertainment->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $entertainment->project_id;?>"><?php echo $entertainment->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $entertainment->project_id;?>"><?php echo $entertainment->comment_sum->comment_sum;?></a>
							</p>
						</div>
						
					</div>
				</li>
				<?php
					}
				?>
				
				
				
			</ul>
		</div>
		<div class="style-title">
			<span>艺术</span>
			<a href="browse/art">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($arts as $art) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $art->project_id;?>">
							<img src="uploads/<?php echo $art->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $art->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $art->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($art->raised_money/$art->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($art->raised_money/$art->raise_money)*100);?>%</span>
								<span class="rate2">剩余<?php echo ceil((strtotime($art->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $art->project_id;?>"><?php echo $art->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $art->project_id;?>"><?php echo $art->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
				
			</ul>
		</div>
		<div class="style-title">
			<span>农业</span>
			<a href="browse/farm">浏览全部</a>
		</div>
		<div class="focus-box">
			<ul class="focus-con">
				<?php 
					foreach ($farms as $farm) {
				?>
				<li>
					<div class="list-item">
						<a class="item-figure" href="project/index/<?php echo $farm->project_id;?>">
							<img src="uploads/<?php echo $farm->pro_cover;?>">
						</a>
						<div class="z-lump">
							<h2>
								<a href="#"><?php echo $farm->name;?></a>
							</h2>
							<p class="z-raising">
								已筹资
								<em>￥</em>
								<i><script>document.write(jiadou(<?php echo $farm->raised_money;?>));</script></i>
							</p>
							<div class="progress-bar">
								<span class="progress-bg-yellow" style="width:<?php echo ceil(($farm->raised_money/$farm->raise_money)*100);?>%;"></span>
							</div>
							<div class="item-rate">
								<span class="rate1"><?php echo ceil(($farm->raised_money/$farm->raise_money)*100);?></span>
								<span class="rate2">剩余<?php echo ceil((strtotime($farm->end_time)-strtotime(date('Y-m-d H:i:s')))/60/60/24); ?>天</span>
							</div>
							<p class="z-assist">
								<a class="assist1" href="project/index/<?php echo $farm->project_id;?>"><?php echo $farm->like_sum->like_sum;?></a>
								<a class="assist2" href="comment/index/<?php echo $farm->project_id;?>"><?php echo $farm->comment_sum->comment_sum;?></a>
							</p>
						</div>
					</div>
				</li>
				<?php
					}
				?>
				
			</ul>
		</div>
	</div>
	<div id="mong">
	    <div class="m-video">
	        <div class="wrap m-what-par">
	            <div class="m-what">
	               <h6>众筹网是什么？</h6>
	               在这里发起你的梦想、创意和创业计划，便可面对<br>公众集资，让有创造力的你获得所需要的资金，帮助你的梦想实现。
	           </div>
	           <div class="z-flash">
	           <!--a id="Js-flash" href="###" class="flash-botton"></a-->
	           <!-- 可替换图片 start -->
	           <p class=" flash-img"><img width="671" height="329" wx-lz="http://zcs4.ncfstatic.com/v3/static/images/index/pio_09.jpg?=20140918?v=" src="assets/front/img/pio_09.jpg"></p>
	           <!-- 可替换图片 end -->
	           </div>
	        </div>
	    </div>
	</div>
	<div id="totalBox" class="wrap">
		<!-- 数字class名 number 0-9
       number,number1,number2,number3n,umber4,number5,number6,number7,number8,number9
       逗号 comma
	 -->
	    <div id="JsScrollNum" class="mm">
			<dl>
				<dt class="odometer" data-num=""><script>document.write(jiadou(<?php echo count($num);?>))</script></dt>
				<dd><i class="s-01"></i>项目总数</dd>
			</dl>
			<dl>
				<dt class="odometer" data-num=""><script>document.write(jiadou(<?php echo count($supportnum);?>))</script></dt>
				<dd><i class="s-02"></i>累计支持人</dd>
			</dl>
			<dl>
				<dt class="odometer" data-num=""><script>document.write(jiadou(<?php echo $supportmoney->sum;?>))</script></dt>
				<dd><i class="s-03"></i>累计筹资金额</dd>
			</dl>
		</div>

	</div>
	<div id="theySuccess" class="wrap">
		<h3>他们都成功了</h3>
		<ul class="m-complete">
			<?php
				foreach ($success as $succes) {
			?>
			<li>
				<div class="z-succeed img-scale">
	                <a href="#" target="-blank"><img src="uploads/<?php echo $succes->pro_cover;?>" wx-lz=""></a>
					<h4><a href="#"><?php echo $succes->name;?></a></h4>
					<p>
						<span class="z-raising z-raising-01">共筹资<em>￥</em><i><script>document.write(jiadou(<?php echo $succes->raised_money;?>));</script></i></span>
						<span class="z-initiator">发起人：<?php echo $succes->pub_name;?></span>
					</p>
				</div>
			</li>
			<?php
				}
			?>
			<!-- <li>
				<div class="z-succeed img-scale">
	                <a href="#" target="-blank"><img src="assets/front/img/1419840334.jpg" wx-lz=""></a>
					<h4><a href="#">让我们一起开书店，寻找属于字里行间的人</a></h4>
					<p>
						<span class="z-raising z-raising-01">共筹资<em>￥</em><i>1,392,104</i></span>
						<span class="z-initiator">发起人：霄酸桐</span>
					</p>
				</div>
			</li>
			<li>
				<div class="z-succeed img-scale">
	                <a href="#" target="-blank"><img src="assets/front/img/1419840338.jpg" wx-lz=""></a>
					<h4><a href="#">【县长众筹】 永和核桃圆孩子书屋梦</a></h4>
					<p>
						<span class="z-raising z-raising-01">共筹资<em>￥</em><i>866,675</i></span>
						<span class="z-initiator">发起人：空气变稀薄</span>
					</p>
				</div>
			</li>
			<li>
				<div class="z-succeed img-scale">
	                <a href="#" target="-blank"><img src="assets/front/img/1419840343.jpg" wx-lz=""></a>
					<h4><a href="#">李盾老师音乐剧《爱上邓丽君》携手众筹 再度来袭 </a></h4>
					<p>
						<span class="z-raising z-raising-01">共筹资<em>￥</em><i>500,640</i></span>
						<span class="z-initiator">发起人：dfjy</span>
					</p>
				</div>
			</li> -->	
		</ul>
	</div>
	<div id="search">
		<form action="#" method="get" wx-validator>
	        <div class="m-hank">
	          <input placeholder="搜索更多梦想" name="k" placeholder="搜索更多梦想" wx-validator-rule="required" type="text" wx-validator-notip >
	         <!-- <span class="wx-placeholder" style="font-size:16px; color:#ccc;position:absolute;top:-10px;*top:-10px ;left:20px;*left:20px;">hjgjhg搜索更多梦想</span> -->
	          <a href="javascript:;" type="submit" class="bh-mhnbo"><i></i></a>
	        </div>
   		</form>
	</div>
	<div id="bottomImg" class="wrap">
   		<img src="assets/front/img/pio_49.png">
    </div>
	<?php include "footer.php" ?>
	<!-- <script src="assets/front/js/DD_belatedPNG_0.0.8a.js"></script>
	<script>
		DD_belatedPNG.fix('*');
	</script> -->
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<script src="assets/front/js/common.js"></script>
	<script src="assets/front/js/index.js"></script>
	
</body>
</html>