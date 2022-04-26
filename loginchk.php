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
        $conn = new mysqli("localhost", "student", "student", "db");
        $email      = $_POST['email'];
        $input_pass = $_POST['password'];
	$stmt       = $conn->prepare("SELECT password FROM userdata WHERE email= ?");
	$stmt -> bind_param("s", $email);
	$stmt -> execute();
	$stmt -> store_result();
	$stmt -> bind_result($hashed_pass);
        if ($stmt -> num_rows == 1) {
	    while ($stmt->fetch()) {
	        if (password_verify($input_pass, $hashed_pass)) {
                    $_SESSION['login_user'] = $email;
	  
                    echo "<script>location='profile.php'</script>";
	        }
	        else {
		    $error = "Email or password is invalid. Please try again.";
	            echo $error;
	        }
	    }
        }
        else {
            $error = "Email or password is invalid. Please try again.";
	    echo $error;
        }	

        mysqli_close($connection);
    }
}
?>