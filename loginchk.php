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
        $input_pass = $_POST['password'];
        $sql        = "SELECT * from userdata where email='$email'";
        $r_query    = mysqli_query($connection, $sql);
        if (mysqli_num_rows($r_query) == 1) {
	    while ($row = mysqli_fetch_object($r_query)) {
	        $hashed_pass = $row->password;
	    }
            if (password_verify($input_pass, $hashed_pass)) {
                $_SESSION['login_user'] = $email;
	  
                echo "<script>location='profile.php'</script>";
	    }
	    else {
		$error = "Email or Password is invalid. Please try again.";
	        echo $error;
	    }
        }
        else {
            $error = "Email or Password is invalid. Please try again.";
	    echo $error;
        }	

        mysqli_close($connection);
    }
}
?>