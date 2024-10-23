<!doctype html>
<html lang="en">
<head>
	<!--
    Assignment 7
    Name: MrJ
    Date: 10/23/2024
	Purpose: Allow a user to select a coffee, coffee type, and quantity.
	User information is then collected including name, email, phone number,
	address, city, state, and zip. The information is then processed and 
	an order summary is displayed.
	-->
	<meta charset="utf-8">
	<title>The Coffee House</title>
		<style type="text/css">
				td { width: 12em; }
				h1 { margin-left: 2.5em; }
				h3 { margin-left: 7.35em; }
				.error { color: red; }
		</style>
</head>
<body>
	
		<header>
			<h1>The Coffee House</h1>
		</header>
			<?php
			
			// Check if the form has been submitted:
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
				
				// Print the order summary if form is filled out correctly
				if ($okay) {
					// Calculate total cost
					$total_cost = $coffee_price * $quantity;
					$total_cost = number_format($total_cost, 2);
					
					print "
					<style type=\"text/css\">
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
						.form_container {
							display: none;
						}
					</style>
					";
					
					print "
						<header>
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
						<br><a href='coffee_order.php' class='button'>Return to Order Form</a>
					";
				}
			}
			?>
		<div class="form_container">
		<header>
			<h3>Order Form</h3>
		</header>
		<form action="coffee_order.php" method="post">
		<table>
			<!-- Places the first table row of table data items -->
			<tr>
				<td>Coffee:</td>
				<td>
					<select name="coffee">
					<option value="select" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "select") { 
						print "selected=\"selected\""; 
					}
					?>
					>Select Coffee:</option>
					<option value="boca_villa" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "boca_villa") { 
						print "selected=\"selected\""; 
					}
					?>
					>Boca Villa $7.99/lb</option>
					<option value="south_beach" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "south_beach") { 
						print "selected=\"selected\""; 
					}
					?>
					>South Beach Rhythm $8.99/lb</option>
					<option value="pumpkin" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "pumpkin") { 
						print "selected=\"selected\""; 
					}
					?>
					>Pumpkin Paradise $8.99/lb</option>
					<option value="sumatran" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "sumatran") { 
						print "selected=\"selected\""; 
					}
					?>
					>Sumatran Sunset $9.99/lb</option>
					<option value="bali_batur" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "bali_batur") { 
						print "selected=\"selected\""; 
					}
					?>
					>Bali Batur $10.95/lb</option>
					<option value="double_dark" <?php 
					if (isset($_POST['coffee']) && $_POST['coffee'] == "double_dark") { 
						print "selected=\"selected\""; 
					}
					?>
					>Double Dark $9.95/lb</option>
					</select>
				</td>
			</tr>
			<!-- Places the second table row of table data items -->
			<tr>
				<td rowspan="2">Type:</td>
				<td><input type="radio" name="type" value="0.00" <?php 
					if (isset($_POST['type']) && $_POST['type'] == "0.00") { 
						print "checked=\"checked\""; 
					}
					?>
					>Caffeinated</td>	
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td><input type="radio" name="type" value="1.00" <?php 
					if (isset($_POST['type']) && $_POST['type'] == "1.00") { 
						print "checked=\"checked\"";
					}
					?>
					>Decaffeinated (+$1.00/lb)</td>
			</tr>
			<!-- Places the fourth table row of table data items -->
			<tr>
				<td>Quantity (in pounds):</td>
				<td><input type="text" name="quantity" size="5" value="<?php if (isset($_POST['quantity'])) { print htmlspecialchars($_POST['quantity']); } ?>"></td>
			</tr>
			<!-- Places the second table row of table data items -->
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" size="30" value="<?php if (isset($_POST['name'])) { print htmlspecialchars($_POST['name']); } ?>"></td>
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td>E-mail Address:</td>
				<td><input type="text" name="email_address" size="30" value="<?php if (isset($_POST['email_address'])) { print htmlspecialchars($_POST['email_address']); } ?>"></td>
			</tr>
			<!-- Places the second table row of table data items -->
			<tr>
				<td>Telephone Number:</td>
				<td><input type="text" name="phone_number" size="20" value="<?php if (isset($_POST['phone_number'])) { print htmlspecialchars($_POST['phone_number']); } ?>"></td>
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td>Address:</td>
				<td><input type="text" name="address" size="30" value="<?php if (isset($_POST['address'])) { print htmlspecialchars($_POST['address']); } ?>"></td>
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td>City:</td>
				<td><input type="text" name="city" size="25" value="<?php if (isset($_POST['city'])) { print htmlspecialchars($_POST['city']); } ?>"></td>
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td>State:</td>
				<td><input type="text" name="state" size="5" value="<?php if (isset($_POST['state'])) { print htmlspecialchars($_POST['state']); } ?>"></td>
			</tr>
			<!-- Places the third table row of table data items -->
			<tr>
				<td>Zip:</td>
				<td><input type="text" name="zip" size="15" value="<?php if (isset($_POST['zip'])) { print htmlspecialchars($_POST['zip']); } ?>"></td>
			</tr>
			<!-- Places the fifth table row of table data items -->
			<tr>
				<td><input type="submit" name="submit_form" value="Submit"></td>
				<td><input type="reset" value="Reset"></td>
			</tr>
		</table>	
	</form>
	</div>
</body>
</html>
