
<script src="../jquery-1.12.0.min.js"></script>

<script>
// window.onload = function(){
// 	document.getElementsByName("username")[0].onblur = function(){
// 		xmlhttp = new XMLHttpRequest();
// 		xmlhttp.open("get", "index_check.php?action=check", true);
// 		xmlhttp.send();
// 		xmlhttp.onreadystatechange = function(){
// 			// alert(this.responseText);
// 			console.log(this);
// 			document.getElementById("usr_err").innerHTML = this.responseText;
// 		}
// 	}
// }

$(function(){

	

	$("input:button").click(function(){
	// alert(username);
	var username = $("#username").val();
	var password = $("#password").val();
	var data = {
		"username":username,
		"password":password
	}

		$.ajax({
			url:"index_check.php",
			type: "post",
			data: "data=" + JSON.stringify(data),
			dataType: "json",
			success: function(data){
				$("h1").html(data);
				console.log(data);
			},
			error: function(){
				alert("wrong");
			}
		})	
	})
	
})

</script>


<form>
	<br>
	<input type="text" name="username" id="username"/><p id="usr_err"></p>
	<br>
	<h1></h1>
	<br>
	<input type="password" name="password" id="password" />
	<br>
	<br>
	<input type="button" value="登陆"/>
</form>