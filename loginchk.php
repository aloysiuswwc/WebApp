<!--
 * File : loginchk.php
 * Developer : Agney Patel
 * Website : www.agney.vishwasetu.com
 * Copyright © Agney Patel 2016
 -->

<?php
session_start();
$error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Email or Password is invalid";
    }
    else
    {
        $connection = mysqli_connect("localhost", "student", "student", "db");
	if (mysqli_connect_errno()) {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	    exit();
        }
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        // $email      = stripslashes($email);
        // $password   = stripslashes($password);
        // $email      = mysqli_real_escape_string($connection, $_REQUEST['email']);
        // $password   = mysqli_real_escape_string($connection, $_REQUEST['password']);
        $sql        = "SELECT * from userdata where password='$password' AND email='$email'";
        $r_query    = mysqli_query($connection, $sql);
        $rows       = mysqli_num_rows($r_query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $email;
	    
            echo "<script>location='profile.php'</script>";
        }
        else {
            $error = "Email or Password is invalid. Please try again.";
	    echo $error;
        }	

        mysqli_close($connection);
    }
}
?>
