

<script>
window.onload = function(){
	document.getElementsByName("username")[0].onblur = function(){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("get", "index_check.php?action=check", true);
		xmlhttp.send();
		xmlhttp.onreadystatechange = function(){
			// alert(this.responseText);
			console.log(this);
			document.getElementById("usr_err").innerHTML = this.responseText;
		}
	}
}
</script>


<form>
	<br>
	<input type="text" name="username" /><p id="usr_err"></p>
	<br>
	<br>
	<input type="password" name="password" />
	<br>
	<br>
	<input type="submit" />
</form>