<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=" />
	<meta charset="UTF-8">
	
	<link type="text/css" href="./css/style2.css" rel="stylesheet" />
	<link type="text/css" href="./css/login.css" rel="stylesheet" />
	
	<script type='text/javascript' src='./js/jquery-1.4.2.min.js'></script>	<!-- jquery library -->
	<script language="javascript">
		function validasi(form)
		{
			if (form.username.value == "")
			{
				alert("Anda belum mengisikan Username.");
				form.username.focus();
				return (false);
			}
     
			if (form.password.value == "")
			{
				alert("Anda belum mengisikan Password.");
				form.password.focus();
				return (false);
			}
			return (true);
		}
	</script>
</head>
<body OnLoad="document.login.username.focus();">
	<div id="background">
		<div id="container">
			<div id="box">
				
				<h3>Login Administrator</h3>
				<img src="images/logo.png" style="margin-right: 192px;position: absolute;z-index: 10; width:183px; background: linear-gradient(to bottom, #FA8F06 0%, rgb(247, 247, 247) 100%);padding-top: 132px;margin-top: -58px;padding-bottom: 132px; border-left: 10px solid #FFF;margin-left: -30px;padding-left: 10px;padding-right: 10px;">
				<br><br>
				<form name="login" action="login.php" method="POST" onSubmit="return validasi(this) ">
					<div class="one_half">
					<input type="text" name="username" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;username&quot;); }" onClick="jQuery(this).val(&quot;&quot;);" placeholder="Masukkan Username" />
					</div></br></br>
					<div class="one_half last">
						<input type="password" name="password" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;asdf1234&quot;); }" onClick="jQuery(this).val(&quot;&quot;);" placeholder="Masukkan Password">
						<p><input type="submit" value="Login" class="login" /></p>
					</div></br></br>
				</form> </br>
			 <div class='copyr'>Developed by JogjaSite.com</div>
			</div> 
		</div>
	</div>
</body>
</html>
