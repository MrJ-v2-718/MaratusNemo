<!doctype html>
<html lang="en">
<head>
	<!--
    Assignment 5
    Name: MrJ
    Date:   10/02/2024
	Purpose: A PHP script that will process and display user information.
	It receives its info from user_input.html via $_POST.
	-->
	<meta charset="utf-8">
	<title>String Manipulation</title>
		<style type="text/css">
				table, td { border: 1px solid black; }
				td { width: 12em; }
				.column1 { font-weight: bold; text-align: left; }
				.column2 { text-align: right; }
		</style>
</head>
<body>
	<?php

	// Variables: full_name, telephone_number, email_address, notes, and submit_form
	$full_name = $_POST['full_name'];
	$telephone_number = $_POST['telephone_number'];
	$email_address = $_POST['email_address'];
	$notes = $_POST['notes'];
	
	// Separate full_name into first_name and last_name with no superfluous whitespace
	$full_name = trim($full_name);
	$first_name = strtok($full_name, ' ');
	$first_name = trim($first_name);
	$full_name = strrev($full_name);
	$last_name = strrev(strtok($full_name, ' '));
	$last_name = trim($last_name);
	
	// Ensure proper capitalization for names
	$first_name = ucwords(strtolower($first_name));
	$last_name = ucwords(strtolower($last_name));
	
	// Ensure telephone number has no dashes, spaces, or parenthesis
	$removal_array = array('-', ' ', '(', ')');
	$telephone_number = str_replace($removal_array, '', $telephone_number);
	
	// Separate email address into username and domain Name
	$email_address_array = explode('@', $email_address);
	$username = str_replace(' ', '', strtolower($email_address_array[0]));
	$domain_name = str_replace(' ', '', strtolower($email_address_array[1]));
	
	// Strip all HTML and PHP tags, replace each space with a dash (-), and
	// extract only the first 30 characters
	$notes = str_replace(' ', '-', strip_tags($notes));
	$notes = substr($notes, 0, 30);
	
	// Converts new line characters to HTML5 line breaks (<br>)
	$notes = nl2br($notes, false);
	
	// Print the received data in table format:
	print "
	<header>
		<h1>Information for $first_name $last_name</h1>
	</header>
	<table>
		<!-- Places the first table row of table data items -->
		<tr>
			<td>First Name:</td>
			<td>$first_name</td>
		</tr>
		<!-- Places the second table row of table data items -->
		<tr>
			<td>Last Name:</td>
			<td>$last_name</td>
		</tr>
		<!-- Places the third table row of table data items -->
		<tr>
			<td>Telephone Number:</td>
			<td>$telephone_number</td>
		</tr>
		<!-- Places the fourth table row of table data items -->
		<tr>
			<td>Username:</td>
			<td>$username</td>
		</tr>
		<!-- Places the fifth table row of table data items -->
		<tr>
			<td>Domain:</td>
			<td>$domain_name</td>
		</tr>
		<!-- Places the sixth table row of table data items -->
		<tr>
			<td>Notes:</td>
			<td>$notes</td>
		</tr>
	</table>
	";

	?>
</body>
</html>