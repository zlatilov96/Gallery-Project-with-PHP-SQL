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
      	
      	
      	
      	// Login with working hash function
      	
      	if (password_verify($password, $password_hashed)) {
      		echo 'works!';
      		echo $_SESSION['username'] = $row['username'];
      		echo $_SESSION['userid'] = $row['userid'];
      		echo $_SESSION['email'] = $row['email'];
      	}
      	else{
      		echo "<div class='err'>";
      		echo 'The username or password is <strong>incorrect</strong>. Please try again!';
      		echo "</div>";
      	}
      }

      /*
      
      if (!empty($username) && !empty($password)) {
        // Fetch the userid, username, password, and city from the database
        $query = "SELECT userid, username, email FROM user WHERE username = '$username' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The login is OK. Set the userid, username, and city session variables. Set the cookies. Redirect to the home page
          $row = mysqli_fetch_array($data);
          
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['email'] = $row['email'];
          
          setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          
          // Check this nice way to get the URL of the app's home page
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username or password are incorrect so set an error message
          $error_msg = 'Sorry, the username/password you entered is not correct. Try again!';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in. Try again!';
      }
      
      */
      
    }
  }
?>