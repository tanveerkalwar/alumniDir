<?php 
session_start();
include("header.php");
$db=mysqli_connect('localhost','root','tanveer55','alumniDirectory');
?>
<html>
<head>
<title>Login - Alumni Directory</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
function validateForm() {
  var email = document.forms["login"]["email"].value;
  if (email == "") {
    alert("Email should not be blank");
    return false;
  }
  var password = document.forms["login"]["password_1"].value;
  if (password == "") {
    alert("Password should not be blank");
    return false;
  }
 }
</script>
</head>
<body>
<form method="POST" name= "login" action="login.php" onsubmit="return validateForm()">
<h1 class="formtag">Login</h1>
	<div class="input">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input">
		<button type="submit" class="rbtn" name="login">Login</button>
		<a href="register.php"><button type="button" class="rbtnlogin" name="Register">Register</button></a>
	</div>
	<p>
		<a href="reset.php">Forgotten password?</a>
	</p>
	
</form>

</body>
</html>

<?php

$email=NULL;
$password_1=NULL;

if (isset($_POST['login'])){
$email=$_POST['email'];
$password_1=$_POST['password_1'];
}
$query = "SELECT * FROM alumniDirectory.users WHERE email='$email' and password='$password_1'";
$result = $db->query($query);

if(isset($_POST['login'])){

$data=mysqli_fetch_assoc($result);
$_SESSION['user']=$data['email'];

if($data){
	
	header("location:dashboard.php");
	
	}else{

	echo '<script type="text/javascript"> alert("Wrong email or password");</script>';
	
	}
}

 
?>