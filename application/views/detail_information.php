<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹网详细网页</title>
	<base href = "<?php echo site_url(); ?>">
	<link rel="stylesheet" href="assets/front/css/detail_information.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
</head>
<body>
	<div id='main-container'>
	<?php include 'header.php'?>
    <div id="kb"></div>
	<div id = "container" class ="wrap1 clearfix ">
		<div id = "particulars-left">
			<div id = "title" class = "center">
				<h2><?php echo $project->name?></h2>
	        <ul><br>
	        	<li><span>发起人:</span>车小可</li>
	        	<span class = "r">云南临沧</span>
	        </ul><br><br>
			</div>
			<div class = "select">
				<ul>
					<li class = "selected"><a href="project/index/<?php echo $project->project_id;?>">项目主页</a></li>
					<li><a href="comment/to_add/?project_id=<?php echo $project_id;?>">评论</a></li>
					<li><a href="support/index/?project_id=<?php echo $project_id;?>">支持者</a></li>
				</ul>
			</div>
			
			<div id = "initiate">
				<h2>发起人介绍：</h2><br>
				<p>
					<?php echo $project_intro->intro?>
				</p>
                <ul>
                	<li>
                		<img src="<?php echo $project_intro->pro_cover ?>" alt="">
                	</li>
                	<li>
                		<img src="assets/front/img/2.jpg" alt="">
                	</li>
                    <li>
                		<img src="assets/front/img/3.jpg" alt="">
                	</li>
                	<li class = "imglast">
                		<img src="assets/front/img/4.jpg" alt="">
                	</li>
                    <h2>遇到的困难：</h2><br>
                    <p class = "z-06">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp昔木小学一共有180名学生，其中有100名住校生，每周从周一到周五都是住在学校里的。差不多20-40个学生住在一个宿舍里。学生没有专门的洗浴设备，就只能用从山里泉水接下来的水龙头进行洗漱，没有热水，也没法沐浴。因此一到冬天就只能用冷水洗脸冲脚，一到夏天教室和寝室里因为不能洗澡就臭气熏天。
                    </p>
                	<li>
                		<img src="assets/front/img/6.jpg" alt="">
                	</li>
                	<li class = "imglast">
                		<img src="assets/front/img/7.jpg" alt="">
                	</li>
                    <p class = "z-06">为了解决这个问题，昔木的支教老师通过各种关系和资源，从连云港太阳雨太阳能公司得到了15台太阳能热水器的资助。可以满足这100个学生每天的日常洗漱和洗浴了。</p>

                    <li class="imglast">
                        <img src="assets/front/img/5.jpg" alt="">
                    </li>
                    <p class="z-06">于是问题就来了：小伙伴们，热水器有了。装在哪里呢？</p>
                    <h2>解决方案</h2>
                    <p class="z-06">
                        于是修建浴室的重任又一次落在了昔木小学支教老师的头上。现在修建一个可以安装15台太阳能热水器出水口并且供100个住校学生使用的浴室大约需要40平方米的板房。
                    </p>
                    <p class="z-06">
                        根据当地建筑施工公司的报价，可以用十年以上的板房修建大约一平方米800-1000元左右。因此修建这样大的一栋板房当做浴室至少需要32000-40000元人民币。再加上排水系统、施工工人费用、学生沐浴的各种配套设施等费用，总共需要4-5万元人民币。
                    </p>
                    <h2>回报：</h2>
                    <p class = "z-06">
                        我们希望能够募集到5万元人民币，在三月中旬开始动工，能够尽快在四月或者五月夏天来临前修建好学生浴室。让学生有一个清洁凉爽的夏天和温暖干净的冬天。所以，亲爱的壕们，让我们一起为小朋友有能够尽情在浴室里吹口哨的机会而慷慨解囊吧。
                    </p>
                    <p class="z-06">
                        我们希望能够募集到5万元人民币，在三月中旬开始动工，能够尽快在四月或者五月夏天来临前修建好学生浴室。让学生有一个清洁凉爽的夏天和温暖干净的冬天。所以，亲爱的壕们，让我们一起为小朋友有能够尽情在浴室里吹口哨的机会而慷慨解囊吧。
                    </p>
                    <p class="z-06">
                        在项目完成后，我们会对各位慷慨捐助的朋友回赠礼物。
                    </p>
                    <p class="z-06">
                        1、支持10元，将会收到我们精心准备的电子感谢信。
                    </p>
                    <p class="z-06">
                        2、支持50元，可以收到我们为您准备的学校照片及感谢信。
                    </p>
                    <p class="z-06">3、支持100元，可以收到学生精心准备的感谢明信片 。</p>
                    <p class="z-06">
                        4、支持500元，可以收到学生精心准备的抽象画作。
                    </p>
                    <p class="z-06">
                        5、支持1000元，可以收到学生精心准备的抽象画作及感谢明信片及学校招片。
                    </p>
                    <li class = "imglast">
                        <img src="assets/front/img/present1.jpg" alt="">
                    </li>
                    <li class = "imglast">
                       <img src="assets/front/img/resent2.jpg" alt="">
                    </li>
                    <li class = "imglast">
                       <img src="assets/front/img/present3.jpg" alt="">
                    </li>
                </ul>
                <hr>
                <div id="type">
                    <p class = "z-03">分类:</p>
                    <p class = "z-07">公益</p>
                    <ul class = "z-03">
                        <li>标签:</li>
                        <li>清爽</li>
                        <li>浴室</li>
                        <li>夏天</li>
                        <li>孩子</li>
                        <li>小学</li>
                        <li>计划</li>
                    </ul>
                </div>

            <div id = "group">
                  <ul>
                    <li>
                        <img src="assets/front/img/group1.jpg" alt="">
                        <p class="z-03">已筹资：¥150(3%)</p>
                        <em>剩余时间：1天</em>
                    </li>
                    <li>
                        <img src="assets/front/img/group2.jpg" alt="">
                        <p class="z-03">已筹资：¥56,061(113%)</p>
                        <em>剩余时间：1天</em>
                    </li>
                    <li>
                       <img src="assets/front/img/group3.jpg" alt="">
                       <p class="z-03">已筹资：¥5,115(52%)</p>
                        <em>剩余时间：123天</em>
                    </li>
                    <li>
                       <img src="assets/front/img/group4.jpg" alt="">
                       <p class="z-03">已筹资：¥50(1%)</p>
                        <em>剩余时间：145天</em>
                    </li>
                   </ul>
                </div>
            
			</div>
		</div>
		<div id="lalalala">
		<div id = "particulars-right">
            <ul id = "sclt">
                <li class = "select1"> <a href="#">支持</a> </li>
                <li class = "select2"> <a href="#">喜欢</a> </li>
            </ul>
            <div id = "first1">
                <div id = "m-add">
                   <p class = "z-01">目前累计资金<p>
                   <p class = "z-02">¥<?php echo $sum->sum;?></p>
                   <p class = "z-03">
                    此项目必须在
                   <em>2015年3月13日</em>
                   前得到
                   <em>¥30000</em>
                   的支持才能成功</p>
                   <img class = "rate" src="assets/front/img/rate.jpg" alt=""><br><br>
                </div>



               <div class = "m-support">
                    <dl>
                        <dt>56天</dt>
                        <dt>剩余时间</dt>
                    </dl>

                    <dl>
                        <dt>234</dt>
                        <dt>支持者</dt>
                    </dl>

                    <dl class = "z-last">
                        <dt>567</dt>
                        <dt>喜欢者</dt>
                    </dl>   
               </div>
            </div>
            
            <ul>
            	<?php foreach($support_type as $Support_type)
            	      { 
            	?>
                <li class="second">
                    <div class="private">
                        <p class="z-04">
                            ¥<?php echo $Support_type->support_money;?>元
                        </p>
                        <p class="z-05">
                            已有
                        100位支持者
                        </p>
                    </div>
                    <div class="Repay">
                        <p class="repay">
                           支持<?php echo $Support_type->support_money;?>元，<?php echo $Support_type->support_report;?> 
                        </p>
                        <p class = "z-03">
                           配送运费：
                           <em>免运费</em><br>
                           预计回报时间：
                           <em>项目结束后立即回报</em>
                        </p>
                    </div>
                    <div class = "pay_prv">
                       <p class = "z-06"><a href="support/payfor/<?php echo $project->project_id;?>/<?php echo $Support_type->support_money;?>">支持<?php echo $Support_type->support_money;?>元</a>
                       </p>
                    </div>
                </li>

               <?php } ?>
             </ul>
            <div id = "lbt">
                <ul>
                    <li><img src="assets/front/img/lbt1.jpg" alt=""></li>
                    <li><img src="assets/front/img/lbt2.jpg" alt=""></li>
                    <li><img src="assets/front/img/lbt3.jpg" alt=""></li>
                    <li><img src="assets/front/img/lbt4.jpg" alt=""></li>
                    <li><img src="assets/front/img/lbt5.jpg" alt=""></li>
                    <li><img src="assets/front/img/lbt6.jpg" alt=""></li>
                </ul>
            </div>
        </div>
	</div>
	</div>
        <!-- <div id = "footer">
            <img src="assets/front/img/footer.jpg" alt="">
        </div> -->
	

</div>
<div id='main-footer' >
<?php include "footer.php" ?>
</div>
<script src = "assets/front/js/jquery-1.10.2.min.js"></script>
<script src = "assets/front/js/detail_information.js"></script>
<script src = "assets/front/js/opacity.js"></script>
<script src = "assets/front/js/lbt.js"></script>
<script src = "assets/front/js/common.js"></script>
</body>
</html>