<?php
  require_once('dbinfo.php');

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log him/her in
  if (!isset($_SESSION['userid'])) 
  {
    if (isset($_POST['loging-in'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
      
      $query = "SELECT password, username, email, userid FROM user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      
      
      if (mysqli_num_rows($data) == 1) {
      	
      	$row = mysqli_fetch_array($data);
      	$password_hashed = $row['password'];

      	// Login with hash function. If "Remember Me" checkbox is checked, user will be remembered for 30 days.
      	if (password_verify($password, $password_hashed)) {
      		if(isset($_POST['rememberme'])) {
      			
      			$_SESSION['username'] = $row['username'];
      			$_SESSION['userid'] = $row['userid'];
      			$_SESSION['email'] = $row['email'];
      			
      			setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));
      			setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
      			setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));
      			
      		// If checkbox is not checked, user will be remembered till the end of the session.
      		} else {
      			$_SESSION['username'] = $row['username'];
      			$_SESSION['userid'] = $row['userid'];
      			$_SESSION['email'] = $row['email'];
      		}
      	}      
      	
      	// Shows an error when wrong username / password is filled in.
      	else {
      		echo "<div class='err'>";
      		echo 'The username or password is <strong>incorrect</strong>. Please try again!';
      		echo "</div>";
      	}
      } 
      // In all the other "wrong" cases display this following message.
      else {
      	echo "<div class='err'>";
      	echo 'The username <strong>does not</strong> exist! Please try again!';
      	echo "</div>";
      }
    }
  }
?>