<!doctype html>
<html lang="en">
<head>
	<!--
    	Paycheck Calculator
    	Name: MrJ
    	Date:   9/18/2024
	Purpose: A PHP script that will process and display user paycheck information.
	It receives its info from user_input.html via $_POST.
	-->
	<meta charset="utf-8">
	<title>Paycheck Information</title>
		<style type="text/css">
			table, td { border: 1px solid black; }
			td { width: 12em; }
			.column1 { font-weight: bold; text-align: left; }
			.column2 { text-align: right; }
		</style>
</head>
<body>
	<?php

	// Variables: first_name, last_name, hours_worked, hourly_rate, and submit_form
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$hours_worked = $_POST['hours_worked'];
	$hourly_rate = $_POST['hourly_rate'];
	
	// Calculate Gross Pay (hours worked times pay rate)
	$gross_pay = $hours_worked * $hourly_rate;
	$gross_pay = number_format($gross_pay, 2);
	
	// Calculate Federal Taxes (10.65% of Gross Pay)
	$federal_taxes = $gross_pay * (10.65 / 100);
	$federal_taxes = number_format($federal_taxes, 2);
	
	// Calculate State Taxes (4% of Gross Pay)
	$state_taxes = $gross_pay * (4 / 100);
	$state_taxes = number_format($state_taxes, 2);
	
	// Calculate Social Security Taxes (3.8% of Gross Pay)
	$social_security_taxes = $gross_pay * (3.8 / 100);
	$social_security_taxes = number_format($social_security_taxes, 2);
	
	// Calculate Medicare Taxes (1.3% of Gross Pay)
	$medicare_taxes = $gross_pay * (1.3 / 100);
	$medicare_taxes = number_format($medicare_taxes, 2);
	
	// Calculate Total Taxes (Federal + State + Social Security + Medicare)
	$total_taxes = $federal_taxes + $state_taxes + $social_security_taxes + $medicare_taxes;
	$total_taxes = number_format($total_taxes, 2);
	
	// Calculate Net Pay (Gross Pay - Total Taxes)
	$net_pay = $gross_pay - $total_taxes;
	$net_pay = number_format($net_pay, 2);
	
	// Print the received data in table format:
	print "
	<header>
		<h1>Paycheck Information for $first_name $last_name</h1>
	</header>
	
	<p>Hello $first_name $last_name. This week you worked $hours_worked hours and, based on <br>
	the pay rate of \$$hourly_rate per hour, your pay check information is:</p>
	
	<table>
		<!-- Places the first table row of table data items -->
		<tr>
			<td class=\"column1\">Gross Pay:</td>
			<td class=\"column2\">\$$gross_pay</td>
		</tr>
		<!-- Places the second table row of table data items -->
		<tr>
			<td class=\"column1\">Federal Taxes:</td>
			<td class=\"column2\">\$$federal_taxes</td>
		</tr>
		<!-- Places the third table row of table data items -->
		<tr>
			<td class=\"column1\">State Taxes:</td>
			<td class=\"column2\">\$$state_taxes</td>
		</tr>
		<!-- Places the fourth table row of table data items -->
		<tr>
			<td class=\"column1\">Social Security Taxes:</td>
			<td class=\"column2\">\$$social_security_taxes</td>
		</tr>
		<!-- Places the fifth table row of table data items -->
		<tr>
			<td class=\"column1\">Medicare Taxes:</td>
			<td class=\"column2\">\$$medicare_taxes</td>
		</tr>
		<!-- Places the sixth table row of table data items -->
		<tr>
			<td class=\"column1\">Total Taxes:</td>
			<td class=\"column2\">\$$total_taxes</td>
		</tr>
		<!-- Places the seventh table row of table data items -->
		<tr>
			<td class=\"column1\">Net Pay:</td>
			<td class=\"column2\">\$$net_pay</td>
		</tr>
	</table>
	<br><a href='user_input.html' class='button'>Return to Input Form</a>
	";

	?>
</body>
</html>
