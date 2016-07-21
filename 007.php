
<script>
	window.onload = function(){
		var file = document.getElementsByName("file")[0];
		var form = document.getElementsByTagName("form")[0];
		file.onchange = function(){
			// alert();
			var type = file.value.split(".").pop();
			var size = file.files[0].size;
			// alert(size)
			form.action="javascript:void(0);";
			// alert(type);
			if(type !='jpg' && type && 'png' && type !='gif'){
				alert("只支持上传 jpg png gif 格式图片");
				return;
			}
			else if(size>2*1024*1024){
				alert("文件大小不能超过2M");
				return;
			}
			else{
				form.action="007_upload.php";
			}
		}
	}
</script>
<form action="" method="post" enctype='multipart/form-data' >
	<input type="file" name="file"/>
	<input type="submit" />
</form>