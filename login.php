<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>登录页</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <div class="header">
  	<h2>登录</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>用户名</label>
  		<input type="text" name="username" placeholder="请输入登录账号"/>
  	</div>
  	<div class="input-group">
  		<label>密码</label>
  		<input type="password" name="password" placeholder="请输入密码" />
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">登录</button>
  	</div>
  	<p>
  		还不是会员? <a href="register.php">注册</a>
  	</p>
  </form>
</body>
</html>