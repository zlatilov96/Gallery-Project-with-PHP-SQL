<?php
session_start();
include("loginfile.php");
include("signupfile.php");

/* If the session data does not exist (i.e we are starting a new session), try to set the session's data with
 the cookies that were saved when the user made his/her last login (i.e: the cookies that the client browser is sending in its HTTP GET request to this index.php script)
 This is the code that allows the app to remember the user that last logged in to the app (in the browser/computer that's issuing the HTTP GET request) and left the app without logging out
 */
if (!isset($_SESSION['userid'])) {
	if (isset($_COOKIE['userid']) && isset($_COOKIE['username'])) {
		$_SESSION['userid'] = $_COOKIE['userid'];
		$_SESSION['username'] = $_COOKIE['username'];
		// Using city here is for demonstration purposes. In real applications, you should not save personal data in cookies
		$_SESSION['email'] = $_COOKIE['email'];
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PhotoGallery</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
 
  // Generate the navigation menu
  if (isset($_SESSION['userid'])) {
  	echo "<div class='welcome'>";
  	echo 'You are logged in as ' . '<strong>' . $_SESSION['username'] . '</strong>' . '!';
  	echo ' Enjoy your stay here!';
  	echo "</div>";
    include("contact-in.php");
  }
  else {
  	echo "<div class='not-in'>";
    echo "You need to be logged in to publish photos!";
    echo "</div>";
    include("contact-notin.php");
  }
?>

</body>
</html>