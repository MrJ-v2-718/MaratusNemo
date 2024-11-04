<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Thought Provoking Books</title>
	</head>
	<body>
		<h1>Thought Provoking Books and Chapters</h1>
		<?php
			// Create the first array:
			$moby_dick = [
				1 => 'Loomings',
				'The Carpet-Bag',
				'The Spouter Inn',
				'The Counterpane'
			];
			
			// Create the second array:
			$a_brief_history_of_time = [
				1 => 'Our Picture of the Universe',
				'Space and Time',
				'The Expanding Universe',
				'The Uncertainty Principle'
			];
			
			// Create the third array:
			$quantum_mechanics = [
				1 => 'Systems and Experiments',
				'Quantum States',
				'Principles of Quantum Mechanics',
				'Time and Change'
			];
		
			// Create a bookish multidimensional array:
			$books = [
				'Moby-Dick' => $moby_dick,
				'A Brief History of Time' => $a_brief_history_of_time,
				'Quantum Mechanics' => $quantum_mechanics
			];
			
			// Print each key and value:
			foreach ($books as $title => $chapters) {
				print "<p>$title";
				foreach($chapters as $number => $chapter) {
					print "<br>$number: $chapter";
				}
				print "</p>";
			}
		?>
	</body>
</html>
