<!doctype html>
<html lang="en">
<head>
	<!--
    	Assignment 3
    	Name: MrJ
    	Date:   9/10/2024
	Purpose: A PHP script that will process and display user information.
	It receives its info from user_input.html via $_POST.
	-->
	<meta charset="utf-8">
	<title>User Information</title>
	<link href="style.css" rel="stylesheet" />
</head>
<body>
	<?php
	
	// Variables: first_name, last_name, email, phone, address, city, state, zip, and submit_form
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	
	// Print the received data in table format:
	print "
	<table>
		<th colspan=2>Information for $first_name $last_name</th>
		<!-- Places the first table row of table data items -->
		<tr>
			<td>Name:</td>
			<td>$first_name $last_name</td>
		</tr>
		<!-- Places the second table row of table data items -->
		<tr>
			<td>Address:</td>
			<td>$address</td>
		</tr>
		<!-- Places the third table row of table data items -->
		<tr>
			<td>City, State, Zip:</td>
			<td>$city, $state, $zip</td>
		</tr>
		<!-- Places the fourth table row of table data items -->
		<tr>
			<td>Telephone #:</td>
			<td>$phone</td>
		</tr>
		<!-- Places the fifth table row of table data items -->
		<tr>
			<td>Email:</td>
			<td>$email</td>
		</tr>
		<!-- Places the sixth table row of table data items -->
		<tr>
			<td><a href='user_input.html' class='button'>Return to Input Form</a></td>
		</tr>
	</table>	
	";
	
	?>
</body>
</html>
