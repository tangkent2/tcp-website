<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "你必须先登录";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>主页</title>
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
	<h2>主页</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>欢迎</p>
        <strong><?php echo $_SESSION['username']; ?></strong>
                <p> <a href="crepe.jar" download>crepe挂</a> </p>
                <p> <a href="高版本材质包part1.zip" download>高版本材质包part1</a> </p>
    	<p> <a href="index.php?logout='1'" style="color: red;">登出</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>