<?php
/* This php block will only be executed after the user submits the signup data
 by clicking the sign-up button
*/
require_once('dbinfo.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['signing-up'])) {
    // Get the signup data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username'])); //mysqli_real_escape_string is used to enhance security
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

    if (!empty($username) && !empty($password1) && !empty($password2) && !empty($email) && ($password1 == $password2)) {
      // Check that the provided username does not yet exist in the database
      $query = "SELECT * FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username does not exist yet, so insert the data into the database.
      	// No need to add userid, because teh userid is configured with AUTO-INCREMENT in the table. MySQL will automatically generate the userid
        // SHA is used to encrypt the password
        
      	$password_hash = password_hash($password1, PASSWORD_DEFAULT);
      	
      	$query = $dbc->prepare("INSERT INTO user (username, password, email) VALUES (?, ?, ?)");
      	
      	// PREPARED STATEMENTS PHP
      	$query->bind_param("sss", $username, $password_hash, $email);
      	$query->execute();
      	mysqli_query($dbc, $query->close());
        
        // Get the userid of the just created account
        $query = "SELECT userid FROM user WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);
        
        // Set the session variables to hold the userid, username, and city of the just created account. Set also the cookies.
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        setcookie('username', $username, time() + (60 * 60 * 24 * 30));  // expires in 30 days     
        setcookie('email', $email, time() + (60 * 60 * 24 * 30));  // expires in 30 days
        
        mysqli_close($dbc);
        
        echo 'Thanks for signing up, '. $username .'!</br>';
        
        // Redirect to the home page
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location: ' . $home_url);
            
        // mysqli_close($dbc);
        exit();
      }
      else {
      	echo "<div class='err'>";
      	echo 'An account with the same username already <strong>exists</strong>! Please try again!';
      	echo "</div>";
        $username = "";
      }
    }
    else {
    	echo "<div class='err'>";
    	echo 'You must enter all of the sign-up data, including the desired password twice.';
    	echo "</div>";
    	$username = "";
    }
  }

  mysqli_close($dbc);
?>