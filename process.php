<?php
	//retrieve data from index via POST
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$zip = $_POST['zip'];
	$submit = $_POST['submit'];
	
	//validate email, phone & zip
	if((filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match('/^[(]\d{3}[)]\d{3}-\d{4}$/', $phone)) && (preg_match('/^\d{5}$/', $zip)))
	{
		echo "<h2>Thank you for providing the following data:<br></h2><p id='data'>Email: $email<br> Phone Number: $phone<br> Zip Code: $zip</p>";
	}
	else
	{
		header('location: index.php?submit='.$submit.'&email='.$email.'&phone='.$phone.'&zip='.$zip);
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Data Validation Processed</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&family=Lobster&display=swap" rel="stylesheet">
	</head>
	<body>
	</body>
</html>
