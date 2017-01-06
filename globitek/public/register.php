<?php
  require_once('../private/initialize.php');
  require_once('../private/functions.php');
  require_once('../private/validation_functions.php');

  // Set default values for all variables the page needs.

  // if this is a POST request, process the form
  // Hint: private/functions.php can help

    // Confirm that POST values are present before accessing them.

    // Perform Validations
    // Hint: Write these in private/validation_functions.php

    // if there were no errors, submit data to database

      // Write SQL INSERT statement
      // $sql = "";

      // For INSERT statments, $result is just true/false
      // $result = db_query($db, $sql);
      // if($result) {
      //   db_close($db);

      //   TODO redirect user to success page

      // } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
      //   echo db_error($db);
      //   db_close($db);
      //   exit;
      // }

  //initialize errors
  $errors = [];

  $first_name = '';
  $last_name = '';
  $email = '';
  $username = '';

  if (is_post_request()) {

    //initialize form variables
    $first_name = h($_POST['first_name'] ?? '');
    $last_name = h($_POST['last_name'] ?? '');
    $email = h($_POST['email'] ?? '');
    $username = h($_POST['username'] ?? '');


    // ** Check and validate all the values **

    // check/validate first name
    if (is_blank($first_name)) {
      array_push($errors, 'first name missing');
    } elseif (!has_length($first_name, ['min' => 2, 'max' => 255])) {
      array_push($errors, 'first name of incorrect length (should be between 2 and 255 chars)');
    } elseif (preg_match('/^[a-zA-Z0-9 .,\'\-]+$/i', $first_name) == 0) {
      array_push($errors, 'first name has incorrect characters');
    }

    // check/validate last name
    if (is_blank($last_name)) {
      array_push($errors, 'last name missing');
    } elseif (!has_length($last_name, ['min' => 2, 'max' => 255])) {
      array_push($errors, 'last name of incorrect length (should be between 2 and 255 chars)');
    } elseif (preg_match('/^[a-zA-Z0-9 .,\'\-]+$/i', $last_name) === 0) {
      array_push($errors, 'last name has incorrect characters');
    }

    // check/validate email
    if (is_blank($email)) {
      array_push($errors, 'email missing');
    } elseif (!has_valid_email_format($email)) {
      array_push($errors, 'the email was not formatted correctly');
    } elseif (preg_match('/^[a-zA-Z0-9_@.]+$/i', $email) === 0) {
      array_push($errors, 'email has incorrect characters');
    }

    // check/validate username
    if (is_blank($username)) {
      array_push($errors, 'username missing');
    } elseif (!has_length($username, ['min' => 8, 'max' => 255])) {
      array_push($errors, 'username of incorrect length (should be between 8 and 255 chars)');
    } elseif (preg_match('/^[a-zA-Z0-9_]+$/i', $username) === 0) {
      array_push($errors, 'username has incorrect characters');
    } else {
      $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
      $result = db_query($db, $sql);
      if ($result) {
        if ($result->num_rows === 1) {
          array_push($errors, 'username is taken');
        }
      } else {
        echo db_error($db);
      }

    }

    /* 
      Check if there are any errors, 
        if so, redirect back with original values
        if not, write to database
    */

    $error_num = sizeof($errors);

    if ($error_num == 0) {
      $date = date('Y-m-d H:i:s');
      $sql = "INSERT INTO users".
        "(first_name, last_name, email, username, created_at) VALUES ".
        "('$first_name', '$last_name', '$email', '$username', '$date')";

      echo $sql;
      $result = db_query($db, $sql);
      if ($result) {
        db_close($db);
        redirect_to('/public/registration_success.php');
      } else {
        echo db_error($db);
        db_close($db);
        exit;
      }
      
    }



  }
?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
    echo display_errors($errors);
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="first_name">First name:</label><br/>
    <input type="text" name="first_name" value="<?php echo $first_name ?>" /><br/>

    <label for="last_name">Last name:</label><br/>
    <input type="text" name="last_name" value="<?php echo $last_name ?>" /> <br/>

    <label for="email">Email:</label><br/>
    <input type="text" name="email" value="<?php echo $email; ?>" /><br />

    <label for="username">Username:</label><br/>
    <input type="text" name="username" value="<?php echo $username; ?>" /><br /><br/>

    <input type="submit" name="submit" value="Submit" />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
