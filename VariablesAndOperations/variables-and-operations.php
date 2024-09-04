<!--
	Name: MrJ
	Course: Data Driven Web Pages
	Assignment: Assignment 2
	Date: 9/4/2024
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Variables and Arithmetic Operations</title>
	</head>
	<body>
		<?php
		
		// Assign the variables number_one and number_two
		// rand() is the function to generate a random number (inclusive)
		$number_one = rand(1, 100);
		$number_two = rand(1, 100);
		
		// Perform arithmetic operations and assign to variables
		$addition = $number_one + $number_two;
		$difference = $number_two - $number_one;
		$product = $number_one * $number_two;
		$division = $number_two / $number_one;
		$remainder = $number_two % $number_one;
		
		// Print the results of arithmetic operations
		echo "$number_one + $number_two = $addition<br>";
		echo "$number_two - $number_one = $difference<br>";
		echo "$number_one * $number_two = $product<br>";
		echo "$number_two / $number_one = $division<br>";
		echo "$number_two % $number_one = $remainder";
		
		?>
	</body>
</html>