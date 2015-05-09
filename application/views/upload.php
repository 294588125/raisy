<html>
<head>
<title>Upload Form</title>
<base href="<?php echo site_url(); ?>" />
</head>
<body>



<form action="upload/do_upload" method="post" enctype="multipart/form-data">

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" name="上传"/>

</form>

</body>
</html>