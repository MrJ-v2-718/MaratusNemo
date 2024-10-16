<!doctype html>
<html lang="en">
<head>
	<!--
    Assignment 6
    Name: MrJ
    Date:   10/16/2024
	Purpose: A PHP script that will process and display an order summary.
	It receives its info from user_input.html via $_POST.
	-->
	<meta charset="utf-8">
	<title>Order Summary</title>
		<style type="text/css">
				table, td, th { border: 1px solid black; }
				h1 { margin-left: 2.5em; }
				h3 { margin-left: 7.35em; }
				.error { color: red; }
				.button {
					background-color: black;
					border: none;
					color: white;
					padding: 8px 16px;
					text-decoration: none;
					margin: 4px 2px;
					cursor: pointer;
				}
		</style>
</head>
<body>
	<?php
	
	// Flag variable to track success
	$okay = true;

	// Variables: coffee, type, quantity, name, email_address, phone_number, 
	// address, city, state, zip, submit_form
	
	// Associative array for storing coffee names and prices
	$coffee_prices = [
		'Boca Villa' => 7.99,
		'South Beach Rhythm' => 8.99,
		'Pumpkin Paradise' => 8.99,
		'Sumatran Sunset' => 9.99,
		'Bali Batur' => 10.95,
		'Double Dark' => 9.95
	];
	
	// Verify type is selected before assigning value to variable
	if (!isset($_POST['type'])) {
		print "<p class=\"error\">Please select regular or decaffeinated.</p>";
		$okay = false;
	} else {
		// Type is assigned 0.00 if caffeinated and 1.00 if decaffeinated
		$type = $_POST['type'];
		// Assigns type name for later display
		if ($type == "0.00") {
			$type_name = "Caffeinated";
		} else {
			$type_name = "Decaffeinated";
		}
		
	}

	// Verify coffee is selected before assigning value to variable
	if ($_POST['coffee'] == "select") {
		print "<p class=\"error\">Please select a coffee to be purchased.</p>";
		$okay = false;
	} else {
		if ($okay) {
			$coffee = $_POST['coffee'];
			// Make coffee selection a nicely formatted name for later display
			// Possible values for coffee: boca_villa, south_beach, pumpkin, sumatran, bali_batur, double_dark
			if ($coffee == "boca_villa") {
				$coffee = 'Boca Villa';
				$coffee_price = $coffee_prices[$coffee] + $type;
			} else if ($coffee == "south_beach") {
				$coffee = 'South Beach Rhythm';
				$coffee_price = $coffee_prices[$coffee] + $type;
			} else if ($coffee == "pumpkin") {
				$coffee = 'Pumpkin Paradise';
				$coffee_price = $coffee_prices[$coffee] + $type;
			} else if ($coffee == "sumatran") {
				$coffee = 'Sumatran Sunset';
				$coffee_price = $coffee_prices[$coffee] + $type;
			} else if ($coffee == "bali_batur") {
				$coffee = 'Bali Batur';
				$coffee_price = $coffee_prices[$coffee] + $type;
			} else {
				$coffee = 'Double Dark';
				$coffee_price = $coffee_prices[$coffee] + $type;
			}
		}
		
	}

	// Verify quantity is numeric before assigning value to variable
	if (!is_numeric($_POST['quantity'])) {
		print "<p class=\"error\">Please enter a numeric value for quantity.</p>";
		$okay = false;
	} else {
		$quantity = $_POST['quantity'];
	}

	// Verify name is filled in
	if (empty($_POST['name'])) {
		print "<p class=\"error\">Please enter a name.</p>";
		$okay = false;
	} else {
		$name = $_POST['name'];
	}

	// Verify email is filled in
	if (empty($_POST['email_address'])) {
		print "<p class=\"error\">Please enter an e-mail address.</p>";
		$okay = false;
	} else {
		$email_address = $_POST['email_address'];
	}

	// Verify phone number is filled in
	if (empty($_POST['phone_number'])) {
		print "<p class=\"error\">Please enter a phone number.</p>";
		$okay = false;
	} else {
		$phone_number = $_POST['phone_number'];
	}

	// Verify address is filled in
	if (empty($_POST['address'])) {
		print "<p class=\"error\">Please enter an address.</p>";
		$okay = false;
	} else {
		$address = $_POST['address'];
	}

	// Verify city is filled in
	if (empty($_POST['city'])) {
		print "<p class=\"error\">Please enter a city.</p>";
		$okay = false;
	} else {
		$city = $_POST['city'];
	}

	// Verify state is filled in
	if (empty($_POST['state'])) {
		print "<p class=\"error\">Please enter a state.</p>";
		$okay = false;
	} else {
		$state = $_POST['state'];
	}
	
	// Verify zip is filled in
	if (empty($_POST['zip'])) {
		print "<p class=\"error\">Please enter a zip code.</p>";
		$okay = false;
	} else {
		$zip = $_POST['zip'];
	}
	
	// If form is filled out incorrectly, include a link to return to previous form
	if (!$okay) {
		print "<br><a href='user_input.html' class='button'>Return to Order Form</a>";
	}
	
	// Print the order summary if form is filled out correctly
	if ($okay) {
		// Calculate total cost
		$total_cost = $coffee_price * $quantity;
		$total_cost = number_format($total_cost, 2);
		
		print "
			<header>
				<h1>The Coffee House</h1>
				<h3>Order Summary</h3>
			</header>
			<p>
				Name: $name<br>
				Address: $address<br>
				City, State, Zip: $city, $state, $zip<br>
				Phone Number: $phone_number<br>
				E-mail Address: $email_address<br>
			</p>
			<table>
				<!-- Places the first table row of table data items -->
				<tr>
					<th>Coffee</th>
					<th>Type</th>
					<th>Quantity</th>
					<th>Unit Cost</th>
					<th>Total</th>
				</tr>
				<!-- Places the second table row of table data items -->
				<tr>
					<td>$coffee</td>
					<td>$type_name</td>
					<td>$quantity lb(s)</td>
					<td>\$$coffee_price</td>
					<td>\$$total_cost</td>
				</tr>
			</table>
			<br><a href='user_input.html' class='button'>Return to Order Form</a>
		";
	}

	?>
</body>
</html>
