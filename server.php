<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('sql302.epizy.com', 'epiz_30812190', 'zsMMuyHI2u', 'epiz_30812190_register');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  if($username == "username" || $password == "password" || $email == "email" || $usertype == "usertype")
// form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "用户名是必需的"); }
  if (empty($email)) { array_push($errors, "电邮地址是必需的"); }
  if (empty($password_1)) { array_push($errors, "密码是必需的"); }
  if ($password_1 != $password_2) {
	array_push($errors, "两个密码不匹配");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "用户名是必需的");
    }

    if ($user['email'] === $email) {
      array_push($errors, "电箱地址是必需的");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	  	mysqli_query($db, $query);
  	$_SESSION['admin'] = $usertype;
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "您现在已登录";
  	header('location: admin/index.php');
  	
  	mysqli_query($db, $query);
  	$_SESSION['user'] = $usertype;
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "您现在已登录";
  	header('location: index.php');
  }
}
// ...  
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "用户名是必需的");
  }
  if (empty($password)) {
  	array_push($errors, "密码是必需的");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['admin'] = $usertype;
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "您现在已登录";
  	  header('location: admin/index.php');
  	  
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user'] = $usertype;
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "您现在已登录";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "错误的用户名/密码组合");
  	}
  }
}

?>

