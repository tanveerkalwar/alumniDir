<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include("pannel.php");

$db=mysqli_connect('localhost','root','tanveer55','alumniDirectory');

$email=$_SESSION['user'];

$query = "SELECT * FROM alumniDirectory.users WHERE email='$email'";

$result = $db->query($query);

$data=mysqli_fetch_assoc($result);


?>

<form method="post" action="profile.php" name="update">
<h1 class="formtag">Update your profile</h1>
<div class="input">
<img width="250" height="250" width="100%" src="http://localhost/alumn-directory/images/<?php echo $data['image'];?>">
</div>
<div class="input">
        <label>Update your image</label>
		<input type="file" name="image" value="<?php echo $data['image'];?>">
</div>
	<div class="input">
		<label>First Name</label>
		<input type="text" name="fname" value="<?php echo $data['fname'];?>">
	</div>
    <div class="input">
		<label>Last Name</label>
		<input type="text" name="lname" value="<?php echo $data['lname'];?>">
	</div>
		<div class="input">
		<label>Batch</label>
		<input type="number" min="2017" max="2022" step="1" name="batch" value="<?php echo $data['batch'];?>" />
	</div>
	<div class="input">
		<label>Department</label>
		<input type="text" name="department" value="<?php echo $data['department'];?>">
	</div>
	<div class="input">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $data['email'];?>" readonly>
	</div>
	<div class="input">
		<label>Phone</label>
		<input type="tel" name="phone" value="<?php echo $data['phone'];?>">
	</div>
	<div class="input">
		<label>Current Occupation</label>
		<input type="text" name="occupation" value="<?php echo $data['occupation'];?>">
	</div>
	<div class="input">
		<label>Current Employer</label>
		<input type="text" name="employer" value="<?php echo $data['employer'];?>">
	</div>
	<div class="input">
		<label>Salary</label>
		<input type="number" name="salary" value="<?php echo $data['salary'];?>">
	</div>
	<div class="input">
		<label>Facebook</label>
		<input type="url" name="facebook" value="<?php echo $data['facebook'];?>">
	</div>
	<div class="input">
		<label>LinkedIn</label>
		<input type="url" name="linkedin" value="<?php echo $data['linkedin'];?>">
	</div>
	<div class="input">
		<label>GitHub</label>
		<input type="url" name="github" value="<?php echo $data['github'];?>">
	</div>
	<div class="input">
		<label>Personal Website</label>
		<input type="url" name="pwebsite" value="<?php echo $data['pwebsite'];?>">
	</div>
	<div class="input">
		<label>Achievements & Projects</label>
		<textarea name="achievement" rows="9" cols="53"> <?php echo $data['achievement'];?></textarea>
	</div>
	<div class="input">
		<button type="submit" class="rbtn" name="update">Update</button>
	</div>
</form>

</body>
</html>

<?php


$email=$_SESSION['user'];
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

if (isset($_POST['update'])){
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


$query ="UPDATE alumniDirectory.users SET fname='$fname',lname='$lname',batch=$batch,
		  department='$department',occupation='$occupation',
		  employer='$employer',salary=$salary,facebook='$facebook',
		  phone='$phone',image='$img',linkedin='$linkedin',github='$github',
		  pwebsite='$pwebsite',achievement='$achievement' WHERE email='$email'";
		  
$result = $db->query($query);

if($result){	
	move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/htdocs/alumn-directory/images/'.$img);
  
}

if($result){	
    echo '<script type="text/javascript"> alert("Congrats! Your profile is updated");</script>';

}



?>