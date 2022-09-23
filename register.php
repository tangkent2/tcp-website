<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
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
  	<h2>注册</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>用户名</label>
  	  <input type="text" name="username" placeholder="请输入注册账号"/ value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>邮箱地址</label>
  	  <input type="email" name="email" placeholder="请输入邮箱"/ value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>密码</label>
  	  <input type="password" name="password_1" placeholder="请输入密码" />
  	</div>
  	<div class="input-group">
  	  <label>确认密码</label>
  	  <input type="password" name="password_2" placeholder="请再次输入密码" />
  	</div>
  	<div class="input-group">
  	<label>用户</label>
  	<input type="usertype" name="user" value="<?php echo $usertype; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">注册</button>
  	</div>
  	<p>
  		已经是会员？ <a href="login.php">登录</a>
  	</p>
  </form>
</body>
</html>