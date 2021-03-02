<?php
	$email = "";
	$phone = "";
	$zip = "";	
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Data Validation</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Lobster&display=swap" rel="stylesheet">
	</head>
	<body>
		<h1>Please enter your information below</h1>
		<form action="process.php" method="post">
			<label>Email</label><br>
			<input type="email" name="email" placeholder="myemail@email.com" value="<?php echo $email;?>"><br>
			<label>Phone Number</label><br>
			<input type="tel" name="phone" placeholder="(xxx)xxx-xxxx" value="<?php echo $phone;?>"><br>
			<label>Zip Code</label><br>
			<input type="text" name="zip" placeholder="xxxxx" value="<?php echo $zip;?>"><br>
			<input type="reset" name="reset" id="reset">
			<input type="submit" name="submit" id="submit">
		</form>
	</body>
</html>

<?php
	if(isset($_GET['submit']))
	{
		//if email validates
		if(filter_var($email))
		{
			$email = $_POST['email']; $phone = ""; $zip = "";
			echo "<p>Please re-enter the phone number and zip code</p>";
		}
		//if email and phone validate
		if((filter_var($email)) && (preg_match('/[(]\d{3}[)]\d{3}-\d{4}/', $phone)))
		{
			$email = $_POST['email']; $phone = $_POST['phone']; $zip = "";
			echo "<p>Please re-enter the zip code</p>";
		}
		//if email and zip validate
		if((filter_var($email)) && (preg_match('/\d{5}/', $zip)))
		{
			$email = $_POST['email']; $phone = ""; $zip = $_POST['zip'];
			echo "<p>Please re-enter the phone number</p>";
		}
		//if phone validates
		if((preg_match('/[(]\d{3}[)]\d{3}-\d{4}/', $phone)))
		{
			$email = ""; $phone = $_POST['phone']; $zip = "";
			echo "<p>Please re-enter the email and zip code</p>";
		}
		//if phone and zip validate
		if((preg_match('/[(]\d{3}[)]\d{3}-\d{4}/', $phone)) && (preg_match('/\d{5}/', $zip)))
		{
			$email = ""; $phone = $_POST['phone']; $zip = $_POST['zip'];
			echo "<p>Please re-enter the email</p>";
		}
		//if zip validates
		if((preg_match('/\d{5}/', $zip)))
		{
			$email = ""; $phone = ""; $zip = $_POST['zip'];
			echo "<p>Please re-enter the email and phone number</p>";
		}
		//if nothing validates
		else
		{
			$email = ""; $phone = ""; $zip = "";
			echo "<p>Please enter the email, phone, and zip code</p>";
		}
	}
?>
