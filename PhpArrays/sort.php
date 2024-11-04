<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pequod Performance Evaluations</title>
	</head>
	<body>
		<h1>Pequod Performance Evaluations</h1>
		<?php
			// Create the array:
			$evaluations = [
				'Ishmael' => 95,
				'Daggoo' => 82,
				'Stubb' => 98,
				'Queequeg' => 87,
				'Tashtego' => 75,
				'Flask' => 85,
				'Starbuck' => 82
			];
			
			// Print the original array:
			print "<p>Originally the array looks like this: <br>";
			foreach ($evaluations as $crew_member => $evaluation) {
				print "$crew_member: $evaluation<br>\n";
			}
			print "</p>";
			
			// Sort by value in reverse order, then print again:
			arsort($evaluations);
			print "<p>After arsort(), the array looks like this: <br>";
			foreach ($evaluations as $crew_member => $evaluation) {
				print "$crew_member: $evaluation<br>\n";
			}
			print "</p>";
			
			// Sort by key, then print again:
			ksort($evaluations);
			print "<p>After ksort(), the array looks like this: <br>";
			foreach ($evaluations as $crew_member => $evaluation) {
				print "$crew_member: $evaluation<br>\n";
			}
			print "</p>";
		?>
	</body>
</html>
