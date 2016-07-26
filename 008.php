<style>
* {
	font-family: '微软雅黑';
}
img{
	height: 100px;
}
</style>
<script>
window.onload = function(){

	document.getElementsByName("submit")[0].onclick = function(){
		if(!document.getElementsByName("username")[0].value || !document.getElementsByName("password")[0].value){
			alert("用户名与密码是必填选项");
			return false;
		}
	}

	document.getElementsByName("head")[0].onchange = function(){
		
		var img = this.files[0];
		var reader = new FileReader();
		reader.readAsDataURL(img);
		reader.onload = function(e){
			document.getElementsByName("img")[0].src= this.result;
		}
	}
}
</script>
<form method="post" action="008_deal.php" enctype="multipart/form-data">
	
	<img name="img" >
	<br>

	头 &nbsp;&nbsp;像：
	<input type="file" name="head">
	<br>
	 

	<label for="usernme">用户名：</label>
	<input type="text" name="username" />
	<br>

	<label for="password">密 &nbsp;&nbsp;码：</label>
	<input type="password" name="password" />
	<br>

	<label for="sex">性 &nbsp;&nbsp;别：</label>
	男<input type="radio" name="sex" value="男"/>
	女<input type="radio" name="sex" value="女"/>
	<br>

	<label for="hobby1">爱 &nbsp;&nbsp;好：</label>
	旅游<input type="checkbox" name="hobby1" value="旅游"/>
	游戏<input type="checkbox" name="hobby1" value="游戏"/>
	音乐<input type="checkbox" name="hobby1" value="音乐"/>
	<br>

	<label>学 &nbsp;&nbsp;历：</label>
	<select name="qualification">
		<option>本科</option>
		<option>大专</option>
		<option>小学</option>
	</select>
	<br>
	
	<label>自我介绍：</label>
	<textarea name="balabala"></textarea>
	<br>

	<input type="submit" name="submit">

</form>