<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
function validateForm() {
  var password_1 = document.forms["cpassword"]["password_1"].value;
  var password_2 = document.forms["cpassword"]["password_2"].value;
  if (password_1 == "") {
    alert("password should not be blank");
    return false;
  }
  
  if (password_1 != password_2) {
    alert("Both password should match");
    return false;
  }
  
}
</script>
</head>
<body>
<?php include("pannel.php");?>
<form method="post" action="password.php" name="cpassword" onsubmit="return validateForm()">
<h1 class="formtag">Change Password</h1>
	<div class="input">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $_SESSION['user'];?>" readonly>
	</div>
	<div class="input">
		<label>New Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input">
		<label>Confirm New Password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input">
		<button type="submit" class="rbtn" name="cpassword">Change Password</button>
	</div>
</form>

</body>
</html>

<?php
$db=mysqli_connect('localhost','root','tanveer55','alumniDirectory');

$email=NULL;
$password_2=NULL;

if (isset($_POST['cpassword'])){
	
$email=$_SESSION['user'];
$password_2=$_POST['password_2'];

}
$query = "UPDATE alumniDirectory.users SET password='$password_2' WHERE email='$email'";
$result = $db->query($query);


$squery = "SELECT password FROM alumniDirectory.users WHERE email='$email'";
$sresult = $db->query($squery);

while ($row = $sresult->fetch_assoc()) {
      $newpassword=$row['password'];
}

$count=mysqli_num_rows($sresult);

if($count==1){

if($newpassword==$password_2){
	
	echo '<script type="text/javascript"> alert("Congrats! Your password is changed.");</script>';
}

}


?>