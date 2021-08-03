<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bowler Registration</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="favicon.ico">
</head>
<body>
  <main>
	<!-- Start PHP script -->
  <?php
    /* This script registers a user by storing their information in a text file.  */

    // Add error reporting
    ini_set('display_errors', 0);
    error_reporting(E_ALL);

    // Print introductory text:
    echo '<h1>Bowler Registration Form</h1>';
    echo '<p>Register your information in the form below. Please note that all fields are <b>required</b> for a successful registration.</p>';

    // Identify the file to use:
    $file = 'bowlers.txt';

    // Create variables:
    // *** Moved $form_info variable within IF statement to write data.
    $form_info = $_POST['first_name'] . " " . $_POST['last_name'] . ", " . $_POST['age'] . ", " . $_POST['average'];
    $min = 1;
    $max = 300;

    // Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

      // Validate the registration information.
      $problem = FALSE; // No problems so far.

      // Check for each value...
      if (empty($_POST['first_name'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your first name!</p>';
      }

      if (empty($_POST['last_name'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your last name!</p>';
      }

      if ($_POST['age'] !== null && !is_numeric($_POST['age'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your age (numbers only).</p>';
      }

      if ($_POST['average'] !== null && !is_numeric($_POST['average'])) {
        $problem = TRUE;
        print '<p class="error">Please enter your current average (numbers only).</p>';
      }

      if ($_POST['average'] < $min || $_POST['average'] > $max) {
        $problem = TRUE;
        print '<p class="error">Your average must be between 1 and 300.</p>';
      }

      if ((is_writable($file)) && (!$problem)) {
        // Confirm that the file is writable and no problems.

        file_put_contents($file, $form_info . PHP_EOL, FILE_APPEND);

        // Print a message.
        print '<p class="success">You are now registered, ' . ucfirst($_POST['first_name']) . " " . ucfirst($_POST['last_name']) . '! </p>';
        print '<p><a href="bowlers.txt" target="_blank">View Registrations</a></p>';
        print '<p><a href="registerbowlers.php">Register another bowler.</a></p>';
      }

  } // End of submitted IF.

  ?>

	<!-- End of PHP script -->

	<!-- Start form -->
  <form action="registerbowlers.php" method="post">
    <p><label>Your First Name:</label><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) { print htmlspecialchars($_POST['first_name']); } ?>" autofocus></p>
    <p><label>Your Last Name:</label><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>"></p>
    <p><label>Age (numbers only):</label><input type="text" name="age" size="20" value="<?php if (isset($_POST['age'])) { print htmlspecialchars($_POST['age']); } ?>"></p>
    <p><label>Bowling Average (numbers only):</label><input type="text" name="average" size="20" value="<?php if (isset($_POST['average'])) { print htmlspecialchars($_POST['average']); } ?>"></p>
    <p><input type="submit" name="submit" value="Register!"></p>
  </form>

	<!-- End form -->

	</main>
	<footer>
    <p id="validation">
      <span id="shout_out">Form layout CodePen courtesy of <a href="https://codepen.io/dfitzy/pen/VepqMq" title="Vintage Inspired Contact Form" target="_blank">David Fitas</a></span>
		</p>
	</footer>
</body>
</html>
