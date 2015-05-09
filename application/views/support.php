<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支持网页</title>
	<base href = "<?php echo site_url(); ?>">
	<link rel="stylesheet" href="assets/front/css/detail_information1.css">
	<link rel="stylesheet" href="assets/front/css/comment.css">
	<link rel="stylesheet" href="assets/front/css/support.css">
	<link rel="stylesheet" href="assets/front/css/tanceng1.css">
	<link rel="stylesheet" href="assets/front/css/common.css">
</head>
<body>
	<?php include 'header.php'?>
	<div id="kb"></div>
    <div id="bkgd"></div>
      <div id="tanceng">
       <div class="top">
         <span class="close">X</span>
         <p>发送私信</p>
       </div>
       <div class="pos-msg">
         <h3>收件人：</h3><br><br>
         <textarea name="message" id="message" cols="30" rows="10"></textarea>
       </div>
       <div id="smt">
             <input class="cancel" type="reset" value="取消">
             <input id="btn-ok" class="ok" type="submit" value="确定">
          </div>
      </div>
	<div id = "container" class ="wrap1">
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
					<li><a href="project/index/<?php echo $project->project_id;?>">项目主页</a></li>
					<li><a href="comment/to_add/?project_id=<?php echo $project_id?>">评论</a></li>
					<li class = "selected"><a href="support/index/?project_id=<?php echo $project_id?>">支持者</a></li>
				</ul>
			</div>
         <div id="support">
            <ul>
            	<?php foreach($supports as $support){?>
            	<li>
            		<img src="assets/front/img/touxiang.jpg" alt="">
            		<p><?php echo $support->realname;?></p>
            		<p>支持此项目</p>
            		<p>¥<?php echo $support->support_money;?></p>
            		<div class ="message">
            			<p>发私信</p>
            			<!-- <a href="message/send_msg?receiver=<?php echo $support->user_id?>"></a> -->
            		</div>
            	</li>
            	<?php }?>
            	<table border="0" align="center" width="750" height="50">
            		<tr>
            			<td>
            				<?php echo $this->pagination->create_links();?>
            			</td>
            		</tr>
            	</table>
            </ul>
        </div>

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
                   <!-- <?php echo $project->raised_money;?> -->
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
                    <textarea class="kuan"><?php echo $Support_type->support_money;?></textarea>
                    <button class = "pay_prv">
                       <p class = "z-06"><a class="vitaul" href="support/payfor/<?php echo $project->project_id;?>/<?php echo $Support_type->support_money;?>">支持<?php echo $Support_type->support_money;?>元</a>
                       </p>
                    </button>
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
<script src = "assets/front/js/support.js"></script>
<script src = "assets/front/js/message.js"></script>
<script src = "assets/front/js/common.js"></script>
    <script>
  
    		$('#btn-ok').on('click',function(){
    			$.post('message/send_msg',{
    				 content_msg:$('#message').val(),
    				 receiver:<?php echo $support->user_id?>
    			},function(data){
    				if(data=='success'){
    					alert('私信发送成功');
    				}else if(data=='fail'){
    					alert('私信发送失败');
    				}
    			},"text");
    		});
    		
    		$('.pay_prv').on('click',function(){
    			$.post('support/payfor',{
    				support_money:11
    			},function(){},"text");
    		});
    </script>
</body>
</html>