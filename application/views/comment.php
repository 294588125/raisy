<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>评论网页</title>
	<base href = "<?php echo site_url(); ?>">
	<link rel="stylesheet" href="assets/front/css/detail_information1.css">
	<link rel="stylesheet" href="assets/front/css/comment.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
</head>
<body>
	<?php include 'header.php'?>
	<div id="kb"></div>
	<div id = "container" class ="wrap1">
		<div id = "particulars-left">
			<div id = "title" class = "center">
				<h2><?php echo $project->name?></h2>
	        <ul><br>
	        	<li><span>发起人:</span>session</li>
	        	<span class = "r">云南临沧</span>
	        </ul><br><br>
			</div>
			<div class = "select">
				<ul>
					<li><a href="project/index/<?php echo $project->project_id?>">项目主页</a></li>
					<li class = "selected"><a href="comment/to_add">评论</a></li>
					<li><a href="support/index?project_id=<?php echo $project_id?>">支持者</a></li>
				</ul>
			</div>
            <textarea name="" id="comment" cols="30" rows="10">
            </textarea>
            <button id="answer"><p class="asr">发表回复</p></button>

            <div id="content">
                <ul>
                    <li class="all"><a href="#"><?php echo $project->name?>项目的全部评论</a></li>
                    <!-- <li class="section"><a href="#">只看发起人</a></li> -->
                </ul>
            </div>

            <ul id="pinglun">
            	<?php 
            	      foreach($level1_types as $level1_type){
            	?>
                <li>
                    <div class="tx">
                        <img src="assets/front/img/touxiang.jpg" alt="">
                    </div>
                    <div class="main">
                        <ul>
                            <li class="plr">
                                <?php echo $level1_type->realname?>
                            </li>
                            <li class="xiangxi"><br>
                                <p>
                                	<?php echo $level1_type->content;?>
                                 </p>
                                 <p class="time">发表时间:<?php echo $level1_type->add_time;?></p>
                                 <textarea class="none"><?php echo $level1_type->comment_id;?></textarea>
                            </li>
                        </ul>
                    </div>
                     <div class="pl">
							<p>
								评论(<?php echo $level1_type->comment_sum->comment_sum;?>)
							</p>
						</div>
						<div class="pln">
							<textarea class="reply_content" cols="30" rows="10"></textarea>
							<button class="zpl" data-id="<?php echo $level1_type->comment_id;?>">
								评论
							</button>
							<ul class="xdh">
							<?php  
							       foreach($level1_type->level2_types as $level2_type){
							?>         
							       <ul class="left">
							          <li>
							           <div class="tx">
                                            <img src="assets/front/img/touxiang.jpg" alt="">
                                       </div>
                                       </li>

                                       <li class="back_content">
                                       	<textarea class="del-id">
											 <?php echo $level2_type->comment_id?>
										</textarea>
							       	   	<?php echo $level2_type->realname?> : <?php echo $level2_type->content?>
							       	   	 <br>
							       	   	 <p class="time">评论时间:<?php echo $level2_type->add_time;?></p>
							       	     <span levelname="<?php echo $level2_type->realname?>" class="hf">回复</span>
							       	     <?php if($login_user->user_id==$level2_type->sender){ ?>
							       	     <span class="del">删除</span>
							       	    <?php }?>
							       	   </li>
					                     
							       	</ul>
							       	
							       
							 <?php }?>
							 
							 </ul>
						</div>
                </li>
                <?php }?>
            </ul>		
		</div>

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
	<!-- <?php include 'footer.php'?> -->
        
    

<script src = "assets/front/js/jquery-1.10.2.min.js"></script>
<script src = "assets/front/js/information.js"></script>
<script src = "assets/front/js/opacity.js"></script>
<script src = "assets/front/js/lbt.js"></script>
<script src = "assets/front/js/comment.js"></script>
<script src = "assets/front/js/common.js"></script>
<script>
	$(function(){
		$('#answer').on('click',function(){
			$.post('comment/back_answer',{
				project_id:<?php echo $project->project_id?>,
				comment_content:$('#comment').val(),
				replay_id:0
			},function(data){
				if(data=='success'){
					alert('评论成功');
					location.reload();
				}else if(data=='fail'){
					alert('评论失败');
				}
			},"text");
		});
		
		$('.zpl').on('click',function(){
			$.post('comment/save_comment',{
				project_id:<?php echo $project->project_id?>,
				reply:$(this).siblings().val(),
				reply_id:$(this).data('id')
			},function(data){
				if(data=='success'){
					alert('评论成功');
					location.reload();
				}else if(data=='fail'){
					alert('评论失败');
				}
			},"text");
		});
		$('.hf').on('click',function(){
			// $(this).parents('.xdh').siblings().prev('.reply_content').css("background-color", "red");
			var levelname = $(this).attr('levelname');
			$(this).parents('.xdh').siblings('.reply_content').val('回复:'+levelname);
			
		});
		$('.del').on('click',function(){
			//alert($(this).siblings('.del-id').val());
			//alert('del');
			$.post('comment/delete_comment',{
				 comment_id:$(this).siblings('.del-id').val(),
				 
			},function(data){
				if(data=='success'){
					location.reload();
					alert('删除成功');
				}else if(data=='fail'){
					alert('删除失败');
				}
			},"text");
		 });
	});
</script>
</body>
</html>