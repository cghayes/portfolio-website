<!DOCTYPE html>
<html lang="en">
<head>
  <title>Class Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="icon" href="favicon.ico">
</head>
<body>

  <main>

  <!-- Start PHP script -->
  <?php
  /* This script registers a user's dog and sends a confirmation to the user's email. */

  // Print some introductory text & image:
  print '<h1>Registration Form</h1>';
  print '<img class="responsive" src="images/dogs.jpg" alt="dog sleeping and dog looking up" title="dog sleeping and dog looking up">';
  print '<p>Register for our <b>FREE</b> "Your Healthy Dog" class! We will have presenters from local pet supply stores, healthy dog treats and food, supplements to support your dog\'s immune system, and healthy treats for humans, too!</p>';
  print '<p>Register below to join in on the fun and we will be contacting you via email with the date and time.</p>';
  print '<h2 class="center">Keep Wagging!</h2>';



  // Check if the form has been submitted:
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

    // Create email variable for better validation:
    // Sources: w3schools and phpmanual
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Remove illegal characters.

    // Validate the registration information.
    $problem = FALSE; // No problems so far.

    // Check for each value...
    // Validate first name:
    if (empty($_POST['first_name'])) {
      $problem = TRUE;
      print '<p class="error">Please enter your first name!</p>';
    }

    // Validate last name:
    if (empty($_POST['last_name'])) {
      $problem = TRUE;
      print '<p class="error">Please enter your last name!</p>';
    }

    // Validate email:
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) || (empty($email))) {
      // If it does not pass FILTER_VALIDATE_EMAIL validation or is empty:
      $problem = TRUE;
      print '<p class="error">Please enter a valid email address!</p>';
    }

    // Validate breed:
    if (empty($_POST['breed'])) {
      $problem = TRUE;
      print '<p class="error">Please enter the breed of your dog. We welcome all breeds!</p>';
    }

    // Validate phone:
    $phone = $_POST['phone'];
    $phonelength = strlen($phone); // Add length variable to verify 10 digits
    if ($phone !== null && !is_numeric($phone) || ($phonelength !== 10)) {
      $problem = TRUE;
      print '<p class="error">Please enter your phone number (numbers only, no spaces, 10 digits).</p>';
    }

    // If there weren't any problems...
    if (!$problem) {

      print '<p class="success">You are now registered ' . ucfirst($_POST['first_name']) . '! Please check your hooman\'s email for your Registration Confirmation.</p>';

      // Send the email:
      $body = "Thank you, {$_POST['first_name']}, for registering for the FREE 'Your Healthy Dog' class! We will see you and your hooman soon! We will be contacting you with the date & time of our class. Keep Wagging!";
      mail($_POST['email'], 'Registration Confirmation', $body, 'From: calley.g.hayes@pm.me');

      // Clear the posted values:
      $_POST = [];

    } else { // Forgot a field.

      print '<p class="error">Please try again!</p>';

    } // End ELSE IF.

  } // End submitted IF.

  ?>
  <!-- End PHP script -->

  <!-- Start Form -->
  <form action="register.php" method="post">
    <p><i>All fields are required.</i></p>
    <p><label>Dog's First Name:</label><input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) { print htmlspecialchars($_POST['first_name']); } ?>" autofocus></p>
    <p><label>Your Last Name:</label><input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) { print htmlspecialchars($_POST['last_name']); } ?>"></p>
    <p><label>Your Email Address:</label><input type="email" name="email" size="40" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"></p>
    <p><label>Dog Breed:</label><input type="text" name="breed" size="20" value="<?php if (isset($_POST['breed'])) { print htmlspecialchars($_POST['breed']); } ?>"></p>
    <p><label>Phone Number (numbers only, no spaces):</label><input type="text" name="phone" size="10" value="<?php if (isset($_POST['phone'])) { print htmlspecialchars($_POST['phone']); } ?>"></p>
    <p><input type="submit" name="submit" value="Register!"></p>
  </form>
  <!-- End Form -->
	</main>

	<footer>
    <p id="shout_out">Form layout CodePen courtesy of <a href="https://codepen.io/dfitzy/pen/VepqMq" title="Vintage Inspired Contact Form" target="_blank">David Fitas</a><br>
		All images are released under the <a href="https://pixabay.com/service/faq/" target="_blank" title="Stunning free images & royalty free stock">Pixabay License</a>, copyright free.</p>
  </footer>

</body>
</html>
