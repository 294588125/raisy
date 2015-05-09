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

        <div id="page-wrapper" class="clearfix">
            <h2>审核项目</h2>
            <h3><?php echo $project->name?></h3>
            <div id="introduction">
              <?php echo $project_intro->intro?>
            </div>
            
            <div id="support">
            	<h4>支持方式及回报</h4>
              <ul>
              	<?php foreach($support_types as $support_type){?>
              	<li>
              		支持¥<?php echo $support_type->support_money;?>
              		<div class="report">
						回报方式：
						<?php echo $support_type->support_report?>
					  </div>
              	</li>
              	<?php }?>
              </ul>
            </div>
            
            <div id="imessage">
			  <textarea id="body_message" placeholder="请在这里留下你想要和发起人的小伙伴儿们说的话吧..."></textarea>
		    </div>
            
            <div id="footer">
					<button id="agree" project_id="<?php echo $project_id;?>">
						同意发布
					</button>
					<button id="disagree" project_id="<?php echo $project_id;?>">
						反对发布
					</button>
					<button id="message" project_id="<?php echo $project->publisher_id;?>">
						给发起人留言
					</button>
					<button id="send" project_id="<?php echo $project->publisher_id;?>">
						发送留言
					</button>
					<button id="cancel" project_id="<?php echo $project->publisher_id;?>">
						取消留言
					</button>
				</div>
			
        </div>
        


    <script src="assets/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/admin/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/admin/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/admin/js/sb-admin-2.js"></script>
    <script src="assets/admin/js/message.js"></script>

    <script>
    	$('#agree').on('click',function(){
    		$project_id = $(this).attr('project_id');
    		$.post('admin/welcome/agreed_project',{
    			project_id:$project_id
    		},function(data){
    			if(data=='success'){
    				alert('项目已被通过');
    				location.reload();
    			}else if(data=='fail'){
    				alert('项目审核失败');
    			}
    		},"text");
    	});
    	$('#disagree').on('click',function(){
    		$project_id = $(this).attr('project_id');
    		$.post('admin/welcome/disagreed_project',{
    			project_id:$project_id
    		},function(data){
    			if(data=='success'){
    				alert('项目已被pass');
    				location.reload();
    			}else if(data=='fail'){
    				alert('项目审核失败');
    			}
    		},"text");
    	});
    	
    
    	
    	$('#send').on('click',function(){
    		$publisher_id = $(this).attr('publisher_id');
    			$.post('message/send_msg_by_manager',{
    				 content_msg:$('#body_message').val(),
    				 receiver:$publisher_id,
    			},function(data){
    				if(data=='success'){
    					alert('私信发送成功');
    				}else if(data=='fail'){
    					alert('私信发送失败');
    				}
    			},"text");
    		});
    </script>

</body>

</html>
