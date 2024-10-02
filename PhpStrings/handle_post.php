<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			// Script 5.2 - handle_post.php
			// This script receives five values from posting.html:
			// first_name, last_name, email, posting, and submit
			
			// Get the values from the $_POST array:
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			// Converts new line characters to HTML5 line breaks (<br>)
			$posting = nl2br($_POST['posting'], false);
			
			// Strip away superfluous white spaces using trim():
			$first_name = trim($first_name);
			$last_name = trim($last_name);
			$posting = trim($posting);
			
			// Create a full name variable:
			$name = $first_name . ' ' . $last_name;
			
			// Adjust for HTML tags:
			$html_post = htmlentities($_POST['posting']);
			
			// Strip HTML tags to prevent cross-site scripting (XSS) attacks :
			$strip_post = strip_tags($_POST['posting']);
			
			// Get a word count:
			$words = str_word_count($posting);
			
			// Get a snippet of the first 150 characters of the posting:
			$posting = substr($posting, 0, 150);
			$html_post = substr($html_post, 0, 150);
			$strip_post = substr($strip_post, 0, 150);
			
			// Converts new line characters to HTML5 line breaks (<br>)
			$html_post = nl2br($html_post);
			$strip_post = nl2br($strip_post);
			
			// Censor the curse words:
			$posting = str_ireplace('shit', '****', $posting);
			$html_post = str_ireplace('shit', '****', $html_post);
			$strip_post = str_ireplace('shit', '****', $strip_post);
			$posting = str_ireplace('fuck', '****', $posting);
			$html_post = str_ireplace('fuck', '****', $html_post);
			$strip_post = str_ireplace('fuck', '****', $strip_post);
			$posting = str_ireplace('Adam Sandler', '**** *******', $posting);
			$html_post = str_ireplace('Adam Sandler', '**** *******', $html_post);
			$strip_post = str_ireplace('Adam Sandler', '**** *******', $strip_post);
			
			// Print a message
			print "
				<div>
					Thank you, $name, for your posting:
					<p>Original: $posting</p>
					<p>Entity: $html_post</p>
					<p>Stripped: $strip_post</p>
					<p>($words words before trimming. Character limit is 150.)</p>
				</div>
			";
			
			// Make a link to another page:
			$name = urlencode($name);
			$email = urlencode($_POST['email']);
			print "
				<p>Click <a href=\"thanks.php?name=$name&email=$email\">here</a> to continue.</p>
			";
		?>
	</body>
</html>
