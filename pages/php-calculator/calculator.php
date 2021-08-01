<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Square Yards Calculator</title>
    <!-- link to styles.css -->
		<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <main>
  <!-- Add heading -->
  <h1>Square Yards Calculator</h1>

    <!-- Add tape measure image -->
		<img src="images/measuring-tape_yellow.png" alt="yellow mesauring tape illustration" title="yellow measuring tape illustration" height="75" width="75" class="center_image">
  <p class="center">Measure your room, round up to the nearest foot, and input your measurements in feet in the form below.</p>

	<!-- Start form -->
	<form action="calculator.php" method="post">
		<input type="text" name="roomlength" placeholder="10" autofocus>
		<input type="text" name="roomwidth" placeholder="12">
		<input type="submit" name="submit" value="Calculate">&nbsp;
		<input type="reset" value="Reset">
	</form>
	<!-- End form -->

	<!-- Start PHP script -->
	<?php
	/* This script displays and handles an HTML form.
	 It uses a function to calculate a square foot area. */

	 // This function performs the calculations.
	 function calculate_total($roomlength, $roomwidth) {

		 // Define constant:
		 define('SQUARE_YARDS', 9);

		 // Define variable:
		 $total = number_format((($roomlength * $roomwidth) / SQUARE_YARDS), 2);

		 // Return the value:
		 return $total;

	 } // End calculate_total function.

	 // Check for form submission:
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		 // Check for values:
		 if ( is_numeric($_POST['roomlength']) AND is_numeric($_POST['roomwidth']) ) {

			 // Call the function and print the results:
			 $total = calculate_total($_POST['roomlength'], $_POST['roomwidth']);
			 print "<p class='center'><b>Material Estimate:</b><br><br><b>$total</b> Sq. Yds.</p>";

		 } else { // Inappropriate values entered.
			 print "<p class='error'>Please enter a valid room length and room width!</p>";
		 }

	 } // End check form submission.

	?>

	<!-- End PHP script -->

	</main>
	<footer>
    <!-- List of shout-outs - give credit where credit is due -->
    <p id="shout_out">Form layout CodePen courtesy of <a href="https://codepen.io/dfitzy/pen/VepqMq" title="Vintage Inspired Contact Form" target="_blank">David Fitas</a><br>
    Icons made by <a href="https://smashicons.com/" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon" target="_blank"> www.flaticon.com</a>
    </p>
	</footer>

</body>
</html>
