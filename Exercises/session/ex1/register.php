<?php
 // Initialize the session
session_start();
 
// Define variables and initialize with empty values
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";         //test if the username is empty
    } else if (empty(trim($_POST["password"]))){
		$password_err = "Please enter a password.";         // test if the password is empty
	}else if (empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";  // test if confirm password is empty		
	} else if(!empty(trim($_POST["password"])) && (trim($_POST["password"]) != trim($_POST["confirm_password"]))){
            $confirm_password_err = "Password did not match.";        // test id the password and the confirm password do not match
    } else {
		// to verify the name dosn't exist already                     //what do if otherwise
		$name = 0;
		foreach ($_SESSION as $key=>$value) {
			if ($value[username] == trim($_POST["username"])){
				$name = 1;
				break;
			}
		}	
		if ( $name == 1 )
			$username_err = "This username is already taken.";
		else {
			if (isset($_SESSION['i'])) {
				$i = $_SESSION['i']+1;
			} else {
				$i = 0;
			}           
			$user ="U".$i;
			$_SESSION[$user]['code'] = $i ;
				 
			$_SESSION[$user]['username'] = trim($_POST["username"]);
			$_SESSION[$user]['password'] = trim($_POST["password"]);
			$_SESSION['i'] = $i;               
			
			// Redirect to login page
            header("location: login.php");       
    
	          
		}           
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $_POST["username"] ;?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $_POST["password"]; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>