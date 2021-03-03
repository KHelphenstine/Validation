<?php
	if(!empty($_GET['email'])) $email = $_GET['email']; else $email="";
	if(!empty($_GET['phone'])) $phone = $_GET['phone']; else $phone="";
	if(!empty($_GET['zip'])) $zip = $_GET['zip']; else $zip="";
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
		<?php
			echo '<h1>Please enter your information below</h1>
			<form action="process.php" method="post">
				<label>Email</label><br>
				<input type="email" name="email" placeholder="myemail@email.com" value="'.$email.'"><br>
				<label>Phone Number</label><br>
				<input type="tel" name="phone" placeholder="(xxx)xxx-xxxx" value="'.$phone.'"><br>
				<label>Zip Code</label><br>
				<input type="text" name="zip" placeholder="xxxxx" value="'.$zip.'"><br>
				<input type="reset" name="reset" id="reset">
				<input type="submit" name="submit" id="submit">
			</form>'
		?>
	</body>
</html>

<?php
	//if submit button has been pushed			
	if(isset($_GET['submit']))
	{
		//if email validates
		if((filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (!preg_match('/^\d{5}$/', $zip))) 
		{
			$email = $_GET['email']; $phone = ""; $zip = "";
			echo "<p>Please re-enter the phone number and zip code</p>";
		}
		//if email and phone validate
		if((filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (!preg_match('/^\d{5}$/', $zip)))
		{
			$email = $_GET['email']; $phone = $_GET['phone']; $zip = "";
			echo "<p>Please re-enter the zip code</p>";
		}
		//if email and zip validate
		if((filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (preg_match('/^\d{5}$/', $zip)))
		{
			$email = $_GET['email']; $phone = ""; $zip = $_GET['zip'];
			echo "<p>Please re-enter the phone number</p>";
		}
		//if phone validates
		if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (!preg_match('/^\d{5}$/', $zip)))
		{
			$email = ""; $phone = $_GET['phone']; $zip = "";
			echo "<p>Please re-enter the email and zip code</p>";
		}
		//if phone and zip validate
		if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (preg_match('/^\d{5}$/', $zip)))
		{
			$email = ""; $phone = $_GET['phone']; $zip = $_GET['zip'];
			echo "<p>Please re-enter the email</p>";
		}
		//if zip validates
		if((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (preg_match('/^\d{5}$/', $zip)))
		{
			$email = ""; $phone = ""; $zip = $_GET['zip'];
			echo "<p>Please re-enter the email and phone number</p>";
		}
		//if nothing validates
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (!preg_match('/^\d{5}$/', $zip))) 
		{
			echo "<p>Please enter the email, phone, and zip code</p>";
		}
	}
?>
