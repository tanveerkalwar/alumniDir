<?php

$db=mysqli_connect('localhost','root','tanveer55','alumniDirectory');

$search=NULL;


if (isset($_POST['search'])){
$search=$_POST['searchq'];
}


$query = "SELECT * FROM alumniDirectory.users WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR batch LIKE '%$search%' OR department LIKE '%$search%' OR occupation LIKE '%$search%' OR employer LIKE '%$search%' OR email LIKE '%$search%'";
$result = $db->query($query);


$count=mysqli_num_rows($result);


if($search=='All' OR $search=='all'){
	

	$query = "SELECT * FROM alumniDirectory.users";
    $result = $db->query($query);

}



if($count==0 && $search!='All'){
	
	echo '<script type="text/javascript"> alert("Sorry! No records found");</script>';

}

$cquery = "select count(email) from users";
$cresult = $db->query($cquery);

$crow = $cresult->fetch_assoc();

$equery = "select count(employer) from users";
$eresult = $db->query($equery);

$erow = $eresult->fetch_assoc();

$squery = "select avg(salary) from users";
$sresult = $db->query($squery);

$srow = $sresult->fetch_assoc();

$value=$srow['avg(salary)'];


?>

<html>
<head>
<title>Alumni Directory - SALU Ghotki</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  


<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section class="first"> 
<ul class="alist">
<li class="alist"><a href="#">Home</a></li>
<li class="alist"><a href="login.php">Login</a></li>
<li class="alist"><a href="register.php">Register</a></li>
<li class="alist"><a href="contact-us.php">Contact us</a></li>
</ul>
<div class="searchBox">
<form method="POST" action="alumni.php" name="searchform" >
<div class="srch">
      <h1>Alumni Directory</h1><h4>Shah Abdul Latif University Ghotki Campus</h4>
     <input type="text" class="search" placeholder="Search.." name="searchq">
	 <a href="#second"><button type="submit" class="submitbt" name="search"></button></a>
	 <p class="AllQuery">*To fetch all profiles please type 'All' and perform search</p>
</div>
</form>

<div class="NAlumni"><p class="CNum"> <?php echo $crow['count(email)'];?></p><br> ALUMNI</div>
<div class="NEmployed"><p class="ENum"> <?php echo $erow['count(employer)'];?></p><br>EMPLOYED</div>
<div class="NSalary"><p class="SNum"> <?php echo $value ?></p><br>AVGSALARY</div>
<script src="numscript.js"></script> 

</section>


<section class="second">

   
<?php

if($search){
	
while($row=mysqli_fetch_array($result))
{
	?>
	<div class="card">
  <img width="250" height="250" width="100%" src="http://localhost/alumn-directory/images/<?php echo$row['image'];?>">
  <h1><?php echo $row['fname']. " ". $row['lname']; ?></h1>
  <p class="title"><?php echo $row['occupation'].", ".$row['employer']; ?></p>
  <p class="title"><?php echo "Current Salay PKR: ".$row['salary']; ?></p>
  <p><?php echo $row['department']." Batch ".$row['batch']; ?></p>
  <div class="cardlinks" style="margin: 24px 0;">
    <a href="tel:<?php echo $row['phone']; ?>" ><i class="fa fa-phone"></i></a> 
	<a href="mailto:<?php echo $row['email']; ?>"><i class="fa fa-envelope"></i></a> 
    <a href="<?php echo $row['pwebsite']; ?>" target="_blank"><i class="fa fa-globe"></i></a> 
    <a href="<?php echo $row['github']; ?>" target="_blank"><i class="fa fa-github"></i></a> 
    <a href="<?php echo $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>  
    <a href="<?php echo $row['facebook']; ?>"target="_blank>"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><a href="<?php echo $row['pwebsite']; ?>"target="_blank"><button class="vmore">VIEW MORE</button></p></a>
</div>
	

	
	<?php
	
}}


?>
</section>
</body>
</html>


