<?php
session_start();
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";         
    } else if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";         
    } else if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";  	
    } else if (!empty(trim($_POST["password"])) && (trim($_POST["password"]) != trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Password did not match.";       
    } else {
           // Check if username is already taken                    
        $name = 0;
        foreach ($_SESSION as $key => $value) {
            if (is_array($value) && isset($value['username']) && $value['username'] == trim($_POST['username'])) {
                $name = 1;
                break;
                // Check 1: Is this session item an array? (users are stored as arrays)
                // Check 2: Does this array have a 'username' key? (is it a user account?)
                // Check 3: Does the stored username match the new username from the form?
                /* $_SESSION = [
                            "U0" => ["username" => "john", "password" => "123"],  // User account ✓
                            "U1" => ["username" => "mary", "password" => "456"],  // User account ✓
                            "loggedin" => true,                                   // Not a user ✗
                            "currentUsername" => "john"                           // Not a user ✗
                        ]; */
            }
        }
        if ($name == 1)
            $username_err = "This username is already taken.";
        else {
            if (isset($_SESSION['i'])) {
                $i = $_SESSION['i'] + 1;
            } else {
                $i = 0;
            }

            $_SESSION['i'] = $i; // update user count

            $user = "U".$i; // create user key
            $_SESSION[$user]['code'] = $i;
            $_SESSION[$user]['username'] = trim($_POST["username"]);
            $_SESSION[$user]['password'] = trim($_POST["password"]);


            // Redirect to login page
            header("location: login.php");
            exit;
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
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' /*Bootstrap*/ : ''; ?>">

                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
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