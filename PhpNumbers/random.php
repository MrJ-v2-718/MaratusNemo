<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Lucky Numbers</title>
	</head>
	<body>
		<?php
			// This script generates 3 random numbers.
			
			// Create 3 random numbers:
			$number1 = mt_rand(1, 99);
			$number2 = mt_rand(1, 99);
			$number3 = mt_rand(1, 99);
			
			// Print out the Numbers
			print "
				<p>Your lucky numbers are:<br>
				$number1<br>
				$number2<br>
				$number3</p>
			";
			
		?>
	</body>
</html>
