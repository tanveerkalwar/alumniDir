<?php 
include("pannel.php");?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php 
if(isset($_SESSION['user'])){
	
	
   echo "<div class='dashboard' <center><h1>" . "Welcome " . $_SESSION['user'] . "</h1></center></div>";

	
}else{
	
	header("location:login.php");
}
?>


</body>
</html>