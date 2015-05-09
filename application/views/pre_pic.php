<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>众筹网-发布项目-step-one</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/productnewAdd.css">
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="assets/front/css/common.css"> -->
	<meta charset="UTF-8">
</head>
<body>
	<a class="preview-cover" href="javascript:;"><img id="up_img" src="assets/front/img/no-cover.jpg" style="width:229px;height:179px;"></a>
	<?php 
		$upload_pic=$this->session->userdata('upload_pic');
		if($upload_pic){
	?>
	<input id="fileName" type="hidden" value="<?php echo $upload_pic['file_name'];?>">
	<script>
		$(function(){
			$('#up_img').attr('src','uploads/'+$('#fileName').val());
		});
	</script>
	<?php
		}
	?>
	<!-- 
		$upload_pic['file_name']='no-cover.jpg';
		$this->session->set_userdata("upload_pic",$upload_pic); -->

	<!-- <script>alert($('#fileName').val());</script> -->
	<script type="text/javascript" src="assets/front/js/up_picture.js"></script>
</body>
</html>