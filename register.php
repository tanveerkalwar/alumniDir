
<html>
<head>
<title>Register - Alumni Directory</title>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include("header.php"); 
$db=mysqli_connect('localhost','root','tanveer55','alumniDirectory');
?>
<script>
function validateForm() {
  var fname = document.forms["register"]["fname"].value;
  if (fname == "") {
    alert("First name should not be blank");
    return false;
  }
  var lname = document.forms["register"]["lname"].value;
  if (lname == "") {
    alert("Last name should not be blank");
    return false;
  }
  var batch = document.forms["register"]["batch"].value;
  if (batch == "") {
    alert("batch should not be blank");
    return false;
  }
  var department = document.forms["register"]["department"].value;
  if (department == "") {
    alert("department should not be blank");
    return false;
  }
 
  var email = document.forms["register"]["email"].value;
  if (email == "") {
    alert("email should not be blank");
    return false;
  }
  var password_1 = document.forms["register"]["password_1"].value;
  var password_2 = document.forms["register"]["password_2"].value;
  if (password_1 == "") {
    alert("password should not be blank");
    return false;
  }
  
  if (password_1 != password_2) {
    alert("Both password should match");
    return false;
  }
  
}


var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

</script>
</head>
<body>

<form method="post" action="register.php" name="register" enctype="multipart/form-data" onsubmit="return validateForm()">

<div class="input">
        <h1 class="formtagRegister">Register</h1>
<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
<p><img id="output" width="250" height="250" /></p>
<p><label class ="imglabel" for="file" style="cursor: pointer;">Upload your image</label></p>
</div>
	<div class="input">
		<label>First Name*</label>
		<input type="text" name="fname" value="">
	</div>
    <div class="input">
		<label>Last Name*</label>
		<input type="text" name="lname" value="">
	</div>
		<div class="input">
		<label>Batch*</label>
		<input type="number" min="2017" max="2022" step="1" name="batch" value="" />
	</div>
	<div class="input">
		<label>Department*</label>
		<input type="text" name="department" value="">
	</div>
	<div class="input">
		<label>Email*</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input">
		<label>Phone</label>
		<input type="tel" name="phone" value="">
	</div>
	<div class="input">
		<label>Password*</label>
		<input type="password" name="password_1">
	</div>
	<div class="input">
		<label>Confirm password*</label>
		<input type="password" name="password_2">
	</div>
	<div class="input">
		<label>Current Occupation</label>
		<input type="text" name="occupation" value="">
	</div>
	<div class="input">
		<label>Current Employer</label>
		<input type="text" name="employer" value="">
	</div>
	<div class="input">
		<label>Salary</label>
		<input type="number" name="salary" value="">
	</div>
	<div class="input">
		<label>Facebook</label>
		<input type="url" name="facebook" value="">
	</div>
	<div class="input">
		<label>LinkedIn</label>
		<input type="url" name="linkedin" value="">
	</div>
	<div class="input">
		<label>GitHub</label>
		<input type="url" name="github" value="">
	</div>
	<div class="input">
		<label>Personal Website</label>
		<input type="url" name="pwebsite" value="">
	</div>
	<div class="input">
		<label>Achievements & Projects</label>
		<textarea name="achievement" rows="9" cols="53"></textarea>
	</div>
	<div class="input">
		<button type="submit" class="rbtn" name="submit">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>

<?php



$email=NULL;
$password_1=NULL;
$fname=NULL;
$lname=NULL;
$batch=NULL;
$department=NULL;
$occupation=NULL;
$employer=NULL;
$salary=NULL;
$facebook=NULL;
$phone=NULL;
$img=NULL;
$linkedin=NULL;
$github=NULL;
$pwebsite=NULL;
$achievement=NULL;

if (isset($_POST['submit'])){
$email=$_POST['email'];
$password_1=$_POST['password_1'];
$password_2=$_POST['password_2'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$batch=$_POST['batch'];
$department=$_POST['department'];
$occupation=$_POST['occupation'];
$employer=$_POST['employer'];
$salary=$_POST['salary'];
$facebook=$_POST['facebook'];
$phone=$_POST['phone'];
$linkedin=$_POST['linkedin'];
$github=$_POST['github'];
$pwebsite=$_POST['pwebsite'];
$achievement=$_POST['achievement'];
}

if(isset($_FILES['image'])){
    $img=$_FILES['image']['name'];
}

$squery = "SELECT email FROM alumniDirectory.users WHERE email='$email'";
$sresult = $db->query($squery);

$count=mysqli_num_rows($sresult);

if($count==1){
	
	echo '<script type="text/javascript"> alert("Error! Account already exist");</script>';
}

$iquery ="INSERT INTO alumniDirectory.users(email,password,fname,lname,batch,department,occupation,employer,salary,facebook,phone,image,linkedin,github,pwebsite,achievement)
         VALUES('$email','$password_1','$fname','$lname',$batch,'$department','$occupation','$employer',$salary,'$facebook',$phone,'$img','$linkedin','$github','$pwebsite','$achievement')";
$iresult =$db->query($iquery);

if($iresult){	
	move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/htdocs/alumn-directory/images/'.$img);
    echo '<script type="text/javascript"> alert("Congrats! Account created successfully"); window.location.href="login.php"; </script>';
}


			  
?>

</body>
</html>

