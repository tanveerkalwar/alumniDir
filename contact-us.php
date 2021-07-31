<html>
<head>
<title>Contact us - Alumni Directory</title>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include("header.php"); ?>
</head>
<body>

<form method="post" action="register.php">
<h2 class="formtag">Contact us</h2>
	<div class="input">
		<label>Name</label>
		<input type="text" name="Name" value="">
	</div>
	<div class="input">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div>
	<div class="input">
		<label>Subject</label>
		<input type="text" name="Subject">
	</div>
	<div class="input">
		<label>Description</label>
		<textarea rows="11" cols="53" name="description" value=""></textarea>
	</div>
	<div class="input">
		<button type="submit" class="rbtn" name="submit">submit</button>
	</div>
</form>

</body>
</html>