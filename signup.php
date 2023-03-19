<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Connect to the PostgreSQL database
  $conn = pg_connect("host=localhost dbname=social_demo user=social_api password=Grace2014!");

  // Get the form data and sanitize it
  $name = pg_escape_string($_POST['name']);
  $email = pg_escape_string($_POST['email']);
  $password = pg_escape_string($_POST['password']);
  $confirm_password = pg_escape_string($_POST['confirm-password']);

  // Check if the passwords match
  if ($password !== $confirm_password) {
    echo '<p class="error">Passwords do not match.</p>';
  } else {
    // Call the PostgreSQL function to insert the new user
    $result = pg_query_params($conn, 'SELECT create_user($1, $2, $3, $4)', array($email, $password, $name, ''));

    // Get the ID of the newly created user
    $row = pg_fetch_row($result);
    $user_id = $row[0];

    // Redirect the user to a success page
    header('Location: success.php?id=' . $user_id);
    exit();
  }

  // Close the database connection
  pg_close($conn);
}
?>