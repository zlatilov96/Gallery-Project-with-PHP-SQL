<?php 
	session_start();
?>

<!DOCTYPE>
<html>
<head>
	<title>Admin Login Form</title>
	<link rel="stylesheet" href="styles/login_style.css">
</head>

<body>

	<?php

		include("dbinfo.php");
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
	?>

	<div class="login">
	
		<?php 
			// If the login button (in the admin panel login) is checked, the code is run
			// It checks if the user inputs the right credentials in order to access the Admin Panel
			if(isset($_POST['login'])) {
				
				$email = $_POST['email'];
				$pass = $_POST['password'];
				
				$sel_user = "SELECT * FROM admins WHERE user_email='$email' AND user_pass='$pass'";
				
				$run_user = mysqli_query($dbc, $sel_user);
				
				$check_user = mysqli_num_rows($run_user);
				
				// If the user doesn't have login credentials, a Try Again message is displayed
				if($check_user == 0) {
					echo "<h3 style='color: white; text-align:center;'>";
					echo "Username / Password is wrong! Try again!";
					echo "</h3>";
				} else {
					
					$_SESSION['user_email'] = $email;
					
					// Getting access into the Admin Panel
					echo "<script>window.open('index.php?logged_in=You have successfully logged in!' , '_self')</script>";
					
				}
			}
		?>
	
		<!-- Admin Panel Login Form -->
		<h1>Admin Panel Login</h1>
	    <form method="post" action="login.php">
	    	<input type="text" name="email" placeholder="Username" required="required" />
	        <input type="password" name="password" placeholder="Password" required="required" />
	        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
	    </form>
	</div>
	
</body>

</html>