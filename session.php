<!--
 * File : session.php
 * Developer : Agney Patel
 * Website : www.agney.vishwasetu.com
 * Copyright © Agney Patel 2016
 -->

<?php
$connection = mysqli_connect("localhost", "student", "student", "db");

session_start();

$user_check    = $_SESSION['login_user'];
$sql           = "SELECT email from userdata where email='$user_check'";
$row           = mysqli_fetch_assoc($sql);
$login_session = $row['email'];

if (!isset($login_session)) {
    mysqli_close($connection);
    // echo "<script>location='index.php'</script>";
}

?>
