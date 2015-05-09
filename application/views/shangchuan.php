<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
<head>
	<title>众筹网-发布项目-step-one</title>
	<base href="<?php echo site_url();?>" >
	<link rel="stylesheet" type="text/css" href="assets/front/css/productnewAdd.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/front/css/common.css"> -->
	<meta charset="UTF-8">
</head>
<body>
	<form id="myform" action="upload/do_upload" method="post" enctype="multipart/form-data">
		<div class="all-infor">
			<label class="infor-name">项目封面：</label>
			<div class="pro-cover">
				<input id="btnUpload" class="product-cover" name="userfile" type="file" data-num="1" value="">			
				<a href="javascript:;">上传封面</a>
				<!-- <input type="submit" value="上传" style="margin-left: 60px;display: block;"> -->
			</div>
			<span class="cover-rule">支持jpg、jpeg、png，大小不超过5M。建议尺寸：640 x</span>
		</div>		
	</form>
	<!-- <input id="fileName" type="hidden" value="<?php echo $uplist->file_name;?>"> -->
	<!-- <script>alert(<?php echo $uplist['file_name'];?>);</script> -->
	
	<script src="assets/front/js/jquery-1.10.2.min.js"></script>
	<!-- <script>alert($('#fileName').val());</script> -->
	<script type="text/javascript" src="assets/front/js/up_picture.js"></script>
</body>
</html>